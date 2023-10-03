@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="customers__area__header bg-style mb-30">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ trans('بيانات الهدف') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('بيانات الهدف')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="row">
                <div class="customers__area bg-style mb-30">
                <div class="col-md-12">
                        <div class="row">
                            <!-- Name Filter -->
                            <div class="col-md-2 m-3">
                                <label for="filterByClass">{{trans("website.class")}}:</label>
                                <input disabled class="form-control" value="{{$goal->class_room?->name}}">
                            </div>

                            <div class="col-md-2 m-3">
                                <label for="filterBy{Code">المواعيد:</label>
                                <input disabled class="form-control" value="{{$goal->course?->title}}">
                            </div>

                            <!-- Instructor Filter -->
                            <div class="col-md-2 m-3">
                                <label for="filterByInstructor">المدرس:</label>

                                <input disabled class="form-control" value="{{$goal->instructor->employee?->name}}">
                            </div>

                            <div class="col-md-2 m-3">
                                <label for="filterByDate">تاريخ التقييم :</label>
                                <input disabled type="date" class="form-control" name="date" value="{{$goal->target_evaluation_date}}">
                            </div>

                            <!-- Subject Filter -->
                            <div class="col-md-2 m-3">
                                <label for="goal_id">الهدف:</label>
                                <input disabled type="text" class="form-control"  value="{{$goal->name}}">
                            </div>
                        </div>
                        <div class="customers__table">
                            <table id="" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ trans('تم تقييمه') }}</th>
                                    <th>{{ trans('أسماء الطلاب') }}</th>
                                    <th>{{ trans('احراء') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr class="removable-item">
                                        <td><input type="checkbox" class="bx-checkbox"
                                            {{$student->exam_result->where('goal_id',$goal->id)->count() > 0?'checked':''}}></td>
                                        <td>{{$student->name}}</td>
                                        <td><a href="{{ route('admin.goals.create.student.review',[$student,$goal]) }}" class="btn buttons-style">تقييم</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/jquery.dataTables.min.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/data-table-page.js')}}"></script>
@endpush
