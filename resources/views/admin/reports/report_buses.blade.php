@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @include('admin.common.breadcrumbs',['title' => 'قائمة الفواتير'])


            <form method="GET" action="{{route('reports.reportInvoices')}}"
                  class="customers__area bg-style mb-30 form-container row align-items-end justify-content-center">
                <div class="form-group col-md-3 m-2">
                    <label for="bus_id">الباص</label>
                    <select class="form-control"
                           name="bus_id"
                           value="{{request('bus_id')}}">
                        <option value="">اختر الباص</option>
                        @foreach($buses as $bus)
                            <option value="{{$bus->id}}"
                            {{$bus->id == request('bus_id') ? 'selected' : ''}}
                            >{{$bus->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="date_from">تاريخ من</label>
                    <input type="date"
                           class="form-control"
                           name="date_from"
                           value="{{request('date_from')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="date_to">الي</label>
                    <input type="date"
                           class="form-control"
                           name="date_to"
                           value="{{request('date_to')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">

                    <label for="student_name">بحث باسم الطالب</label>
                    <input type="text"
                           class="form-control"
                           name="student_name"
                           value="{{request('student_name')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="level_id">الصف</label>
                    <select class="form-control"
                            name="level_id"
                            value="{{request('level_id')}}">
                        <option value="">اختر الصف</option>
                        @foreach($levels as $level)
                            <option value="{{$level->id}}"
                                {{$level->id == request('level_id') ? 'selected' : ''}}
                            >{{$level->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-1 m-2">
                    <button type="submit" class="btn" style="background-color: #50bfa5;">
                        <i class="fa fa-filter"></i>
                    </button>
                </div>

            </form>

            <hr>
            <div class="row">
                <div class="col-md-12 customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" style="overflow: auto">
                    <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                        <thead >
                        <tr>
                            <th>كود</th>
                            <th>اسم الطالب</th>
                            <th>القسم</th>
                            <th>تاريخ الاشتراك بالباص</th>
                            <th>كود الباص</th>
                            <th>اسم السائق</th>
                            <th>مبلغ الاشتراك</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>المتبقي</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students_buses as $student_bus)
                            <tr>
                                <td>{{ $students_buses->student?->code }}</td>
                                <td>{{ $students_buses->student->name }}</td>
                                <td>{{ $students_buses->bus?->department?->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($students_buses->created_at)->format('Y/m/d') }}</td>
                                <td>{{ $students_buses->bus?->code }}</td>
                                <td>{{ $students_buses->driver->name  }}</td>
                                <td>{{ $students_buses->bus->subscription->value }}</td>
                                @for($i = 0; $i < 13; $i++)
                                    @if($students_buses->bus->subscription->students_subscriped->where('student_id', $students_buses->student->id)->first()->rec_time == $i)
                                        @if($students_buses->bus->subscription->students_subscriped->where('student_id', $students_buses->student->id)->payment_status == 'upaid' || $students_buses->student->payment_)
                                            <td>{{$students_buses->bus->subscription->value}}</td>
                                        @else
                                            <td>X</td>
                                        @endif
                                    @else
                                        <td>X</td>
                                    @endif
                                @endfor
                                <td>{{$students_buses->bus->subscription->value}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$students_buses->links()}}
                </div>
            </div>


        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).on("click", "a.delete", function () {
            const selector = $(this);
            Swal.fire({
                title: 'Sure! You want to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete It!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: $(this).data("url"),
                        success: function (data) {
                            selector.closest('.removable-item').fadeOut('fast');
                            Swal.fire({
                                title: 'Deleted',
                                html: ' <span style="color:red">Item has been deleted</span> ',
                                timer: 2000,
                                icon: 'success'
                            })
                        }
                    })
                }
            })
        });
    </script>
@endpush
