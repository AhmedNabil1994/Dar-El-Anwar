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
                                <h2>{{ trans('website.add_student') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.add_student') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.add_student') }}</h2>
                        </div>
                        <form action="{{route('admin.followup.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.class')}} <span class="text-danger">*</span></label>
                                        <select name="class_id" class="form-control" />
                                        <option value="" selected>{{trans('website.class')}}</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('class_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('class_id') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.teacher')}} <span class="text-danger">*</span></label>
                                        <select name="teacher_id" class="form-control" />
                                        <option value="" selected>{{trans('website.teacher')}}</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}" >{{ $instructor->employee?->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('teacher_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('teacher_id') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.subject')}} <span class="text-danger">*</span></label>
                                        <select name="subject_id" class="form-control" />
                                        <option value="" selected>{{trans('website.subject')}}</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('subject_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('subject_id') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.status')}} <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" />
                                            <option value="" selected>{{trans('website.status')}}</option>
                                            <option value="1" >active</option>
                                            <option value="0" >inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.type')}} <span class="text-danger">*</span></label>
                                        <select name="type" class="form-control" />
                                        <option value="" selected>{{trans('website.type')}}</option>
                                        <option value="1" >follow up teacher</option>
                                        <option value="2" >follow up quran</option>
                                        <option value="3" >follow up reading</option>
                                        <option value="4" >follow up classroom</option>
                                        </select>
                                    </div>
                                </div>

                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit">{{ trans('website.save') }}</button>
                                </div>
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

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
    <script src="{{asset('admin/js/custom/admin-profile.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#government-select').change(function() {
                var governmentId = $(this).val();
                // alert(governmentId);
                $.ajax({
                    // url: '/cities/1',
                    url: '/cities/' + governmentId,
                    type: 'GET',
                    success: function(response) {
                        var options = '';
                        // console.log(response);

                        $.each(response, function(key, value) {
                                options += '<option value="' + value.id + '">' + value.city_name_en + '</option>';
                            }
                        );

                        // alert(response);
                        $('#city-select').html(options);
                    },
                    // error: function(xhr, textStatus, errorThrown) {
                    //     console.log(xhr.responseText);
                    //     alert('Error: ' + xhr.responseText);
                    // }
                });
            });
        });
    </script>
@endpush
