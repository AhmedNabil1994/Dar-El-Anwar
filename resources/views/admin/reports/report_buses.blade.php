@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">    
        <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('أضف صفحة') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('كل الصفحات') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('أضف صفحة') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            <div class="customers__area bg-style mb-30">    
            <form method="GET" action="{{route('reports.reportInvoices')}}"
                  class="form-container row align-items-end justify-content-center">
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
            </div>

            <div class="row">
            <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
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
                            <th>المتبقي</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students_buses as $student_bus)
                            <tr>
                                <td>{{ $student_bus->student?->code }}</td>
                                <td>{{ $student_bus->student->name }}</td>
                                <td>{{ $student_bus->bus?->subscription->department?->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($student_bus->created_at)->format('Y/m/d') }}</td>
                                <td>{{ $student_bus->bus?->code }}</td>
                                <td>{{ $student_bus->bus->driver?->name  }}</td>
                                <td>{{ $student_bus->bus->subscription->value }}</td>
                                @php
                                    $s_s = \App\Models\StudentSubscription::where('student_id',$student_bus->student->id)
                                ->where('subscription_id',$student_bus->bus->subscription->id)->first()
                                @endphp
                                <td>{{$student_bus->bus->subscription?->value * ($student_bus->bus->subscription?->batch - $s_s->rec_time)}}</td>
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
