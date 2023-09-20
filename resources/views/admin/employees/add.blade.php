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
                                <h2>{{trans('website.addEmployee') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.addEmployee') }}</li>
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
                            <h2>{{ trans('website.addEmployee') }}</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" class="row" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                                @csrf



                                <div class="form-group col-md-6 mb-4">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="upload-img-box mb-25">
                                                <input type="file" name="image" id="image" accept="image/*" onchange="previewFile(this)">
                                                <img id="upload-img-box-icon" >
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{trans('website.image')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="form-group col-md-3  mb-4">
                                    <label for="name" class="form-label">{{ trans('website.name') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name', $employee?->name) }}"  autocomplete="name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="job_title" class="form-label">{{ trans('website.job_title') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <select  id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title', $employee?->job_title) }}"  autocomplete="job_title">
                                            <option value="">{{trans("website.selectYourJobTitle")}}</option>
                                            <option value="teacher">{{trans("website.teacher")}}</option>
                                            <option value="driver">{{trans("website.driver")}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ trans('website.address') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $employee?->address) }}"  autocomplete="address" required>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="qualification" class="col-md-4 col-form-label text-md-right">{{ trans('website.qualifications') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input required id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror"
                                               name="qualification" value="{{ old('qualification', $employee?->qualification) }}"  autocomplete="qualification">
                                        @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="university" class="col-md-4 col-form-label text-md-right">{{ trans('website.collage') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university', $employee?->university) }}"  autocomplete="university" required>
                                        @error('university')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="graduation_date" class="col-md-4 col-form-label text-md-right">{{  trans('website.date_of_graduation') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="graduation_date" type="date" class="form-control @error('graduation_date') is-invalid @enderror" name="graduation_date" value="{{ old('graduation_date', $employee?->graduation_date) }}"  autocomplete="graduation_date" required>
                                        @error('graduation_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="national_id" class="col-md-4 col-form-label text-md-right">{{ trans('website.nationalId') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id', $employee?->national_id) }}"  autocomplete="national_id" required>
                                        @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('website.email') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employee?->email) }}"  autocomplete="email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="level" class="col-md-4 col-form-label text-md-right">{{ trans('website.standard') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level', $employee?->level) }}"  autocomplete="level" required>
                                        @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ trans("website.phone_number") }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $employee?->phone) }}"  autocomplete="phone" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ trans('website.birth_date') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate', $employee?->birthdate) }}"  autocomplete="birthdate" required>
                                        @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group col-md-3 mb-4">
                                    <label for="management" class="col-md-4 col-form-label text-md-right">{{ trans('website.managment') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select  id="management" type="text" class="form-control @error('job_title')
                                         is-invalid @enderror" name="management"
                                                 value="{{ old('management', $employee?->management) }}"  autocomplete="management">
                                            <option value="teacher-management">{{trans("website.teacher_manager")}}</option>
                                            <option value="driver-management">{{trans("website.driver_manager")}}</option>
                                        </select>
                                        @error('management')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>


                                <div class="form-group col-md-3 mb-4">
                                    <label for="department" class="col-md-4 col-form-label text-md-right">{{ trans('website.department') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <select type="text"
                                                class="form-control"
                                                id="department"
                                                name="department" >
                                            <option value="">اختر قسم</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="salary" class="col-md-4 col-form-label text-md-right">{{ trans('website.salary') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input required id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary', $employee?->salary) }}"  autocomplete="salary">
                                        @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="salary_cycle" class="col-md-4 col-form-label text-md-right">{{ trans('website.salary_cycle') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <select id="salary_cycle" class="form-control @error('salary_cycle') is-invalid @enderror"
                                                name="salary_cycle"  autocomplete="salary_cycle" required>
                                            <option value="">{{ trans('website.select_salary_cycle') }}</option>
                                            <option value="monthly" {{ old('salary_cycle', $employee?->salary_cycle) == 'monthly' ? 'selected' : '' }}>{{ trans('website.monthly') }}</option>
                                            <option value="weekly" {{ old('salary_cycle', $employee?->salary_cycle) == 'weekly' ? 'selected' : '' }}>{{ trans("website.weekly") }}</option>
                                            <option value="daily" {{ old('salary_cycle', $employee?->salary_cycle) == 'daily' ? 'selected' : '' }}>{{ trans('website.daily') }}</option>
                                        </select>
                                        @error('salary_cycle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="hiring_date" class="col-md-4 col-form-label text-md-right">{{ trans('website.hiring_date') }} <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input required id="hiring_date" type="date" class="form-control @error('hiring_date') is-invalid @enderror" name="hiring_date" value="{{ old('hiring_date', $employee?->hiring_date) }}"  autocomplete="hiring_date">
                                        @error('hiring_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="departure_time" class="col-md-4 col-form-label text-md-right">
                                        {{ trans('website.departure_date') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input id="hiring_date" type="time" class="form-control @error('departure_time')
                                         is-invalid @enderror" name="departure_time"
                                               value="{{ old('departure_time', $employee?->departure_time) }}"
                                               autocomplete="departure_time" required>
                                        @error('departure_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="attendance_time" class="col-md-4 col-form-label text-md-right">
                                        {{ trans('website.attendance_time') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input required id="attendance_time" type="time" class="form-control @error('attendance_time')
                                         is-invalid @enderror" name="attendance_time"
                                               value="{{ old('attendance_time', $employee?->attendance_time) }}"
                                               autocomplete="departure_time">
                                        @error('attendance_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="work_days" class="col-md-4 col-form-label text-md-right">
                                        {{ trans('website.work_days') }} <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input required id="work_days" type="number" class="form-control
                                        @error('work_days') is-invalid @enderror" name="work_days" value="{{ old('work_days', $employee?->work_days) }}"
                                                autocomplete="work_days">
                                        @error('work_days')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="branch" class="col-md-4 col-form-label text-md-right">{{ trans('website.branch') }}
                                        <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <select name="branch_id" class="form-control" />
                                        <option value="" selected>{{trans('website.select_branch')}}</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}" >{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('branch')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="dependentDiv" style="display: none;">
                                <div class="form-group col-md-3 mb-4">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة السر') }}
                                        <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                            <input required id="password" type="password" class="form-control
                                            @error('password') is-invalid @enderror"
                                                   name="password" autocomplete="new-password" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ trans("website.requiredField") }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تأكيد كلمة السر') }}
                                                <span class="required-star">*</span></label>
                                            <div class="col-md-12">
                                                <input id="password_confirmation" type="password"
                                                   class="form-control" @error('password_confirmation') is-invalid @enderror"
                                                   name="password_confirmation" autocomplete="new-password" required>
                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ trans("website.requiredField") }}</strong>
                                                    </span>
                                                    @enderror
                                            </div>
                                </div>
                                </div>

                                </div>
                               <div class="button-group">
                                    <button type="submit" class="btn buttons-style">
                                        {{ trans('website.submit') }}
                                    </button>
                                </div>
                            </form>


                        </div>
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
            <script>
                $(document).ready(function() {
                    $('#job_title').change(function() {
                        var selectedOption = $(this).val();

                        if (selectedOption === 'driver') {
                            $('#dependentDiv').hide();
                        } else {
                            $('#dependentDiv').show();
                        }
                    });
                });
            </script>
            <script>
                function previewFile(input) {
                    "use strict";

                    const preview = document.getElementById('upload-img-box-icon');
                    const file = input.files[0];
                    const reader = new FileReader();

                    if(input.files[0].size > 1000000){
                        alert("Maximum file size is 1MB!");
                    } else {
                        reader.onload = function() {
                            console.log(reader)
                            preview.src =  reader.result;
                        };
                        if(file) {
                            reader.readAsDataURL(file);
                        }
                        else {
                            preview.src = "";
                        }
                    }
                }
            </script>
    @endpush
