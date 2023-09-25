@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
            <div class="row justify-content-end">
                <form id="exam_form" method="get" action="{{route('reports.reportStudentsAge')}}">
                    @csrf
                    <div class="row mb-4 align-items-center">
                        <div class="form-group col-sm-2">
                            <label for="exam_name">عدد الاطفال : </label>
                            <span type="text"
                                   class="form-label">
                            {{$count}}
                            </span>
                            @error('exam_name')
                            {{--                                        <span class="text-danger">{{ $message}}</span>--}}
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="student_name">بحث باسم الطفل</label>
                            <input type="text"
                                   class="form-control"
                                   name="student_name"
                                   value="{{request('student_name')}}"/>
                            @error('student_name')
                            {{--                                        <span class="text-danger">{{ $message}}</span>--}}
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="birthdate">بحث في تاريخ الميلاد</label>
                            <input type="date"
                                   class="form-control"
                                   name="birthdate"
                                   value="{{request('birthdate')}}"/>
                        </div>

                        <div class="form-group col-md-3">
                            <button type="submit"><i class="fa fa-filter"></i></button>
                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="form-group col-md-3">
                            <label for="from">بحث في عمر الاطفال من</label>
                            <input type="number"
                                   class="form-control"
                                   name="from"
                                   value="{{request('from')}}"/>
                        </div>
                        <div class="form-group col-md-3">

                            <label for="to">الي</label>
                            <input type="number"
                                   class="form-control"
                                   name="to"
                                   value="{{request('to')}}"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="studen_name">فترة</label>
                          <select name="period" class="form-select">
                              <option value="">اختر الفترة</option>
                              <option value="1"
                                {{request('period') == 1?'selected':''}}
                              >صباحي</option>
                              <option value="2"
                                  {{request('period') == 2?'selected':''}}
                              >مسائي</option>
                          </select>
                        </div>
                    </div>

                    <hr>

                </form>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>تقرير مفصل عن أعمار الطلبة وتواريخ ميلادهم</h2>
                    <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                    <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>كود الطفل</th>
                            <th>اسم الطفل</th>
                            <th>تاريخ الطفل</th>
                            <th>يوم</th>
                            <th>شهر</th>
                            <th>سنة</th>
                            <th>يوم</th>
                            <th>شهر</th>
                            <th>سنة</th>
                            <th>معاينة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students_age as $student_age)
                            <tr>
                                <td>{{ $student_age->code }}</td>
                                <td>{{ $student_age->name }}</td>
                                <td>{{ $student_age->birthdate }}</td>
                                @php
                                    $birthdate = \Carbon\Carbon::parse($student_age['birthdate']);
                                    $today = \Carbon\Carbon::now();

                                    // Calculate the difference in years, months, and days
                                    $years = $birthdate->diffInYears($today);
                                    $months = $birthdate->diffInMonths($today);
                                    $days = $birthdate->diffInDays($today);

                                @endphp
                                <td>{{  $days }}</td>
                                <td>{{  $months }}</td>
                                <td>{{  $years }}</td>
                                @php
                                    $birthdate = \Carbon\Carbon::parse($student_age['birthdate']);
                                    $today = \Carbon\Carbon::now()->month(10);

                                    // Calculate the difference in years, months, and days
                                    $years = $birthdate->diffInYears($today);
                                    $months = $birthdate->diffInMonths($today);
                                    $days = $birthdate->diffInDays($today);

                                @endphp
                                <td>{{  $days }}</td>
                                <td>{{  $months }}</td>
                                <td>{{  $years }}</td>

                                <td>
                                    <a href="{{route('reports.reportStudent',$student_age->id)}}" class="btn-action view"  title="{{ __('معايبة') }}">
                                       <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="row">
                    {{$students_age->links()}}
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
