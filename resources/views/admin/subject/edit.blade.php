
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
                                <h2>{{ trans('website.editSubject') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.subject.index')}}">{{ trans('website.subjectList') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.editSubject') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.editSubject') }}</h2>
                        </div>
                        <form action="{{route('admin.subject.update', $subject->id)}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="input__group text-black">
                                        <label>{{ trans('website.department') }} <span class="text-danger">*</span></label>
                                        <select type="text" name="department_id" class="form-select" required>
                                            <option value="">__</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" {{$department->id == $subject->department?->id? 'selected' : ''}}>{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('department_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('department_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="input__group text-black">
                                        <label>{{ trans('website.teacher') }} <span class="text-danger">*</span></label>
                                        <select type="text" name="instructor_id" class="form-select" required>
                                            <option value="">__</option>
                                            @foreach($instructors as $intructor)
                                                <option value="{{$intructor->id}}" {{$intructor->id == $subject->instructor?->id? 'selected' : ''}}>{{$intructor->employee->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('instructor_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('department_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="input__group text-black">
                                        <label>{{ trans('website.subjectName') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="subject_name" value="{{ $subject->name }}" placeholder="{{ __('Type Subject name') }}"
                                               class="form-control" required>
                                        @if ($errors->has('subject_name'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('subject_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    <button class="btn buttons-style" type="submit">{{ trans('website.update') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection


@push('script')
    <script src="{{ asset('admin/js/custom/coupon-edit.js') }}"></script>
@endpush
