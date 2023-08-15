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
                                <h2>{{ trans('website.editEmployee') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Employees') }}</li>
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
                            <h2>{{ trans('website.editEmployee') }}</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('employees.update',$employee->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-3">
                                    <label class="col-md-4 col-form-label text-md-right" for="signinSrEmail">
                                        {{ trans('website.avatar') }}
                                        <small>(100x100)</small>
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" data-type="image">
                                            <div class="input-group-prepend">
                                                <input class="input-group-text bg-soft-secondary font-weight-medium"
                                                   type="file" id="file" name="image" value="{{ $employee?->image }}"/>
                                            </div>
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">
                                        {{ trans('website.name') }}
                                         <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $employee->name) }}" required autocomplete="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ trans('website.address') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $employee->address) }}" required autocomplete="address">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="qualification" class="col-md-4 col-form-label text-md-right">{{ trans("website.qualifications") }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ old('qualification', $employee->qualification) }}" required autocomplete="qualification">
                                        @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="university" class="col-md-4 col-form-label text-md-right">{{ trans("website.collage") }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university', $employee->university) }}" required autocomplete="university">
                                        @error('university')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="graduation_date" class="col-md-4 col-form-label text-md-right">{{ trans("website.date_of_graduation") }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="graduation_date" type="date" class="form-control @error('graduation_date') is-invalid @enderror" name="graduation_date" value="{{ old('graduation_date', $employee->graduation_date) }}" required autocomplete="graduation_date">
                                        @error('graduation_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="national_id" class="col-md-4 col-form-label text-md-right">{{ trans('website.nationalId') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id', $employee->national_id) }}" required autocomplete="national_id">
                                        @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('website.email') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employee->email) }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ trans('website.phone_number') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $employee->phone) }}" required autocomplete="phone">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ trans('website.birth_date') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate', $employee->birthdate) }}" required autocomplete="birthdate">
                                        @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                                                                        
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ trans('website.job_title') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <select  id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title', $employee?->job_title) }}"  autocomplete="job_title">
                                            <option value="teacher">{{trans("website.teacher")}}</option>
                                            <option value="driver">{{trans("website.driver")}}</option>
                                        </select>
                                        @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                            
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="management" class="col-md-4 col-form-label text-md-right">{{ trans('website.managment') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-6">
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
                                <div class="form-group row mb-3">
                                    <label for="department" class="col-md-4 col-form-label text-md-right">{{ trans('website.department') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department', $employee->department) }}" required autocomplete="department">
                                        @error('department')
                                        <span class="invalid-feedback" role="alert">
                                                                                
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                                                            </span>
                                                                                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="salary_cycle" class="col-md-4 col-form-label text-md-right">{{ trans("website.salary_cycle") }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <select id="salary_cycle" class="form-control @error('salary_cycle') is-invalid @enderror" name="salary_cycle" required autocomplete="salary_cycle">
                                            <option value="monthly" {{ old('salary_cycle', $employee->salary_cycle) == 'monthly' ? 'selected' : '' }}>{{ trans('website.monthly') }}</option>
                                            <option value="weekly" {{ old('salary_cycle', $employee->salary_cycle) == 'weekly' ? 'selected' : '' }}>{{ trans('website.weekly') }}</option>
                                            <option value="daily" {{ old('salary_cycle', $employee->salary_cycle) == 'daily' ? 'selected' : '' }}>{{ trans('website.daily') }}</option>
                                        </select>
                                        @error('salary_cycle')
                                        <span class="invalid-feedback" role="alert">
                                                
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="hiring_date" class="col-md-4 col-form-label text-md-right">{{ trans('website.hiring_date') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="hiring_date" type="date" class="form-control @error('hiring_date') is-invalid @enderror" name="hiring_date" value="{{ old('hiring_date', $employee->hiring_date) }}" required autocomplete="hiring_date">
                                        @error('hiring_date')
                                        <span class="invalid-feedback" role="alert">
                                            
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <select required id="status" type="date" class="form-control @error('status') is-invalid @enderror" name="status" autocomplete="status">
                                            <option value="">Select Status</option>
                                            <option value="1" {{ $employee->status == 1? 'selected' : '' }}>Active</option>
                                            <option value="2" {{ $employee->status == 2? 'selected' : '' }}>Archive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="departure_time" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Departure Time') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="hiring_date" type="date" class="form-control @error('departure_time')
                                         is-invalid @enderror" name="departure_time"
                                               value="{{ old('departure_time', $employee?->departure_time) }}"
                                               autocomplete="departure_time">
                                        @error('departure_time')
                                        <span class="invalid-feedback" role="alert">
                                            
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="attendance_time" class="col-md-4 col-form-label text-md-right">
                                        {{ __('AttendanceLeave Time') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="attendance_time" type="date" class="form-control @error('attendance_time')
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

                                <div class="form-group row mb-3">
                                    <label for="work_days" class="col-md-4 col-form-label text-md-right">{{ __('Work Days') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="work_days" type="number" class="form-control
                                        @error('work_days') is-invalid @enderror" name="work_days" value="{{ old('work_days', $employee->work_days) }}"
                                               required autocomplete="work_days">
                                        @error('work_days')
                                        <span class="invalid-feedback" role="alert">
                                                
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="branch" type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch', $employee->branch) }}" required autocomplete="branch">
                                        @error('branch')
                                        <span class="invalid-feedback" role="alert">
                
                                            <strong>{{ trans("website.requiredField") }}</strong>

            </span>
                                        @enderror
                                    </div>
                                </div>

                            <h1>_____________________________________________________</h1>

                                <div class="form-group row mb-3">
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control
                                        @error('password') is-invalid @enderror"
                                               name="password" autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                        </span>
                                        @enderror

                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                        <input id="password_confirmation" type="password" class="form-control" @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" autocomplete="new-password">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            
                                            <strong>{{ trans("website.requiredField") }}</strong>

                                        </span>
                                        @enderror

                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
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
