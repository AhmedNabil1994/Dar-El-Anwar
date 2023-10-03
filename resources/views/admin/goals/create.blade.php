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
                                <h2>{{ trans('أضف هدف') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('أضف هدف') }}</li>
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
                            <h2>{{ trans('أضف هدف') }}</h2>
                        </div>
                        <form method="get" action="{{route('admin.goals.create')}}" class="row">
                            <div class="row">
                                <h1>{{trans("website.filter")}}</h1>
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="filterByDate">التاريخ :</label>
                                <input type="date" class="form-control" name="date" value="{{ \Carbon\Carbon::now()->toDateString() }}">
                            </div>
                            <!-- Department Filter -->
                            <div class="col-md-2 m-3">
                                <label for="filterBydept">القسم:</label>
                                <select class="form-control" name="filterBydept">
                                    <option value="">{{ trans("website.all") }}</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" @if(request('filterBydept') == $department->id) selected @endif>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Subject Filter -->
                            <div class="col-md-2 m-3">
                                <label for="filterBySubject">المادة:</label>
                                <select class="form-control" name="filterBySubject">
                                    <option value="">{{ trans("website.all") }}</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" @if(request('filterBySubject') == $subject->id) selected @endif>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Instructor Filter -->
                            <div class="col-md-2 m-3">
                                <label for="filterByInstructor">المعلم:</label>
                                <select class="form-control" name="filterByInstructor">
                                    <option value="">{{ trans("website.all") }}</option>
                                    @foreach($instructors as $instructor)
                                        <option value="{{ $instructor->id }}" @if(request('filterByInstructor') == $instructor->id) selected @endif>{{ $instructor->employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 m-3">
                                <div class="input_ _group mb-25">
                                    <label>{{trans('website.class')}} <span class="text-danger">*</span></label>
                                    <select name="class_id" class="form-control" >
                                    <option value="" selected>{{trans('website.class')}}</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"
                                                @if(request('class_id') == $class->id) selected @endif
                                        >{{ $class->name }}</option>
                                        @endforeach
                                        </select>

                                </div>
                            </div>
                            <!-- Code Filter -->
                            <div class="col-md-2 m-3">
                                <label for="filterByCode">المواعيد:</label>
                                <select class="form-control" name="filterByCourse">
                                    <option value="">{{ trans("website.all") }}</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" @if(request('filterByCourse') == $course->id) selected @endif>{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 m-3">
                                <label for="filterByTargetDate">تاريخ التقييم المستهدف :</label>
                                <input  type="date" class="form-control" name="target_date" value="{{request('target_date')}}" required>
                            </div>
                            <div class="col-md-2 m-3">
                                <div class="input_ _group text-black">
                                    <label>{{ trans('اسم الهدف') }} <span class="text-danger">*</span></label>
                                    <input  type="text" class="form-control" name="goal_name" value="{{request('goal_name')}}">
                                </div>
                            </div>

                            <div class="col-md-2 m-3">
                                <div class="input_ _group text-black">
                                    <label>{{ trans('website.exam') }} <span class="text-danger">*</span></label>
                                    <select type="text" name="exam_id" class="form-select" required>
                                        <option value="">__</option>
                                        @foreach($exams as $exam)
                                            <option value="{{$exam->id}}"
                                            {{$exam->id == request('exam_id')? 'selected':''}}
                                            >{{$exam->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('exam_id'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('exam_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn buttons-style mb-3">{{trans("عرض")}}</button>
                            </div>

                        </form>

                        <form action="{{route('admin.goals.store',)}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row mb-3">

                                <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                                    <table id="customers-table" class="row-border data-table-filter table-style table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>اسم الطالب</th>
                                            <th>الهدف</th>
                                            <th>ملاحظات</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <input  type="hidden" name="exam_id" value="{{request('exam_id')}}">
                                            <input  type="hidden" name="date" value="{{request('date')}}">
                                            <input  type="hidden" name="dept" value="{{request('filterBydept')}}">
                                            <input  type="hidden" name="subject" value="{{request('filterBySubject')}}">
                                            <input  type="hidden" name="instructor" value="{{request('filterByInstructor')}}">
                                            <input  type="hidden" name="class_id" value="{{request('class_id')}}">
                                            <input  type="hidden" name="course" value="{{request('filterByCourse')}}">
                                            <input  type="hidden" name="target_date" value="{{request('target_date')}}">
                                            <tr class="removable-item">
                                                <td><input  type="hidden" name="student_id[]" value="{{$student->id}}">{{$student->name}}</td>
                                                <td><input  name="goal_name[]" class="form-control" value="{{request('goal_name')}}"></td>
                                                <td><textarea name="notes[]" class="form-control" style="height: 50px;"></textarea></td>
                                                <td>
                                                    <a onclick="deleteRow(this)"><i class="fa fa-delete-left"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @if($students->count() > 0)
                                <div class="col-md-3 text-right">
                                    <button class="btn buttons-style" type="submit">{{ trans('website.save') }}</button>

                                </div>
                            @endif
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')

@endpush

@push('script')
    <script src="{{ asset('admin/js/custom/coupon-create.js') }}"></script>
    <script>
        function deleteRow(button) {
            var row = button.closest('tr');
            row.remove();
        }
    </script>
@endpush
