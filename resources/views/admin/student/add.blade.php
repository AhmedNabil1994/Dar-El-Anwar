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
                        <form action="{{route('student.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="upload-img-box mb-25">
                                            <input type="file" name="image" id="image" accept="image/*" onchange="previewFile(this)">
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                                <p class="m-0">{{trans('website.image')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                    @endif
                                    <p>{{ __('Accepted Image Files') }}: JPEG, JPG, PNG <br> {{ trans('website.accepted_size') }}: 300 x 300 (1MB)</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.name")}} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value=" " placeholder='{{trans("website.name")}}' class="form-control" />
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
                                                    <option value="{{ $city->id }}">{{ $city->city_name_en }}</option>
                                                @endforeach
                                        </select>
                                        @if ($errors->has('city_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.class_room")}} <span class="text-danger">*</span></label>
                                        <input type="text" name="classroom" value=" " placeholder='{{trans("website.class_room")}}' class="form-control" />
                                        @if ($errors->has('classroom'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('classroom') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.medical_history")}}<span class="text-danger">*</span></label>
                                        <input type="date" name="medical_history" value="" class="form-control" />
                                        @if ($errors->has('medical_history'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('medical_history') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.birth_date")}} <span class="text-danger">*</span></label>
                                        <input type="date" name="birthdate" value="" placeholder="Enter birthdate" class="form-control" />
                                        @if ($errors->has('birthdate'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.department")}} <span class="text-danger">*</span></label>
                                        <input type="text" name="department" value=" " class="form-control" />
                                        @if ($errors->has('department'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('department') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.branch')}} <span class="text-danger">*</span></label>
                                        <select name="branch_id" class="form-control" />
                                        <option value="" selected>{{trans('website.select_branch')}}</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}" >{{ $branch->name }}</option>
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
                                        <option value="0">{{trans("website.yes")}}</option>
                                        <option value="1">{{trans("website.no")}}</option>
                                    </select>
                                    @if ($errors->has('bus'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('bus') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.email')}} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{old('email')}}" placeholder="{{ __('Email') }}" class="form-control" />
                                        @if ($errors->has('email'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="blood_type">{{trans("website.blood_type")}}</label>
                                        <input type="text" name="blood_type" value="" placeholder='{{trans("website.blood_type")}}' class="form-control">
                                        @if ($errors->has('blood_type'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('blood_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.password")}} <span class="text-danger">*</span></label>
                                        <input type="password" name="password" value="{{old('password')}}" placeholder="{{ trans('website.password') }}" class="form-control" />
                                        @if ($errors->has('password'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.period')}} <span class="text-danger">*</span></label>
                                        <select name="period" class="form-control" />
                                        <option value="" selected>{{trans('website.select_period')}}</option>
                                        <option value="1" >{{trans('website.morning')}}</option>
                                        <option value="2" >{{trans('website.evining')}}</option>
                                        <option value="3" >{{trans('website.both')}}</option>
                                        </select>
                                        @if ($errors->has('period'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('period') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.phone_number')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" value="" placeholder="{{ trans('website.phone_number') }}" class="form-control" />
                                        @if ($errors->has('phone_number'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans('website.address')}} <span class="text-danger">*</span></label>
                                            <textarea name="address" class="form-control" placeholder="{{ trans('website.address') }}" /></textarea>
                                            @if ($errors->has('address'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.joining_date")}} <span class="text-danger">*</span></label>
                                        <input type="date" name="joining_date" value="" placeholder="Enter Joining Date" class="form-control" />
                                        @if ($errors->has('joining_date'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.appointment')}} <span class="text-danger">*</span></label>
                                        <input type="date" name="appointment" value="" placeholder="{{trans('website.appointment')}}" class="form-control" />
                                        @if ($errors->has('appointment'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans("website.gender")}} <span class="text-danger">*</span></label>
                                            <select name="gender" class="form-control" />
                                            <option value="0">{{trans("website.select_gender")}}</option>
                                            <option value="1" >{{trans("website.male")}}</option>
                                            <option value="2" >{{trans("website.female")}}</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.status')}} <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" />
                                        <option value="" selected >{{trans('website.select_status')}}</option>
                                        <option value="0" >{{trans('website.pending')}}</option>
                                        <option value="1" >{{trans('website.approved')}}</option>
                                        <option value="2" >{{trans('website.blocked')}}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.guardian_Relationship')}} <span class="text-danger">*</span></label>
                                        <select name="guardian_relationship" value="" placeholder="{{ __('Guardian relationship') }}" class="form-control" >
                                        <option value="Father">{{trans('website.father')}}</option>
                                        <option value="Mother">{{trans('website.mother')}}</option>
                                        <optionc value="Other">{{trans('website.other')}}</optionc>
                                        </select>
                                        @if ($errors->has('guardian_relationship'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_relationship') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <h2>{{trans("website.parents_information")}}</h2>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="guardian_name">{{trans("website.guardian_name")}}</label>
                                            <input type="text" name="guardian_name" value="" placeholder='{{trans("website.guardian_name")}}' class="form-control">
                                            @if ($errors->has('guardian_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="guardian_phone_number">{{trans("website.guardian_phone_number")}}</label>
                                            <input type="text" name="guardian_phone_number" value="" placeholder="{{trans('website.guardian_phone_number')}}" class="form-control">
                                            @if ($errors->has('guardian_phone_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="guardian_whatsapp_number">{{trans("website.guardian_whatsapp_number")}}</label>
                                            <input type="text" name="guardian_whatsapp_number" value="" placeholder='{{trans("website.guardian_whatsapp_number")}}' class="form-control">
                                            @if ($errors->has('guardian_whatsapp_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="id_number">{{trans("website.id_number")}}</label>
                                            <input type="number" name="id_number" value="" placeholder="{{trans('website.id_number')}}" class="form-control"/>
                                            @if ($errors->has('id_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('id_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                        <label for="profession">{{trans('website.profession')}}</label>
                                        <input type="text" name="profession" value="" placeholder="{{trans('website.profession')}}" class="form-control"/>
                                        @if ($errors->has('profession'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('profession') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{trans('website.guardian_email')}} <span class="text-danger">*</span></label>
                                            <input type="email" name="guardian_email" value="{{old('guardian_email')}}" placeholder="{{ trans('website.guardian_email') }}" class="form-control" />
                                            @if ($errors->has('guardian_email'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>{{trans('website.receiving_officer')}} <span class="text-danger">* </span></label>
                                            <input type="checkbox" name="receiving_officer" placeholder="{{ trans('website.receiving_officer') }}" class="input__checkbox" />
                                            @if ($errors->has('receiving_officer'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('receiving_officer') }}</span>
                                            @endif
                                    </div>
                                    <div class="col-md-6">
                                            <label>{{trans('website.followup_officer')}} <span class="text-danger">* </span></label>
                                            <input type="checkbox" name="followup_officer"  placeholder="{{ trans('website.followup_officer') }}" class="input__checkbox" />
                                            @if ($errors->has('followup_officer'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('followup_officer') }}</span>
                                            @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-25 mb-25">
                                            <label for="how_did_you_hear_about_us">{{trans("website.how_know_about_us")}}</label>
                                            <textarea name="how_did_you_hear_about_us" placeholder='{{trans("website.how_know_about_us")}}' class="form-control">
                                                </textarea>
                                            @if ($errors->has('how_did_you_hear_about_us'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('how_did_you_hear_about_us') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mt-25 mb-25">
                                            <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="parents_social_status" class="form-control-file">
                                            @if ($errors->has('parents_social_status'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('parents_social_status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <h2>{{trans('website.another_information')}}</h2>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">

                                            <label for="birth_certificate">{{trans("website.birth_certificate")}} <i class="fa fa-file"></i></label>
                                            <input type="file" name="birth_certificate" value="" placeholder='{{trans("website.birth_certificate")}}' class="form-control">
                                            @if ($errors->has('birth_certificate'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="another_file">{{trans("website.another")}} <i class="fa fa-file"></i></label>
                                            <input type="file" name="parents_card_copy" value="" placeholder="{{trans('')}}" class="form-control">
                                            @if ($errors->has('another_file'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="parents_card_copy">Parents Card Copy <i class="fa fa-file"></i></label>
                                            <input type="file" name="parents_card_copy" value="" placeholder="Parents Card Copy" class="form-control">
                                            @if ($errors->has('parents_card_copy'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
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
