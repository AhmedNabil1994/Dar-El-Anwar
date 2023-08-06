@extends('layouts.admin')

@section('content')

    <div class="page-content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb__content">
                    <div class="breadcrumb__content__left">
                        <div class="breadcrumb__title">
                            <h2>{{ __('Create Course') }}</h2>
                        </div>
                    </div>
                    <div class="breadcrumb__content__right">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admins.index')}}">{{ __('Manage Courses') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Create Course') }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
    <div class="instructor-upload-course-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{__('Create Course')}}</h5>
                    </div>
                    <div class="ibox-content mt-15">

                        <form method="post" action="{{route('admin.course.store')}}">
                            @csrf
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="code">{{__('Code')}}</label>

                                    <input type="text"
                                           class="form-control"
                                           id="code"
                                           name="code" />

                                    @error('code')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">{{__('Title')}}</label>

                                    <input type="text"
                                           class="form-control"
                                           id="title"
                                           name="title" />

                                    @error('title')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="instructor_id">{{__('Instructor')}}</label>

                                    <select type="text"
                                           class="form-control"
                                           id="instructor_id"
                                           name="instructor_id" >
                                        <option value="">Seclect Teacher</option>
                                        @foreach($instructors as $instructor)
                                            <option value="{{$instructor->id}}">{{$instructor->employee->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('instructor_id')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="subject_id">{{__('Subject')}}</label>

                                    <select type="text"
                                           class="form-control"
                                           id="subject_id"
                                           name="subject_id" >
                                        <option value="">Seclect Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('subject_id')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="department_id">{{__('Department')}}</label>

                                    <select type="text"
                                           class="form-control"
                                           id="department_id"
                                           name="department_id" >
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('code')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="content">{{__('Content')}}</label>

                                    <textarea type=""
                                           class="form-control"
                                           id="content"
                                           name="content">
                                    </textarea>

                                    @error('content')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="price">{{__('Price')}}</label>

                                    <input type="number"
                                            class="form-control"
                                            id="price"
                                            name="price" />

                                    @error('price')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointment">{{__('Appointment')}}</label>

                                    <input type="date"
                                              class="form-control"
                                              id="appointment"
                                              name="appointment"/>
                                    @error('appointment')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="date_to">{{__('Date TO')}} :</label>
                                    <input type="date" id="date_to" name="date_to"
                                           class="form-control">

                                    @error('date_to')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_from">{{__('Date From')}} :</label>
                                    <input type="date" id="date_from" name="date_from"
                                           class="form-control">

                                    @error('date_from')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="status">{{__('Status')}}  </label>
                                    <input type="checkbox" name="status"
                                           class="input__checkbox">

                                    @error('status')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{__('Save')}}</button>
                                <a href="{{route('admin.course.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
                            </div>
                        </form>

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
