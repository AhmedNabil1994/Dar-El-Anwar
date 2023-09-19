@extends('layouts.admin')

@section('content')
    <div class="page-content">
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-5 col-md-5 mb-30">

            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <div class="">
                            <img src="{{ asset( $user->getImg())}}" alt="profile-image"
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
                    <h5 class="mb-20 text-muted">@lang('معلومات الطالب')</h5>
                    <ul class="list-group">

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('الاسم')
                            <span class="font-weight-bold">{{$user->name}}</span>
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

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('المحفظة')
                            <span class="font-weight-bold">{{ $user->wallet}}</span>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">@lang('اجراءات الطالب')</h5>
                    <a data-toggle="modal" href="#addSubModal" id="preview-modal" class="btn buttons-style btn--shadow btn-block btn-lg">
                        @lang('اضافة في المحفظة')
                    </a>

{{--                    <a href="{{route('admin.users.email.single',$user->id)}}"--}}
{{--                       class="btn btn--danger btn--shadow btn-block btn-lg">--}}
{{--                        @lang('Send Email')--}}
{{--                    </a>--}}
                </div>
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
                    <h5 class="card-title mb-50 border-bottom pb-2">{{$user->name}} @lang('معلومات')</h5>

                    <form action="{{route('student.student_update',$user)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('الاسم') <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{trans('website.branch')}} <span class="text-danger">*</span></label>
                                    <select name="branch_id" class="form-control" />
                                    <option value="" selected>{{trans('website.select_branch')}}</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}"
                                            {{$user->branch_id == $branch->id ? 'selected' : ''}}
                                        >{{ $branch->name }}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('branch_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('branch_id') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="bus">{{trans("website.bus")}}</label>
                                <select type="number" name="bus" value="" placeholder="Bus" class="form-control">
                                    <option value="" selected>{{trans("website.select_bus")}}</option>
                                    <option value="0"
                                        {{$user->bus == 0 ? 'selected' : ''}}
                                    >{{trans("website.yes")}}</option>
                                    <option value="1"
                                        {{$user->bus == 1 ? 'selected' : ''}}
                                    >{{trans("website.no")}}</option>
                                </select>
                                @if ($errors->has('bus'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('bus') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{trans('website.period')}} <span class="text-danger">*</span></label>
                                    <select name="period" class="form-control" />
                                    <option value="" selected>{{trans('website.select_period')}}</option>
                                    <option value="1" {{$user->period == 1 ? 'selected' : ''}}>{{trans('website.morning')}}</option>
                                    <option value="2" {{$user->period == 2 ? 'selected' : ''}}>{{trans('website.evining')}}</option>
                                    <option value="3" {{$user->period == 3 ? 'selected' : ''}}>{{trans('website.both')}}</option>
                                    </select>
                                    @if ($errors->has('period'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('period') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{ trans('website.city') }} <span class="text-danger">*</span></label>
                                    <select name="city_id" class="form-control" id="city-select">
                                        <option value="">{{ trans('website.select_city') }}</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{$user->city_id == $city->id ? 'selected' : ''}}
                                            >{{ $city->city_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city_id'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('city_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{ trans('المستوي') }} <span class="text-danger">*</span></label>
                                    <select name="level_id" class="form-control" id="level_id" >
                                        <option value="">{{ trans('المستوي') }}</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}"
                                                {{in_array($level->id, $user->level->pluck('id')->toArray()) ? 'selected' : ''}}
                                            >{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city_id'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('city_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>فصل / موعد <span class="text-danger">*</span></label>
                                    <select id="selectBox">
                                        <option value="">اختر</option>
                                        <option value="option1"
                                            {{$user->class_room_id? 'selected' : ''}}
                                        >فصل</option>
                                        <option value="option2"
                                            {{$user->courses->count() > 0 ? 'selected' : ''}}
                                        >موعد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="class" style="display: none;">
                                <div class="input__group mb-25">
                                    <label>{{trans("website.class_room")}} <span class="text-danger">*</span></label>
                                    <select class="form-select" name="classroom" id="classroom">
                                        <option value="">اختر فصل</option>
                                        @foreach($class_rooms as $class_room)
                                            <option value="{{$class_room->id}}"
                                                {{$user->class_room_id == $class_room->id? 'selected' : ''}}
                                            >{{$class_room->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="appointment" style="display: none;">
                                <div class="input__group mb-25">
                                    <label>{{trans('website.appointment')}} <span class="text-danger">*</span></label>
                                    <select class="form-select" name="appointment[]" id="appointment" multiple>
                                        <option value="">اختر الموعد</option>
                                        @foreach($appointments as $appointment)
                                            <option value="{{$appointment->id}}"
                                                {{in_array($appointment->id, $user->courses->pluck('id')->toArray()) ? 'selected' : ''}}
                                            >
                                                {{$appointment->name}} - {{$appointment->day}} - {{$appointment->time_from}} - {{$appointment->time_to}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{trans("website.medical_history")}}<span class="text-danger">*</span></label>
                                    <textarea name="medical_history" class="form-control" >{{$user->medical_history}}</textarea>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{trans("website.birth_date")}} <span class="text-danger">*</span></label>
                                    <input type="date" name="birthdate" value="{{$user->birthdate}}" placeholder="Enter birthdate" class="form-control" />
                                    @if ($errors->has('birthdate'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{trans("website.department")}} <span class="text-danger">*</span></label>
                                    <select multiple type="text" name="department[]" value="" class="form-control" >
                                        <option value="" >{{trans("website.chosseDepartment")}}</option>
                                        @foreach($depts as $dept)
                                            <option value="{{$dept->id}}"
                                                {{in_array($dept->id, $user->dept->pluck('id')->toArray())?'selected':''}}
                                            >{{$dept->name}}</option>
                                        @endforeach
                                        <select>
                                </div>
                                @if ($errors->has('department'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('department') }}</span>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans("website.gender")}} <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-control" />
                                    <option value="">{{trans("website.select_gender")}}</option>
                                    <option value="1" {{$user->gender == 1? 'selected' : ''}}>{{trans("website.male")}}</option>
                                    <option value="2" {{$user->gender == 2? 'selected' : ''}}>{{trans("website.female")}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('ايميل') <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input__group mb-25">
                                    <label>{{trans('website.status')}} <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control" />
                                    <option value="" selected >{{trans('website.select_status')}}</option>
                                    <option value="0" {{$user->status == 0? 'selected' : ''}}>{{trans('website.pending')}}</option>
                                    <option value="1" {{$user->status == 1? 'selected' : ''}}>{{trans('website.approved')}}</option>
                                    <option value="3" {{$user->status == 3? 'selected' : ''}}>{{trans('website.excluded')}}</option>
                                    <option value="4" {{$user->status == 4? 'selected' : ''}}>{{trans('website.converted')}}</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input__group mt-25 mb-25">
                                        <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                                        <select class="form-select" name="parents_social_status">
                                            <option value="">اختر الحالة</option>
                                            <option value="1" {{$user->parents_marital_status == 1? 'selected' : ''}}>متزوجين</option>
                                            <option value="2" {{$user->parents_marital_status == 2? 'selected' : ''}}>منفصلين</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-25 mb-25">
                                        <label for="how_did_you_hear_about_us">{{trans("website.how_know_about_us")}}</label>
                                        <textarea name="how_did_you_hear_about_us"
                                                  placeholder='{{trans("website.how_know_about_us")}}'
                                                  class="form-control">{{$user->how_did_you_hear_about_us}}</textarea>
                                        @if ($errors->has('how_did_you_hear_about_us'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('how_did_you_hear_about_us') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input__group mt-25 mb-25">
                                        <label>ملاحظات<span class="text-danger">*</span></label>
                                        <textarea name="notes" class="form-control" >{{$user->notes}}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div id="parent_info">
                                @if($user->parent->count() > 0)
                                    @foreach($user->parent as $parent)
                                        @include('admin.student.parent.add',['parent'=>$parent])
                                    @endforeach
                                @endif
                            </div>
                            <h2>{{trans('اﻟﻮﺛﺎﺋﻖ و اﻟﻤﺴﺘﻨﺪات')}}</h2>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-25">

                                        <label for="birth_certificate">{{trans("website.birth_certificate")}} <i class="fa fa-file"></i></label>
                                        <input type="file" name="birth_certificate"  id="imageInput" value="" placeholder='{{trans("website.birth_certificate")}}' class="form-control">
                                        <img id="imagePreview" src="{{asset($user->get_birth_certificate?->file_name)}}" alt="Image Preview" style="max-width: 150px; height: 200px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-25">
                                        <label for="another_file">{{trans("website.another")}} <i class="fa fa-file"></i></label>
                                        <input type="file" name="another_file"  id="imageInput2" value="" placeholder="{{trans('')}}" class="form-control">
                                        <img id="imagePreview2" src="{{asset($user->get_another_file?->file_name)}}" alt="Image Preview" style=" max-width: 150px; height: 200px;">
                                        @if ($errors->has('another_file'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-25">
                                        <label for="parents_card_copy">{{trans("website.parentsCardsCopy")}} <i class="fa fa-file"></i></label>
                                        <input type="file" name="parents_card_copy[]"  multiple id="imageInput3" value="" placeholder="Parents Card Copy" class="form-control">
                                        <div id="imagePreviews3" style="display: flex; flex-wrap: wrap;">
                                            @if($user->parents_card_copy)
                                                @foreach(json_decode($user->parents_card_copy) as $photo)
                                                    <img src="{{api_asset($photo)}}" style=" max-width: 150px; height: 150px;">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
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


    {{-- Add Sub Balance MODAL --}}
    <div id="previewModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('اضافة او خصم مبلغ في المحفظة')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('student.wallet') }}" class="register" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-md-2 control-label">خصم مبلغ</label>
                                <input class="quakeCheckid" onchange='quakeCheckd()' type="checkbox" data-width="100%" data-height="44px" data-onstyle="-success"
                                       data-offstyle="-danger" data-toggle="toggle" data-on="اضف مبلغ"
                                       data-off="@lang('خصم مبلغ')" name="act">
                            </div>


{{--                            <div class="form-group col-md-12">--}}
{{--                                <select name="wallet" onchange='quakeCheck()' class="form-control quakeInterestWallet" required>--}}
{{--                                    <option value="deposit_wallet">@lang('Deposit Wallet')</option>--}}
{{--                                    <option value="interest_wallet">@lang('Interest Wallet')</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <div class="form-group col-md-12">
                                <label>@lang('المبلغ')<span class="text-danger">*</span></label>
                                <div class="input-group has_append">
                                    <input type="text" name="amount" class="form-control quakeamount"
                                           placeholder="اضف المبلغ">
                                    <div class="input-group-append">
                                        <div class="input-group-text">جنيه مصري</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Edit By Mohamed Maghraby -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('غلق')</button>
                        <button type="submit" class="btn buttons-style quakeConfirm">
                            <i class='spinner fa fa-spinner fa-spin quakeSpinner' style='display: none'></i>
                            @lang('اضافة')
                        </button>
                    </div>
                </form>
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
