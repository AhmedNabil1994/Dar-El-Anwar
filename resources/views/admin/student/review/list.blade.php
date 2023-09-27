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
                                <h2>{{ trans('التقييمات') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('التقييمات')}}</li>
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
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ __('التقييمات') }}</h2>
                        </div>
                        <form method="get" action="{{route('student.review')}}" class="row d-flex align-items-end">
                            <div class="col-sm-3 m-3">
                                <label for="filterByStudent">الطالب :</label>
                                <select class="form-control" name="student_id">
                                    <option value="">__</option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}" {{$student->id == request('student_id') ? 'selected' : ''}}>{{$student->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3 m-3">
                                <button class="btn buttons-style" type="submit"><i class="fa fa-filter"></i></button>
                            </div>

                        </form>
                        <div class="customers__table">
                            <table id="" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ trans('كود التقييم') }}</th>
                                    <th>{{ trans('تاريخ التقييم') }}</th>
                                    <th>{{ trans('نوع التقييم') }}</th>
                                    <th>{{ trans('مسئول التقييم') }}</th>
                                    <th>{{ trans('فحص التقييم') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students_goals as $student_goal)
                                    <tr class="removable-item">
                                        <td>{{$student_goal->goal->id}}</td>
                                        <td>{{$student_goal->goal->target_evaluation_date}}</td>
                                        <td>{{$student_goal->goal->name}}</td>
                                        <td>{{$student_goal->goal->instructor?->employee?->name}}</td>
                                        <td><a href="{{ route('student.getReview',[$student_goal->student,$student_goal->goal]) }}" class="btn buttons-style">تقييم</a></td>
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
