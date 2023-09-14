@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Add Page') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('All Pages') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Page') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="form-group col-md-3">
                    <a href="{{route('stores.movement.create')}}" class="form-control btn">
                        <i class="fas fa-cash-register"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>تقرير مفصل عن أعمار الطلبة وتواريخ ميلادهم</h2>
                    <table class="table table-bordered">
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
                                    <a href="{{route('student.view',$student_age->id)}}" class="btn-action view"  title="{{ __('معايبة') }}">
                                       <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
