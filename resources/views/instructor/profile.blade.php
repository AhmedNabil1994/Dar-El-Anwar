@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="row mb-none-30">
            <div class="col-xl-3 col-lg-5 col-md-5 mb-30">

                <div class="card b-radius--10 overflow-hidden box--shadow1">
                    <div class="card-body p-0">
                        <div class="p-3 bg--white">
                            <div class="">
                                <img src="{{ asset( $user->employee->getImg())}}" alt="profile-image"
                                     class="b-radius--10 w-100">
                            </div>
                            <div class="mt-15">
                                <h4 class="">{{$user->name}}</h4>
                                <span class="text--small">@lang('ملتحق في')<strong>{{\Carbon\Carbon::parse($user->joining_date)->format('Y/m/d')}}</strong></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                    <div class="card-body">
                        <h5 class="mb-20 text-muted">@lang('معلومات المعلم')</h5>
                        <ul class="list-group">

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @lang('الاسم')
                                <span class="font-weight-bold">{{$user->employee?->name}}</span>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @lang('الحالة')
                                @switch($user->status)
                                    @case(1)
                                        <span class="badge badge-pill bg--success">@lang('نشط')</span>
                                        @break
                                    @case(0)
                                        <span class="badge badge-pill bg--danger">@lang('معلق')</span>
                                        @break
                                    @case(3)
                                        <span class="badge badge-pill bg--danger">@lang('مستبعد')</span>
                                        @break
                                    @case(4)
                                        <span class="badge badge-pill bg--danger">@lang('منقول')</span>
                                        @break
                                @endswitch
                            </li>

{{--                            <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                                @lang('المحفظة')--}}
{{--                                <span class="font-weight-bold">{{ $user->wallet}}</span>--}}
{{--                            </li>--}}

                        </ul>
                    </div>
                </div>
                <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
{{--                    <div class="card-body">--}}
{{--                        <h5 class="mb-20 text-muted">@lang('اجراءات الطالب')</h5>--}}
{{--                        <a data-toggle="modal" href="#addSubModal" id="preview-modal" class="btn buttons-style btn--shadow btn-block btn-lg">--}}
{{--                            @lang('اضافة في المحفظة')--}}
{{--                        </a>--}}

{{--                        --}}{{--                    <a href="{{route('admin.users.email.single',$user->id)}}"--}}
{{--                        --}}{{--                       class="btn btn--danger btn--shadow btn-block btn-lg">--}}
{{--                        --}}{{--                        @lang('Send Email')--}}
{{--                        --}}{{--                    </a>--}}
{{--                    </div>--}}
                </div>
            </div>

            <div class="col-xl-9 col-lg-7 col-md-7 mb-30">

                <div class="row mb-none-30">
                    <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--1 b-radius--10 box-shadow has--link">
                            <a href="" class="item--link"></a>
                            <div class="icon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            {{-- <div class="details">
                                 <div class="numbers">
                                     <span class="amount"></span>
                                     <span class="currency-sign">جنيه مصري</span>
                                 </div>
                                 <div class="desciption">
                                     <span>@lang('Total Deposit')</span>
                                 </div>
                             </div>--}}
                        </div>
                    </div><!-- dashboard-w1 end -->


                    {{--  <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                          <div class="dashboard-w1 bg--15 b-radius--10 box-shadow has--link">
                              <a href="{{route('admin.users.withdrawals',$user->id)}}" class="item--link"></a>
                              <div class="icon">
                                  <i class="fa fa-wallet"></i>
                              </div>
                              <div class="details">
                                  <div class="numbers">
                                      <span class="amount">{{number_format($totalWithdraw,2)}}</span>
                                      <span class="currency-sign">{{$general->cur_sym}}</span>
                                  </div>
                                  <div class="desciption">
                                      <span>@lang('Total Withdraw')</span>
                                  </div>
                              </div>
                          </div>
                      </div><!-- dashboard-w1 end -->
      --}}
                    {{-- <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                         <div class="dashboard-w1 bg--20 b-radius--10 box-shadow has--link">
                             <a href="{{route('admin.users.transactions',$user->id)}}" class="item--link"></a>
                             <div class="icon">
                                 <i class="la la-exchange-alt"></i>
                             </div>
                             <div class="details">
                                 <div class="numbers">
                                     <span class="amount">{{$totalTransaction}}</span>
                                 </div>
                                 <div class="desciption">
                                     <span>@lang('Total Transaction')</span>
                                 </div>
                             </div>
                         </div>
                     </div><!-- dashboard-w1 end -->
     --}}
                    {{--  <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                          <div class="dashboard-w1 bg--11 b-radius--10 box-shadow has--link">
                              <a href="{{route('admin.users.invests',$user->id)}}" class="item--link"></a>
                              <div class="icon">
                                  <i class="la la-money-bill"></i>
                              </div>
                              <div class="details">
                                  <div class="numbers">
                                      <span class="amount">{{$totalInvest}}</span>
                                  </div>
                                  <div class="desciption">
                                      <span>@lang('Total Invest')</span>
                                  </div>
                              </div>
                          </div>
                      </div><!-- dashboard-w1 end -->--}}

                    {{--
                                    <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                                        <div class="dashboard-w1 bg--18 b-radius--10 box-shadow has--link">
                                            <a href="{{route('admin.users.referrals',$user->id)}}" class="item--link"></a>
                                            <div class="icon">
                                                <i class="la la-users"></i>
                                            </div>
                                            <div class="details">
                                                <div class="numbers">
                                                    <span class="amount">{{$totalReferral}}</span>
                                                </div>
                                                <div class="desciption">
                                                    <span>@lang('Total Referral')</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- dashboard-w1 end -->--}}

                    {{--    <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                            <div class="dashboard-w1 bg--12 b-radius--10 box-shadow has--link">
                                <a href="{{route('admin.users.commissions.deposit',$user->id)}}" class="item--link"></a>
                                <div class="icon">
                                    <i class="la la-money"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers">
                                        <span class="amount">{{number_format($totalCommission,2)}}</span>
                                        <span class="currency-sign">{{$general->cur_sym}}</span>
                                    </div>
                                    <div class="desciption">
                                        <span>@lang('Referral Commission')</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- dashboard-w1 end -->
        --}}

                </div>


                <div class="card mt-50">
                    <div class="card-body">
                        <h5 class="card-title mb-50 border-bottom pb-2">{{$user->employee->name}} @lang('معلومات')</h5>

                        <form action="{{route('instructor.instructor_update',$user->employee)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('الاسم') <</label>
                                        <input class="form-control" type="text" name="name"
                                               value="{{$user->employee->name}}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.branch')}} </label>
                                        <select name="branch_id" class="form-control" />
                                        <option value="" selected>{{trans('website.select_branch')}}</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}"
                                                {{$user->employee->branch_id == $branch->id ? 'selected' : ''}}
                                            >{{ $branch->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('branch_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('branch_id') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.department")}} </label>
                                        <select type="text" name="department_id" value="" class="form-control" >
                                            <option value="" >{{trans("website.chosseDepartment")}}</option>
                                            @foreach($depts as $dept)
                                                <option value="{{$dept->id}}"
                                                    {{in_array($dept->id, $user->employee->department->pluck('id')->toArray())?'selected':''}}
                                                >{{$dept->name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    @if ($errors->has('department'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('department') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('ايميل') <</label>
                                        <input class="form-control" type="email" name="email" value="{{$user->employee->email}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ trans('website.address') }} </label>
                                    <div class="col-md-12">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->employee?->address) }}"  autocomplete="address" required>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="qualification" class="col-md-4 col-form-label text-md-right">{{ trans('website.qualifications') }} </label>
                                    <div class="col-md-12">
                                        <input required id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror"
                                               name="qualification" value="{{ old('qualification', $user->employee?->qualification) }}"  autocomplete="qualification">
                                        @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="university" class="col-md-4 col-form-label text-md-right">{{ trans('website.collage') }} </label>
                                    <div class="col-md-12">
                                        <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university', $user->employee?->university) }}"  autocomplete="university" required>
                                        @error('university')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="graduation_date" class="col-md-4 col-form-label text-md-right">{{  trans('website.date_of_graduation') }} </label>
                                    <div class="col-md-12">
                                        <input id="graduation_date" type="date" class="form-control @error('graduation_date') is-invalid @enderror" name="graduation_date" value="{{ old('graduation_date', $user->employee?->graduation_date) }}"  autocomplete="graduation_date" required>
                                        @error('graduation_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="national_id" class="col-md-4 col-form-label text-md-right">{{ trans('website.nationalId') }} </label>
                                    <div class="col-md-12">
                                        <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id', $user->employee?->national_id) }}"  autocomplete="national_id" required>
                                        @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('website.email') }} </label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->employee?->email) }}"  autocomplete="email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="level" class="col-md-4 col-form-label text-md-right">{{ trans('website.standard') }} </label>
                                    <div class="col-md-12">
                                        <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level', $user->employee?->level) }}"  autocomplete="level" required>
                                        @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-4">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ trans("website.phone_number") }} </label>
                                    <div class="col-md-12">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->employee?->phone) }}"  autocomplete="phone" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ trans('website.birth_date') }} </label>
                                    <div class="col-md-12">
                                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate', $user->employee?->birthdate) }}"  autocomplete="birthdate" required>
                                        @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group col-md-3 mb-4">
                                    <label for="management" class="col-md-4 col-form-label text-md-right">{{ trans('website.managment') }}

                                    </label>
                                    <div class="col-md-12">
                                        <select  id="management" type="text" class="form-control @error('job_title')
                                         is-invalid @enderror" name="management"
                                                 value="{{ old('management', $user->employee?->management) }}"  autocomplete="management">
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
                                    <label for="salary" class="col-md-4 col-form-label text-md-right">{{ trans('website.salary') }} </label>
                                    <div class="col-md-12">
                                        <input id="salary" type="number" class="form-control"
                                               disabled autocomplete="salary" value="{{$user->employee?->salary?->salary}}">
                                        @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="salary_cycle" class="col-md-4 col-form-label text-md-right">{{ trans('website.salary_cycle') }} </label>
                                    <div class="col-md-12">
                                        <select id="salary_cycle" class="form-control @error('salary_cycle') is-invalid @enderror"
                                                name="salary_cycle"  autocomplete="salary_cycle" required>
                                            <option value="">{{ trans('website.select_salary_cycle') }}</option>
                                            <option value="monthly" {{ old('salary_cycle', $user->employee?->salary_cycle) == 'monthly' ? 'selected' : '' }}>{{ trans('website.monthly') }}</option>
                                            <option value="weekly" {{ old('salary_cycle', $user->employee?->salary_cycle) == 'weekly' ? 'selected' : '' }}>{{ trans("website.weekly") }}</option>
                                            <option value="daily" {{ old('salary_cycle', $user->employee?->salary_cycle) == 'daily' ? 'selected' : '' }}>{{ trans('website.daily') }}</option>
                                        </select>
                                        @error('salary_cycle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-4">
                                    <label for="hiring_date" class="col-md-4 col-form-label text-md-right">{{ trans('website.hiring_date') }} </label>
                                    <div class="col-md-12">
                                        <input required id="hiring_date" type="date" class="form-control @error('hiring_date') is-invalid @enderror" name="hiring_date" value="{{ old('hiring_date', $user->employee?->hiring_date) }}"  autocomplete="hiring_date">
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

                                    </label>
                                    <div class="col-md-12">
                                        <input id="hiring_date" type="time" class="form-control @error('departure_time')
                                         is-invalid @enderror" name="departure_time"
                                               value="{{ old('departure_time', $user->employee?->departure_time) }}"
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

                                    </label>
                                    <div class="col-md-12">
                                        <input required id="attendance_time" type="time" class="form-control @error('attendance_time')
                                         is-invalid @enderror" name="attendance_time"
                                               value="{{ old('attendance_time', $user->employee?->attendance_time) }}"
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
                                        {{ trans('website.work_days') }}
                                    </label>
                                    <div class="col-md-12">
                                        <input required id="work_days" type="number" class="form-control
                                        @error('work_days') is-invalid @enderror" name="work_days" value="{{ old('work_days', $user->employee?->work_days) }}"
                                               autocomplete="work_days">
                                        @error('work_days')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans("website.requiredField") }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="dependentDiv">
                                    <div class="form-group col-md-3 mb-4">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة السر') }}
                                            </label>
                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control
                                            @error('password') is-invalid @enderror"
                                                   name="password" autocomplete="new-password" >
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ trans("website.requiredField") }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-4">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تأكيد كلمة السر') }}
                                            </label>
                                        <div class="col-md-12">
                                            <input id="password_confirmation" type="password"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" autocomplete="new-password" >
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ trans("website.requiredField") }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                {{--
                                                        <div class="row mt-4">
                                                            <div class="col-md-12">
                                                                <div class="form-group ">
                                                                    <label class="form-control-label font-weight-bold">@lang('العنوان') </label>
                                                                    <input class="form-control" type="text" name="address"
                                                                           value="{{@$user->address}}">

                                                                </div>
                                                            </div>

                                                            <div class="col-xl-3 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label font-weight-bold">@lang('المدينة') </label>
                                                                    <input class="form-control" type="text" name="city"
                                                                           value="{{@$user->city?->name}}">
                                                                </div>
                                                            </div>

                                {{--                            <div class="col-xl-3 col-md-6">--}}
                                {{--                                <div class="form-group ">--}}
                                {{--                                    <label class="form-control-label font-weight-bold">@lang('State') </label>--}}
                                {{--                                    <input class="form-control" type="text" name="state"--}}
                                {{--                                           value="{{@$user->address->state}}">--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}

                                {{--                            <div class="col-xl-3 col-md-6">--}}
                                {{--                                <div class="form-group ">--}}
                                {{--                                    <label class="form-control-label font-weight-bold">@lang('Zip/Postal') </label>--}}
                                {{--                                    <input class="form-control" type="text" name="state"--}}
                                {{--                                           value="{{@$user->address->zip}}">--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}

                                {{--                            <div class="col-xl-3 col-md-6">--}}
                                {{--                                <div class="form-group ">--}}
                                {{--                                    <label class="form-control-label font-weight-bold">@lang('Country') </label>--}}
                                {{--                                    <select name="country" class="form-control"> @include('partials.country') </select>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                            </div>


                            {{--                        <div class="row">--}}
                            {{--                            <div class="form-group col-xl-4 col-md-6  col-sm-3 col-12">--}}
                            {{--                                <label class="form-control-label font-weight-bold">@lang('Status') </label>--}}
                            {{--                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                            {{--                                       data-toggle="toggle" data-on="Active" data-off="Banned" data-width="100%"--}}
                            {{--                                       name="status"--}}
                            {{--                                       @if($user->status) checked @endif>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">--}}
                            {{--                                <label class="form-control-label font-weight-bold">@lang('Email Verification') </label>--}}
                            {{--                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                            {{--                                       data-toggle="toggle" data-on="Verified" data-off="Unverified" name="ev"--}}
                            {{--                                       @if($user->ev) checked @endif>--}}

                            {{--                            </div>--}}

                            {{--                            <div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">--}}
                            {{--                                <label class="form-control-label font-weight-bold">@lang('SMS Verification') </label>--}}
                            {{--                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                            {{--                                       data-toggle="toggle" data-on="Verified" data-off="Unverified" name="sv"--}}
                            {{--                                       @if($user->sv) checked @endif>--}}

                            {{--                            </div>--}}
                            {{--                            <div class="form-group  col-md-6  col-sm-3 col-12">--}}
                            {{--                                <label class="form-control-label font-weight-bold">@lang('2FA Status') </label>--}}
                            {{--                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                            {{--                                       data-toggle="toggle" data-on="Verified" data-off="Unverified" name="ts"--}}
                            {{--                                       @if($user->ts) checked @endif>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="form-group  col-md-6  col-sm-3 col-12">--}}
                            {{--                                <label class="form-control-label font-weight-bold">@lang('2FA Verification') </label>--}}
                            {{--                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                            {{--                                       data-toggle="toggle" data-on="Verified" data-off="Unverified" name="tv"--}}
                            {{--                                       @if($user->tv) checked @endif>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}


                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn buttons-style btn-block btn-lg">@lang('حفظ التغييرات')
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')
    <script>
        $(function ($) {
            "use strict";
            $("select[name=country]").val("{{ @$user->address->country }}");
        });
        $('.register').on('submit', function(){
            $('.quakeConfirm').attr('disabled', 'true');
            $('.quakeSpinner').show();
        });
    </script>
    <script>
        $(document).ready(function () {
            'use strict'
            $("#preview-modal").on("click", function () {
                $("#previewModal").modal("show");
            });



        });
    </script>
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
        const checkbox = document.getElementById('selectBox');
        const selectInput1 = document.getElementById('class');
        const selectInput2 = document.getElementById('appointment');

        if (checkbox.value === 'option1') {
            selectInput1.style.display = 'block';
            selectInput2.style.display = 'none';

        }
        else if (checkbox.value === 'option2') {
            selectInput1.style.display = 'none';
            selectInput2.style.display = 'block';
        }
        else {
            selectInput1.style.display = 'none';
            selectInput2.style.display = 'none';
        }
        checkbox.addEventListener('change', function() {
            if (checkbox.value === 'option1') {
                selectInput1.style.display = 'block';
                selectInput2.style.display = 'none';

            }
            else if (checkbox.value === 'option2') {
                selectInput1.style.display = 'none';
                selectInput2.style.display = 'block';
            }
            else {
                selectInput1.style.display = 'none';
                selectInput2.style.display = 'none';
            }
        });
    </script>
    <script>
        const status = document.getElementById('status');
        const joining_date = document.getElementById('joining_date');

        status.addEventListener('change', function() {
            if (status.value === '1') {
                const today = new Date();

// Get the year, month, and day
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                const day = String(today.getDate()).padStart(2, '0');

// Format the date as "YYYY-MM-DD" (or any other format you prefer)
                const formattedDate = `${year}-${month}-${day}`;

// Set the value of the 'joining_date' input field to today's date
                joining_date.value = formattedDate;
            } else {
            }
        });
    </script>

    <script>
        $.ajax({
            type: 'GET',
            url: '{{url('/')}}/student/student/getClasses/' + $('#level_id').val(),
            success: function (data) {
                $('#classroom').empty()
                $('#classroom').append(`<option value="">اختر فصل</option>`)
                data.forEach(function (e){
                    $('#classroom').append(`<option value="${e.id}" >${e.name}</option>`)
                    $('#classroom').val({{$user->class_room_id}})
                })
            }
        })

    </script>
    <script>
        $('#level_id').on('change', function() {

            $.ajax({
                type: 'GET',
                url: '{{url('/')}}/student/student/getClasses/' + $(this).val(),
                success: function (data) {
                    $('#classroom').empty()
                    $('#classroom').append(`<option value="">اختر فصل</option>`)
                    data.forEach(function (e){
                        $('#classroom').append(`<option value="${e.id}">${e.name}</option>`)
                    })
                }
            })
        });
    </script>
    <script>
        $('#imageInput').on('change', function(event) {
            const input = event.target;
            const $imagePreview = $('#imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Set the source of the image preview to the selected file
                    $imagePreview.attr('src', e.target.result);
                    // Show the image preview
                    $imagePreview.show();
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // Hide the image preview if no file is selected
                $imagePreview.hide();
            }
        });

        $('#imageInput2').on('change', function(event) {
            const input = event.target;
            const $imagePreview = $('#imagePreview2');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Set the source of the image preview to the selected file
                    $imagePreview.attr('src', e.target.result);
                    // Show the image preview
                    $imagePreview.show();
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // Hide the image preview if no file is selected
                $imagePreview.hide();
            }
        });

        $('#imageInput3').on('change', function(event) {
            const input = event.target;
            const $imagePreviews = $('#imagePreviews3');
            $imagePreviews.empty(); // Clear previous previews

            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    const reader = new FileReader();
                    const file = input.files[i];

                    reader.onload = function(e) {
                        // Create a new image element for each preview
                        const $img = $('<img>').attr('src', e.target.result);
                        $img.css({
                            'max-width': '150px', // Example: set width to 100px
                            'height': '150px', // Example: maintain aspect ratio
                            // Add more styles as needed
                        });
                        $imagePreviews.append($img);
                    };

                    reader.readAsDataURL(file);
                }
            }
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
