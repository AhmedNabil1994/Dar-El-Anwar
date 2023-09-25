@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ trans('اهداف الطلاب') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('اهداف الطلاب')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <form method="get" action="{{route('admin.goals.index.review')}}" class="row">
                            <div class="row">
                                <h1>{{trans("website.filter")}}</h1>
                            </div>

                            <!-- Name Filter -->
                            <div class="col-md-2 m-3">
                                <label for="filterByClass">{{trans("website.class")}}:</label>
                                <select class="form-control" name="filterByClass">
                                    <option value="">__</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}" {{$class->id == request('filterByClass') ? 'selected' : ''}}>{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 m-3">
                                <label for="filterBy{Code">المواعيد:</label>
                                <select class="form-control" name="filterByCourse">
                                    <option value="">__</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" @if(request('filterByCourse') == $course->id) selected @endif>{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Instructor Filter -->
                            <div class="col-md-2 m-3">
                                <label for="filterByInstructor">المدرس:</label>
                                <select class="form-control" name="filterByInstructor">
                                    <option value="">{{ trans("website.all") }}</option>
                                    @foreach($instructors as $instructor)
                                        <option value="{{ $instructor->id }}" @if(request('filterByInstructor') == $instructor->id) selected @endif>{{ $instructor->employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 m-3">
                                <label for="filterByDate">تاريخ التقييم :</label>
                                <input type="date" class="form-control" name="date" value="{{request('date')}}">
                            </div>

                            <!-- Subject Filter -->
                            <div class="col-md-2 m-3">
                                <label for="goal_id">الهدف:</label>
                                <select class="form-control" name="goal_id">
                                    <option value="">{{ trans("website.all") }}</option>
                                    @foreach($filter_goals as $goal)
                                        <option value="{{ $goal->id }}" @if(request('goal_id') == $goal->id) selected @endif>{{ $goal->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 m-2">
                                <button type="submit" class="btn" style="background-color: #50bfa5;">
                                    <i class="fa fa-filter"></i>
                                </button>
                            </div>

                        </form>
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ __('اهداف الطلاب') }}</h2>
                        </div>
                        <div class="customers__table">
                            <table id="" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ trans('الصف/المواعيد') }}</th>
                                    <th>{{ trans('المدرس') }}</th>
                                    <th>{{ trans('تاريخ التقييم') }}</th>
                                    <th>{{ trans('الهدف') }}</th>
                                    <th>{{ trans('website.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($goals as $goal)
                                    <tr class="removable-item">
                                        @if($goal->class_room)
                                            <td>{{$goal->class_room?->name}}</td>
                                            <td>{{$goal->instructor?->employee?->name}}</td>
                                            <td>{{\Carbon\Carbon::parse($goal->target_evaluation_date)->format('d/m/Y')}}</td>
                                            <td>{{$goal->name}}</td>
                                            <td><a href="{{route('admin.goals.create.review',$goal->id)}}"><i class="fa fa-arrow-circle-left"></i></a></td>
                                        @elseif($goal->course)
                                            <td>{{$goal->course?->title}}</td>
                                            <td>{{$goal->instructor?->employee?->name}}</td>
                                            <td>{{\Carbon\Carbon::parse($goal->target_evaluation_date)->format('d/m/Y')}}</td>
                                            <td>{{$goal->name}}</td>
                                            <td><a href="{{route('admin.goals.create.review',$goal->id)}}"><i class="fa fa-arrow-circle-left"></i></a></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$goals->links()}}
                            </div>
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
