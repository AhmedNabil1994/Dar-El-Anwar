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
                                <h2>{{ __('Add Employees') }}</h2>
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
                            <h2>{{ __('Add Employees') }}</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">

                                        <select  id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title', $employee?->job_title) }}"  autocomplete="job_title">
                                            <option value="">Select Job Title</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="driver">Driver</option>
                                        </select>
                                        @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="signinSrEmail">
                                        {{__('Avatar')}}
                                        <small>(100x100)</small>
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" data-type="image">
                                            <div class="input-group-prepend">
                                                <input class="input-group-text bg-soft-secondary font-weight-medium"
                                                       type="file" id="file" name="image" value="{{ $employee?->image }}" required/>
                                            </div>
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name', $employee?->name) }}"  autocomplete="name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $employee?->address) }}"  autocomplete="address" required>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="qualification" class="col-md-4 col-form-label text-md-right">{{ __('Qualification') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror"
                                               name="qualification" value="{{ old('qualification', $employee?->qualification) }}"  autocomplete="qualification">
                                        @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="university" class="col-md-4 col-form-label text-md-right">{{ __('University') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university', $employee?->university) }}"  autocomplete="university" required>
                                        @error('university')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="graduation_date" class="col-md-4 col-form-label text-md-right">{{ __('Graduation Date') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="graduation_date" type="date" class="form-control @error('graduation_date') is-invalid @enderror" name="graduation_date" value="{{ old('graduation_date', $employee?->graduation_date) }}"  autocomplete="graduation_date" required>
                                        @error('graduation_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="national_id" class="col-md-4 col-form-label text-md-right">{{ __('National ID') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id', $employee?->national_id) }}"  autocomplete="national_id" required>
                                        @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employee?->email) }}"  autocomplete="email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $employee?->phone) }}"  autocomplete="phone" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate', $employee?->birthdate) }}"  autocomplete="birthdate" required>
                                        @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="management" class="col-md-4 col-form-label text-md-right">{{ __('Management') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <select  id="management" type="text" class="form-control @error('job_title')
                                         is-invalid @enderror" name="management"
                                                 value="{{ old('management', $employee?->management) }}"  autocomplete="management">
                                            <option value="teacher-management">Teachers Management</option>
                                            <option value="driver-management">Drivers Management</option>
                                        </select>
                                        @error('management')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department', $employee?->department) }}"  autocomplete="department">
                                        @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary', $employee?->salary) }}"  autocomplete="salary">
                                        @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="salary_cycle" class="col-md-4 col-form-label text-md-right">{{ __('Salary Cycle') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <select id="salary_cycle" class="form-control @error('salary_cycle') is-invalid @enderror"
                                                name="salary_cycle"  autocomplete="salary_cycle" required>
                                            <option value="">{{ __('Select Salary Cycle') }}</option>
                                            <option value="monthly" {{ old('salary_cycle', $employee?->salary_cycle) == 'monthly' ? 'selected' : '' }}>{{ __('Monthly') }}</option>
                                            <option value="weekly" {{ old('salary_cycle', $employee?->salary_cycle) == 'weekly' ? 'selected' : '' }}>{{ __('Weekly') }}</option>
                                            <option value="daily" {{ old('salary_cycle', $employee?->salary_cycle) == 'daily' ? 'selected' : '' }}>{{ __('Daily') }}</option>
                                        </select>
                                        @error('salary_cycle')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hiring_date" class="col-md-4 col-form-label text-md-right">{{ __('Hiring Date') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="hiring_date" type="date" class="form-control @error('hiring_date') is-invalid @enderror" name="hiring_date" value="{{ old('hiring_date', $employee?->hiring_date) }}"  autocomplete="hiring_date">
                                        @error('hiring_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="departure_time" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Departure Time') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="hiring_date" type="date" class="form-control @error('departure_time')
                                         is-invalid @enderror" name="departure_time"
                                               value="{{ old('departure_time', $employee?->departure_time) }}"
                                               autocomplete="departure_time" required>
                                        @error('departure_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="attendance_time" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Attendance Time') }}
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input required id="attendance_time" type="date" class="form-control @error('attendance_time')
                                         is-invalid @enderror" name="attendance_time"
                                               value="{{ old('attendance_time', $employee?->attendance_time) }}"
                                               autocomplete="departure_time">
                                        @error('attendance_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="work_days" class="col-md-4 col-form-label text-md-right">{{ __('Work Days') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="work_days" type="number" class="form-control
                                        @error('work_days') is-invalid @enderror" name="work_days" value="{{ old('work_days', $employee?->work_days) }}"
                                                autocomplete="work_days">
                                        @error('work_days')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}
                                        <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="branch" type="text" class="form-control @error('branch')
                                         is-invalid @enderror" name="branch" value="{{ old('branch', $employee?->branch) }}"
                                               autocomplete="branch">
                                        @error('branch')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="dependentDiv" style="display: none;">
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                        <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                            <input required id="password" type="password" class="form-control
                                            @error('password') is-invalid @enderror"
                                                   name="password" autocomplete="new-password" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}
                                                <span class="required-star">*</span></label>
                                            <div class="col-md-6">
                                                <input id="password_confirmation" type="password"
                                                   class="form-control" @error('password_confirmation') is-invalid @enderror"
                                                   name="password_confirmation" autocomplete="new-password" required>
                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                            </div>
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
    @endpush
