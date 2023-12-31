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
                                <h2>{{trans('الاهداف')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('الاهداف')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row justify-content-center">

                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans("كل الاهداف") }}</h2>
                        </div>

{{--                        <form method="get" action="{{route('admin.course.index')}}" class="row">--}}
{{--                            <div class="row">--}}
{{--                                <h1>{{trans("website.filter")}}</h1>--}}
{{--                            </div>--}}
{{--                            <!-- Code Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByCode">كود الدورة:</label>--}}
{{--                                <select class="form-control" name="filterByCode">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($codes as $code)--}}
{{--                                        <option value="{{ $code }}" @if(request('filterByCode') == $code) selected @endif>{{ $code }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Name Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByName">اسم الدورة:</label>--}}
{{--                                <select class="form-control" name="filterByName">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($titles as $title)--}}
{{--                                        <option value="{{ $title }}" @if(request('filterByName') == $title) selected @endif>{{ $title }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Instructor Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByInstructor">المدرب:</label>--}}
{{--                                <select class="form-control" name="filterByInstructor">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($instructors as $instructor)--}}
{{--                                        <option value="{{ $instructor->id }}" @if(request('filterByInstructor') == $instructor->id) selected @endif>{{ $instructor->employee->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Subject Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterBySubject">المادة:</label>--}}
{{--                                <select class="form-control" name="filterBySubject">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($subjects as $subject)--}}
{{--                                        <option value="{{ $subject->id }}" @if(request('filterBySubject') == $subject->id) selected @endif>{{ $subject->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Department Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterBydept">القسم:</label>--}}
{{--                                <select class="form-control" name="filterBydept">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($departments as $department)--}}
{{--                                        <option value="{{ $department->id }}" @if(request('filterBydept') == $department->id) selected @endif>{{ $department->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Content Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByContent">المحتوي:</label>--}}
{{--                                <select class="form-control" name="filterByContent">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($contents as $content)--}}
{{--                                        <option value="{{ $content }}" @if(request('filterByContent') == $content) selected @endif>{{ $content }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Time Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByTime">الموعد:</label>--}}
{{--                                <select class="form-control" name="filterByTime">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($times as $time)--}}
{{--                                        <option value="{{ $time }}" @if(request('filterByTime') == $time) selected @endif>{{ $time }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Price Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByPrice">قيمة الإشتراك:</label>--}}
{{--                                <select class="form-control" name="filterByPrice">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($prices as $price)--}}
{{--                                        <option value="{{ $price }}" @if(request('filterByPrice') == $price) selected @endif>{{ $price }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Start Date Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByStartDate">التاريخ من:</label>--}}
{{--                                <select class="form-control" name="filterByStartDate">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($start_dates as $start_date)--}}
{{--                                        <option value="{{ $start_date }}" @if(request('filterByStartDate') == $start_date) selected @endif>{{ $start_date }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- End Date Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByEndDate">التاريخ الى:</label>--}}
{{--                                <select class="form-control" name="filterByEndDate">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($end_dates as $end_date)--}}
{{--                                        <option value="{{ $end_date }}" @if(request('filterByEndDate') == $end_date) selected @endif>{{ $end_date }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <!-- Student Count Filter -->--}}
{{--                            <div class="col-md-2 m-3">--}}
{{--                                <label for="filterByCount">عدد الطلبة:</label>--}}
{{--                                <select class="form-control" name="filterByCount">--}}
{{--                                    <option value="">{{ trans("website.all") }}</option>--}}
{{--                                    @foreach($student_counts as $student_count)--}}
{{--                                        <option value="{{ $student_count }}" @if(request('filterByCount') == $student_count) selected @endif>{{ $student_count }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <button type="submit" class="btn buttons-style">{{trans("website.save")}}</button>--}}
{{--                                <a href="{{route('admin.course.index')}}" class="btn btn-secondary">{{trans("website.cancel")}}</a>--}}
{{--                            </div>--}}

{{--                        </form>--}}

                        <div class="row mb-4">
                            <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                                <table id="customers-table" class="row-border data-table-filter table-style table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>الطالب</th>
                                        <th>المادة</th>
                                        <th>المعلم</th>
                                        <th>الصف / الموعد</th>
                                        <th>تاريخ التقييم المستهدف</th>
                                        <th>هدف مشترك</th>
                                        <th>ملاحظات</th>
                                        <th>حالة التقييم</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($goals as $goal)
                                        <tr class="removable-item">
                                            <td>{{$goal->code}}</td>
                                            <td>{{$goal->title}}</td>
                                            <td>{{$goal->instructor?->employee?->name}}</td>
                                            <td>{{$goal->subject?->name}}</td>
                                            <td>{{$goal->department?->name}}</td>
                                            <td>{{$goal->content}}</td>
                                            <td>{{Carbon\Carbon::parse($course->time)->format('h:i A')}}</td>
                                            <td>{{$course->price}}</td>
                                            <td>{{$course->date}}</td>
                                            <td>{{$course->students?->count()}}</td>
                                            <td>
                                                @if($course->status == 1)
                                                    <span class="status active">{{ __('website.active') }}</span>
                                                @else
                                                    <span class="status active">{{ __('غير نشط') }}</span>
                                                @endif
                                            </td>
                                            <td>

                                                <a href="{{route('admin.course.edit', [$course])}}" class="btn-action mr-30" title="View Details">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);" data-url="{{route('admin.course.delete', $course)}}" class="btn-action delete" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
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
