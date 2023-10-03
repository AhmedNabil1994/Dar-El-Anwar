@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="customers__area__header bg-style mb-30">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ trans('تعديل دورة') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                      <li class="breadcrumb-item active" aria-current="page">{{trans('تعديل دورة') }}</li>
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
                <div class="instructor-upload-course-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>{{trans("website.createCourse")}}</h5>
                                </div>
                                <div class="ibox-content mt-15">

                                    <form method="post" action="{{route('admin.course.update',$course)}}">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="title">{{trans('اسم الدورة')}}</label>

                                                <input type="text"
                                                       class="form-control"
                                                       id="title"
                                                       name="title"
                                                       value="{{$course->title}}"
                                                       required/>

                                                @error('title')
                                                <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="instructor_id">{{trans('المدرب')}}</label>
                                                <select type="text"
                                                        class="form-control"
                                                        id="instructor_id"
                                                        name="instructor_id"
                                                        required>
                                                    <option value="">{{trans("website.selectInstructor")}}</option>
                                                    @foreach($instructors as $instructor)
                                                        <option value="{{$instructor->id}}"
                                                        {{$course->instructor_id == $instructor->id ? "selected" : ""}}
                                                        >{{$instructor->employee->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="subject_id">{{trans('website.subject')}}</label>

                                                <select name="subject_id" class="form-control" required>
                                                    <option value="" selected>{{trans('website.subject')}}</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}"
                                                        {{$course->subject_id == $subject->id ? "selected" : ""}}
                                                        >{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="department_id">{{trans('website.department')}}</label>
                                                <select type="text"
                                                        class="form-control"
                                                        id="department_id"
                                                        name="department_id"
                                                        required>
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}"
                                                            {{$course->department_id == $department->id ? "selected" : ""}}
                                                        >{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="content">{{trans('website.content')}}</label>

                                                <textarea   class="form-control"
                                                            id="content"
                                                            name="content"
                                                            required>{{$course->content}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="price">{{trans('قيمة الاشتراك')}}</label>
                                                <input type="number"
                                                       class="form-control"
                                                       id="price"
                                                       name="price"
                                                       value="{{$course->price}}"
                                                       required/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="date_to">{{trans('الموعد')}} :</label>
                                                <input type="time" id="date_time" name="date_time"
                                                       value="{{$course->time}}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-4">

                                            <div class="form-group col-md-6">
                                                <label for="date_from">{{trans('website.date')}} :</label>
                                                <input type="date" id="date" name="date"
                                                       value="{{$course->date}}"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="status">{{trans('website.status')}}  </label>
                                                <div class="btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-danger ">
                                                        <input type="radio" name="status" id="option1" value="0" autocomplete="off" {{$course->status == 0 ? "checked" : ""}}> متوقف
                                                    </label>
                                                    <label class="btn btn-success active">
                                                        <input type="radio" name="status" id="option2" value="1" autocomplete="off" {{$course->status == 1 ? "checked" : ""}}>   نشط
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn buttons-style">{{trans('website.save')}}</button>
                                            <a href="{{route('admin.course.index')}}" class="btn btn-secondary">{{trans('website.cancel')}}</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
        </div>
        @endsection

        @push('script')
            <script src="{{asset('frontend/assets/js/custom/upload-course.js')}}"></script>
            <script src="{{ asset('common/js/jquery.repeater.min.js') }}"></script>
            <script src="{{ asset('common/js/add-repeater.js') }}"></script>
        @endpush
