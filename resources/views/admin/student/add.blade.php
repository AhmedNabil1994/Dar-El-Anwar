@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__content__left">
                                <div class="breadcrumb__title">
                                    <h2>{{ trans('website.add_student') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a>
                                        </li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ trans('website.add_student') }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="print-form">
                <div class="col-md-12 ">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.add_student') }}</h2>
                        </div>
                        <form action="{{route('student.store')}}" method="post" class="form-horizontal"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row justify-content-evenly">
                                    <div class="col-md-3">
                                        <div class="upload-img-box mb-25">
                                            <input type="file" name="image" id="image" accept="image/*"
                                                   onchange="previewFile(this)">
                                            <img id="upload-img-box-icon">
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                                <p class="m-0">{{trans('website.image')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                    @endif
                                    <!-- <p class = "image-desc">{{ __('Accepted Image Files') }}: JPEG, JPG, PNG <br> {{ trans('website.accepted_size') }}: 300 x 300 (1MB)</p> -->
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.name")}} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="" placeholder='{{trans("website.name")}}'
                                               class="form-control" id="fullname"/>

                                        @if ($errors->has('name'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
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
                                                >{{ $city->city_name_ar }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('city_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.department")}}
                                            <span class="text-danger">*</span></label>
                                        <select type="text"
                                                multiple="multiple"
                                                name="department[]"
                                                id="department"
                                                class="form-control">
                                            <option value="">{{trans("website.chosseDepartment")}}</option>
                                            @foreach($depts as $dept)
                                                <option value="{{$dept->id}}"
                                                >{{$dept->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('department'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('department') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>فصل / موعد <span class="text-danger">*</span></label>
                                        <select id="selectBox">
                                            <option value="">اختر</option>
                                            <option value="option1">فصل</option>
                                            <option value="option2">موعد</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6" id="class" style="display: none;">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.class_room")}} <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" multiple="multiple" name="classroom[]"
                                                id="classroom">
                                            <option value="">اختر فصل</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('classroom'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('classroom') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6" id="appointment" style="display: none;">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.appointment')}} <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="appointment[]" id="appointment" multiple>
                                            <option value="">اختر الموعد</option>
                                            @foreach($appointments as $appointment)
                                                <option value="{{$appointment->id}}"
                                                >
                                                    {{$appointment->title}} - {{trans('website.'.$appointment->day)}}
                                                    - {{Carbon\Carbon::parse($appointment->time)->format('h:i A')}} - {{$appointment->type == 1 ? 'اونلاين' : 'حضوري' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('appointment'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('appointment') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.medical_history")}}</label>
                                        <textarea name="medical_history" class="form-control"></textarea>
                                        @if ($errors->has('medical_history'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('medical_history') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.birth_date")}} <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="birthdate" value="" placeholder="Enter birthdate"
                                               class="form-control"/>
                                        @if ($errors->has('birthdate'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.branch')}} <span class="text-danger">*</span></label>
                                        <select name="branch_id" class="form-control"/>
                                        <option value="" selected>{{trans('website.select_branch')}}</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}"
                                            >{{ $branch->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('branch_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('branch_id') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="bus">{{trans("website.bus")}}</label>
                                        <select type="number" name="bus" value="" placeholder="Bus"
                                                class="form-control">
                                            <option value="" selected>{{trans("website.select_bus")}}</option>
                                            <option value="0"
                                            >{{trans("website.yes")}}</option>
                                            <option value="1"
                                            >{{trans("website.no")}}</option>
                                        </select>
                                        @if ($errors->has('bus'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('bus') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans('website.email')}} <span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="" placeholder="{{ __('Email') }}"
                                                   class="form-control"/>
                                            @if ($errors->has('email'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blood_type">{{trans("website.blood_type")}}</label>
                                            <input type="text" name="blood_type" value=""
                                                   placeholder='{{trans("website.blood_type")}}' class="form-control">
                                            @if ($errors->has('blood_type'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('blood_type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans("website.password")}} <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password" value="{{old('password')}}"
                                                   placeholder="{{ trans('website.password') }}" class="form-control"/>
                                            @if ($errors->has('password'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans('website.period')}} <span
                                                    class="text-danger">*</span></label>
                                            <select name="period" class="form-control"/>
                                            <option value="" selected>{{trans('website.select_period')}}</option>
                                            <option value="1">{{trans('website.morning')}}</option>
                                            <option value="2">{{trans('website.evining')}}</option>
                                            <option value="3">{{trans('website.both')}}</option>
                                            </select>
                                            @if ($errors->has('period'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('period') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans('website.address')}} <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="address" class="form-control"
                                                      placeholder="{{ trans('website.address') }}"/></textarea>
                                            @if ($errors->has('address'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans("website.joining_date")}} <span class="text-danger">*</span></label>
                                            <input type="date" id="joining_date" name="joining_date" value=""
                                                   placeholder="Enter Joining Date" class="form-control"/>
                                            @if ($errors->has('joining_date'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans("website.gender")}} <span
                                                    class="text-danger">*</span></label>
                                            <select name="gender" class="form-control"/>
                                            <option value="1">{{trans("website.male")}}</option>
                                            <option value="2">{{trans("website.female")}}</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans('website.status')}} <span
                                                    class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control"/>
                                            <option value="0">{{trans('website.pending')}}</option>
                                            <option value="1">{{trans('website.approved')}}</option>
                                            <option value="3">{{trans('website.excluded')}}</option>
                                            <option value="4">{{trans('website.converted')}}</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input__group mt-25 mb-25">
                                            <label>{{ trans('website.parents_social_status') }} <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="parents_social_status">
                                                <option value="1">متزوجين</option>
                                                <option value="2">منفصلين</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-25 mb-25">
                                            <label
                                                for="how_did_you_hear_about_us">{{trans("website.how_know_about_us")}}</label>
                                            <select style="height:41px;" name="how_did_you_hear_about_us"
                                                      placeholder='{{trans("website.how_know_about_us")}}'
                                                      class="form-control how_did_you_hear_about_us">
                                                <option value="2">عن طريق الأصدقاء</option>
                                                <option value="3">عن طريق مواقع التواصل الاجتماعي</option>
                                                <option value="4">الدار متواجدة بمكان سكنى</option>
                                                <option value="5">من أبناء العاملين بالدار</option>
                                                <option value="6">حملات الدعايا بالشارع</option>
                                                <option value="7">قناة الدار على اليوتيوب</option>
                                                <option value="8">عن طريق الأقارب</option>
                                                <option value="9">تواجد الأخوة بالدار</option>
                                                <option value="10">كان متواجد سابقا بالدار</option>
                                                <option value="1">اخري</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('how_did_you_hear_about_us'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('how_did_you_hear_about_us') }}</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input__group mt-25 mb-25">
                                                <label>ملاحظات</label>
                                                <textarea name="notes" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="parent_info">
                                        <h2>{{trans("website.parents_information")}}</h2>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="input__group mb-25">
                                                    <label>{{trans('website.guardian_Relationship')}} <span
                                                            class="text-danger">*</span></label>
                                                    <select name="guardian_relationship[]" id="guardian_relationship"
                                                            class="form-control guardian_relationship" required>
                                                        <option value="1">{{trans('website.father')}}</option>
                                                        <option value="2">{{trans('website.mother')}}</option>
                                                        <option value="3">{{trans('اخري')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: none">
                                                <div class="form-group mb-25">
                                                    <label
                                                        for="guardian_relationship_type">{{trans("نوع الصلة")}}</label>
                                                    <input type="text" name="guardian_relationship_type[]" value="" id="guardian_relationship_type"
                                                           placeholder='{{trans("نوع الصلة")}}'
                                                           class="form-control">
                                                    @if ($errors->has('guardian_relationship_type'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_relationship_type') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <label
                                                        for="guardian_name">{{trans("website.guardian_name")}}</label>
                                                    <input type="text" name="guardian_name[]" value="" id="parentName" required
                                                           placeholder='{{trans("website.guardian_name")}}'
                                                           class="form-control">
                                                    @if ($errors->has('guardian_name'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <label
                                                        for="guardian_phone_number">{{trans("website.guardian_phone_number")}}</label>
                                                    <input type="text" name="guardian_phone_number[]" value="" required
                                                           placeholder="{{trans('website.guardian_phone_number')}}"
                                                           class="form-control">
                                                    @if ($errors->has('guardian_phone_number'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_phone_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <label
                                                        for="guardian_whatsapp_number">{{trans("website.guardian_whatsapp_number")}}</label>
                                                    <select type="text" name="guardian_whatsapp_number_check[]"
                                                           class="form-control guardian_whatsapp_number_check">
                                                        <option value="1">نفس رقم الهاتف</option>
                                                        <option value="0">اخر</option>
                                                    </select>
                                                    @if ($errors->has('guardian_whatsapp_number'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: none">
                                                <div class="form-group mb-25">
                                                    <label
                                                        for="guardian_whatsapp_number">{{trans("website.guardian_whatsapp_number")}}</label>
                                                    <input type="text" name="guardian_whatsapp_number[]" value=""
                                                           placeholder='{{trans("website.guardian_whatsapp_number")}}'
                                                           class="form-control">
                                                    @if ($errors->has('guardian_whatsapp_number'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <label for="id_number">{{trans("website.id_number")}}</label>
                                                    <input type="number" name="id_number[]" value=""
                                                           placeholder="{{trans('website.id_number')}}" required
                                                           class="form-control"/>
                                                    @if ($errors->has('id_number'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('id_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <label for="profession">{{trans('website.profession')}}</label>
                                                    <input type="text" name="profession[]" value="" required
                                                           placeholder="{{trans('website.profession')}}"
                                                           class="form-control"/>
                                                    @if ($errors->has('profession'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('profession') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{trans('website.receiving_officer')}} <span class="text-danger">* </span></label>
                                                <input type="checkbox" name="receiving_officer[]"
                                                       placeholder="{{ trans('website.receiving_officer') }}"
                                                       class="input__checkbox"/>
                                                @if ($errors->has('receiving_officer'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('receiving_officer') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{trans('website.followup_officer')}} <span
                                                        class="text-danger">* </span></label>
                                                <input type="checkbox" name="followup_officer[]"
                                                       placeholder="{{ trans('website.followup_officer') }}"
                                                       class="input__checkbox followup_officer"/>
                                                @if ($errors->has('followup_officer'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('followup_officer') }}</span>
                                                @endif
                                            </div>
                                            <div class="parent_credintials">

                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="parents_card_copy">{{trans("website.parentsCardsCopy")}} <i
                                                    class="fa fa-file"></i></label>
                                            <input type="file" name="parents_card_copy[]" multiple id="imageInput3"
                                                   placeholder="Parents Card Copy" class="form-control">
                                            <div id="imagePreviews3" style="display: flex; flex-wrap: wrap;">
                                            </div>
                                            @if ($errors->has('parents_card_copy'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <button type="button" class="btn buttons-style" id="add_user">اضافة ولي أمر
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <h2>{{trans('اﻟﻮﺛﺎﺋﻖ و اﻟﻤﺴﺘﻨﺪات')}}</h2>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">

                                            <label for="birth_certificate">{{trans(" شهادة ميلاد او بطاقة")}} <i
                                                    class="fa fa-file"></i></label>
                                            <input type="file" name="birth_certificate" id="imageInput" value=""
                                                   placeholder='{{trans(" شهادة ميلاد او بطاقة")}}'
                                                   class="form-control">
                                            <img id="imagePreview" alt="Image Preview"
                                                 style="display:none; max-width: 150px; height: 200px;">
                                            @if ($errors->has('birth_certificate'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="another_file">{{trans("website.another")}} <i class="fa fa-file"></i></label>
                                            <input type="file" name="parents_card_copy"
                                                   id="imageInput2" value=""
                                                   placeholder="{{trans('')}}" class="form-control">
                                            <img id="imagePreview2" alt="Image Preview"
                                                 style="display:none; max-width: 150px; height: 200px;">
                                            @if ($errors->has('another_file'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-3 ">
                                    <div class="col-md-12 text-right d-flex">
                                        <button class="btn buttons-style"
                                                type="submit">{{ trans('website.save') }}</button>
                                        <button id="print" class="btn btn-secondary me-3"
                                                type="button">{{ trans('طباعة') }}</button>
                                    </div>
                                </div>
                        </form>

                        <!-- evaluation -->

                        <div class="row eval-page-print">
                        <div class="item-title ">
                            <h2>{{ trans('إضافة تقييم') }}</h2>
                        </div>
                        <form action="{{route('review.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="">
                                    <h3 class="h2 text-dark">اسم الطفل : <span class="text-danger"></span></h3>
                                    <input type="hidden" name="student_id" value="">
                                </div>
                                <div class="">
                                    <button type="submit" class="btn buttons-style">حفظ</button>
                                    <a href="" class="btn btn-danger">الغاء</a>
                                        <button id = "print" class="btn btn-secondary me-3" type="button">{{ trans('طباعة') }}</button>
                                </div>
                            </div>
                            <div class="row m-5">
                                <!-- <div class=" d-flex justify-content-center align-items-center p-5  col-md-1"> -->
                                    <h2 class="mb-3">اضطرابات النطق</h2>
                                  <!-- </div> -->
                                <div class="col-md-6" >
                                    <input type="hidden" name="question[]" value="speech_disorders">
                                    <textarea style="height: 50px" class="form-control" name="speech_disorders"></textarea>
                                </div>
                            </div>
                            <div class="row m-5">
                                <!-- <div class=" d-flex justify-content-center align-items-center p-5  col-md-1"> -->
                                    <h2>للملتحقين بقسم القرآن</h2>
                                <!-- </div> -->

                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">القرآن حفظاً</label>
                                    <input type="hidden" name="question[]" value="quran_memorization">
                                    <textarea style="height: 50px" class="form-control" name="quran_memorization"></textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">تلاوة معرفياً</label>
                                    <textarea style="height: 50px" class="form-control" name="cognitive_recitation"></textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">تلاوة تطبيقياً</label>
                                    <input type="hidden" name="question[]" value="practical_recitation">
                                    <textarea style="height: 50px" class="form-control" name="practical_recitation"><</textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">علوم الشريعة</label>
                                    <input type="hidden" name="question[]" value="sharia_sciences">
                                    <textarea style="height: 50px" class="form-control" name="sharia_sciences"><</textarea>
                                </div>
                            </div>
                            <div class="row m-5 align-items-end">
                                <!-- <div class=" d-flex justify-content-center align-items-center p-5  col-md-1"> -->
                                        <h2>للملتحقين بمواد تعليمية أخرى</h2>
                                <!-- </div> -->
                                @foreach(\App\Models\Subject::all() as $subject)
                                    <div class="col-md-6" >
                                        <label class="form-label form-margin ">{{$subject->name}}</label>
                                        <input type="hidden" name="question[]" value="{{str_replace(' ', '-', strtolower($subject->name))}}">
                                        <textarea style="height: 50px" class="form-control" name="{{str_replace(' ', '-', strtolower($subject->name))}}"></textarea>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row m-5 align-items-center">
                                    <h2>للملتحقين بقسم تعليم التلاوة</h2>
                                <div class="col-md-6" >
                                    <label class="form-label" >تمكين الحروف</label>
                                    <input type="hidden" name="question[]" value="enable_letters">
                                    <textarea style="height: 50px" class="form-control" name="enable_letters"></textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">قراءة بنية الكلمات</label>
                                    <input type="hidden" name="question[]" value="Reading_the_structure_of_words">
                                    <textarea style="height: 50px" class="form-control" name="Reading_the_structure_of_words"></textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">تجميع الجمل</label>
                                    <input type="hidden" name="question[]" value="assembly_of_sentences">
                                    <textarea style="height: 50px" class="form-control" name="assembly_of_sentences"></textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">إملاء</label>
                                    <input type="hidden" name="question[]" value="filling">
                                    <textarea style="height: 50px" class="form-control" name="filling"></textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">القرآن بدون تشكيل</label>
                                    <input type="hidden" name="question[]" value="quran_diacritics">
                                    <textarea style="height: 50px" class="form-control" name="quran_diacritics"></textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">القرآن في المصحف</label>
                                    <input type="hidden" name="question[]" value="quran_in_quran">
                                    <textarea style="height: 50px" class="form-control" name="quran_in_quran"></textarea>
                                </div>
                                <div class="col-md-6" >
                                    <label class="form-label form-margin ">آداب إسلامية</label>
                                    <input type="hidden" name="question[]" value="islamic_etiquette">
                                    <textarea style="height: 50px" class="form-control" name="islamic_etiquette"></textarea>
                                </div>                   
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
    <script src="{{asset('admin/js/jasonday-printThis-23be1f8/printThis.js')}}"></script>

    <script>
        const checkbox = document.getElementById('selectBox');
        const selectInput1 = document.getElementById('class');
        const selectInput2 = document.getElementById('appointment');

        $('#selectBox').on('change', function () {
            if ($(this).val() === 'option1') {
                selectInput1.style.display = 'block';
                selectInput2.style.display = 'none';

            } else if (checkbox.value === 'option2') {
                selectInput1.style.display = 'none';
                selectInput2.style.display = 'block';
            } else {
                selectInput1.style.display = 'none';
                selectInput2.style.display = 'none';
            }
        });
    </script>
    <script>

        $('.guardian_relationship').on('change', function () {
            if ($(this).val() == 3)
            {
                console.log($(this).val())
                $(this).parent().parent().next('.col-md-6').css('display', 'block');
            }
            else
            {
                $(this).parent().parent().next('.col-md-6').css('display', 'none');
            }
        });
    </script>

    <script>

        $('.guardian_whatsapp_number_check').on('change', function () {
            if ($(this).val() == 0)
            {
                console.log($(this).val())
                $(this).parent().parent().next('.col-md-6').css('display', 'block');
            }
            else
            {
                $(this).parent().parent().next('.col-md-6').css('display', 'none');
            }
        });
    </script>
    <script>

        $('.how_did_you_hear_about_us').on('change', function () {
            if ($(this).val() == 1) {
                $(this).parent().find('select').removeAttr("name");
                $(this).parent().append('<input type="text" name="how_did_you_hear_about_us" class="form-control my-3 how_did_you_hear_about_us">')
            }else{

                $(this).parent().find('input').remove()
                if(!$(this).parent().find('select'))
                {

                    $(this).parent().find('select').attr("name",'how_did_you_hear_about_us');

                }

            }
        });
    </script>

    <script>
        const joining_date = document.getElementById('joining_date');

        $('#status').on('change', function () {

            if ($(this).val() == 1) {
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
        const add_user = document.getElementById('add_user');
        const add_user_component = document.getElementById('add_user_component');
        const parent_info = document.getElementById;
        count = 0;
        add_user.addEventListener('click', function () {
            if (count < 2)
                $('#parent_info').append(`<h2>{{trans("website.parents_information")}}</h2>
<br>
 <div class="row">
                                            <div class="col-md-6" >
                                                <div class="input__group mb-25">
                                                    <label>{{trans('website.guardian_Relationship')}} <span
                                                            class="text-danger">*</span></label>
                                                    <select name="guardian_relationship[]" id="guardian_relationship"
                                                            class="form-control guardian_relationship">
                                                        <option value="1">{{trans('website.father')}}</option>
                                                        <option value="2">{{trans('website.mother')}}</option>
                                                        <option value="3">{{trans('اخري')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: none">
                                                <div class="form-group mb-25">
                                                    <label
                                                        for="guardian_relationship_type">{{trans("نوع الصلة")}}</label>
                                                    <input type="text" name="guardian_relationship_type[]" value="" id="guardian_relationship_type"
                                                           placeholder='{{trans("نوع الصلة")}}'
                                                           class="form-control">
                                                    @if ($errors->has('guardian_relationship_type'))
                <span class="text-danger"><i
                        class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_relationship_type') }}</span>
                                                    @endif
                </div>
            </div>
        </div>
<div class="row">
<div class="col-md-6">
<div class="form-group mb-25">
<label for="guardian_name">{{trans("website.guardian_name")}}</label>
            <input type="text" name="guardian_name[]" value="" id="parentName" placeholder='{{trans("website.guardian_name")}}' class="form-control">
            @if ($errors->has('guardian_name'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-25">
                    <label for="guardian_phone_number">{{trans("website.guardian_phone_number")}}</label>
            <input type="text" name="guardian_phone_number[]" value="" placeholder="{{trans('website.guardian_phone_number')}}" class="form-control">
            @if ($errors->has('guardian_phone_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_phone_number') }}</span>
            @endif
                </div>
            </div>
             <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <label
                                                        for="guardian_whatsapp_number">{{trans("website.guardian_whatsapp_number")}}</label>
                                                    <select type="text" name="guardian_whatsapp_number_check[]"
                                                           class="form-control guardian_whatsapp_number_check">
                                                        <option value="1">نفس رقم الهاتف</option>
                                                        <option value="0">اخر</option>
                                                    </select>
                                                    @if ($errors->has('guardian_whatsapp_number'))
                <span class="text-danger"><i
                        class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
                                                    @endif
                </div>
            </div>
<div class="col-md-6" style="display: none">
<div class="form-group mb-25">
<label for="guardian_whatsapp_number">{{trans("website.guardian_whatsapp_number")}}</label>
            <input type="text" name="guardian_whatsapp_number[]" value="" placeholder='{{trans("website.guardian_whatsapp_number")}}' class="form-control">
            @if ($errors->has('guardian_whatsapp_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-25">
                    <label for="id_number">{{trans("website.id_number")}}</label>
            <input type="number" name="id_number[]" value="" placeholder="{{trans('website.id_number')}}" class="form-control"/>
            @if ($errors->has('id_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('id_number') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-25">
                    <label for="profession">{{trans('website.profession')}}</label>
            <input type="text" name="profession[]" value="" placeholder="{{trans('website.profession')}}" class="form-control"/>
            @if ($errors->has('profession'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('profession') }}</span>
            @endif
                </div>
            </div>

            <div class="col-md-6">
                <label>{{trans('website.receiving_officer')}} <span class="text-danger">* </span></label>
        <input type="checkbox" name="receiving_officer[]" placeholder="{{ trans('website.receiving_officer') }}" class="input__checkbox" />
        @if ($errors->has('receiving_officer'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('receiving_officer') }}</span>
        @endif
                </div>
                <div class="col-md-6">
                    <label>{{trans('website.followup_officer')}} <span class="text-danger">* </span></label>
        <input type="checkbox" name="followup_officer[]"
        placeholder="{{ trans('website.followup_officer') }}"
        class="input__checkbox followup_officer"
        id="followup_officer${count}"/>
        @if ($errors->has('followup_officer'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('followup_officer') }}</span>
        @endif
                </div>
             <div class="parent_credintials">

                </div>

            </div>

        </div>`);
            count++
                $('.followup_officer').on('click',function (){

                if($(this).prop('checked'))
                {
                    var isChecked = $('.followup_officer').is(':checked');

                    $('.followup_officer').not(this).prop('disabled', isChecked);
                    $('.followup_officer').parent().next('.parent_credintials').find('div[id=credits]').remove();
                    $(this).parent().next('.parent_credintials').find('div[id=credits]').remove();
                    $(this).parent().next('.parent_credintials').append(`
                        <div class="row mb-3" id="credits">
                            <div class="col-md-6">
                                <label>البريد الالكتروني</label>
                                <input type="email" required name="guardian_email[]" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>كلمة السر</label>
                                <input type="password" required name="guardian_password[]" class="form-control">
                            </div>
                        </div>
`)
                }
                else{

                    $('.followup_officer').prop('disabled', false);

                    $(this).parent().next('.parent_credintials').find('div[id=credits]').remove();
                }
            })
            $('.guardian_relationship').on('change', function () {
                if ($(this).val() == 3)
                {
                    $(this).parent().parent().next('.col-md-6').css('display', 'block');
                }
                else
                {
                    $(this).parent().parent().next('.col-md-6').css('display', 'none');
                }
            });
            $('.guardian_whatsapp_number_check').on('change', function () {
                if ($(this).val() == 0)
                {
                    console.log($(this).val())
                    $(this).parent().parent().next('.col-md-6').css('display', 'block');
                }
                else
                {
                    $(this).parent().parent().next('.col-md-6').css('display', 'none');
                }
            });
        });

    </script>
    <script>
        if ($('#guardian_relationship').val() == 1) {

            // Get references to the input elements
            const fullNameInput = document.getElementById('fullname');
            const fatherNameInput = document.getElementById('parentName');

            // Add an event listener to the full name input
            fullNameInput.addEventListener('input', () => {
                // Automatically detect father's name and update the second input
                const fullName = fullNameInput.value;
                const fatherName = detectFatherName(fullName); // You should implement this function
                fatherNameInput.value = fatherName;
            });

            // Function to detect the father's name (you can implement your own logic)
            function detectFatherName(fullName) {
                // Implement your logic to detect the father's name here
                // For this example, we'll assume the father's name is the last word in the full name
                const fullNameWords = fullName.trim().split(' ');
                console.log(fullNameWords)
                if (fullNameWords.length >= 2) {
                    const removedElement = fullNameWords.shift();
                    const fullName = fullNameWords.join(' '); // Joins the array elements with a space delimiter
                    return fullName;
                } else {
                    return '';
                }
            }
        }
    </script>
    <script>
        $('#department').on('change', function () {

            $('#classroom').empty()
            $.ajax({
                type: 'GET',
                url: '{{url('/')}}/admin/student/getClasses/' + $(this).val(),
                success: function (data) {
                    data.forEach(function (e) {
                        $('#classroom').append(`<option value="${e.id}" >${e.name}</option>`)

                    })
                }
            })
        });
    </script>
    <script>
        $('#imageInput').on('change', function (event) {
            const input = event.target;
            const $imagePreview = $('#imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
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

        $('#imageInput2').on('change', function (event) {
            const input = event.target;
            const $imagePreview = $('#imagePreview2');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
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

        $('#imageInput3').on('change', function (event) {
            const input = event.target;
            const $imagePreviews = $('#imagePreviews3');
            $imagePreviews.empty(); // Clear previous previews

            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    const reader = new FileReader();
                    const file = input.files[i];

                    reader.onload = function (e) {
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

            if (input.files[0].size > 1000000) {
                alert("Maximum file size is 1MB!");
            } else {
                reader.onload = function () {
                    console.log(reader)
                    preview.src = reader.result;
                };
                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "";
                }
            }
        }
    </script>
    <script>

        $(document).ready(function () {
            $("#print").on("click", function printDiv() {
                console.log("clicked")
                $("#print-form").printThis({
                    importStyle: true,
                    loadCSS: "./main.css",
                })
            })
        })

    </script>
    <script>
        $('.followup_officer').on('click',function (){

            if($(this).prop('checked'))
            {
               $(this).parent().next('.parent_credintials').append(`
                        <div class="row mb-3" id="credits">
                            <div class="col-md-6">
                                <label>البريد الالكتروني</label>
                                <input type="email" required name="guardian_email[]" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>كلمة السر</label>
                                <input type="password" required name="guardian_password[]" class="form-control">
                            </div>
                        </div>
`)
            }
            else{
                $(this).parent().next('.parent_credintials').find('div[id=credits]').remove();
            }
        })
    </script>
@endpush
