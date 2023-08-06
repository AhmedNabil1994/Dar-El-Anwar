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
                                <h2>{{ __('Edit Student') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Student') }}</li>
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
                            <h2>{{ __('Edit Student') }}</h2>
                        </div>
                        <form action="{{route('student.update',$student->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="upload-img-box mb-25">
                                            <img src="{{asset($student->getImg())}}">
                                            <input type="file" name="image" id="image" accept="image/*"  onchange="previewFile(this)">
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                                <p class="m-0">{{__('Image')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                    @endif
                                    <p>{{ __('Accepted Image Files') }}: JPEG, JPG, PNG <br> {{ __('Accepted Size') }}: 300 x 300 (1MB)</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{$student->name}}" placeholder="Enter full name" class="form-control" />
                                        @if ($errors->has('name'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{ __('City') }} <span class="text-danger">*</span></label>
                                        <select name="city_id" class="form-control" id="city-select">
                                            <option value="">{{ __('Select city') }}</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" {{$city->id == $student->city_id ? "selected":""}}>{{ $city->city_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('city_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Class Room <span class="text-danger">*</span></label>
                                        <input type="text" name="classroom" value="{{$student->classroom}}" placeholder="Class Room" class="form-control" />
                                        @if ($errors->has('classroom'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('classroom') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Medical History<span class="text-danger">*</span></label>
                                        <input type="date" name="medical_history" value="{{$student->medical_history}}" placeholder="Enter Medical History" class="form-control" />
                                        @if ($errors->has('medical_history'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('medical_history') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Birthdate <span class="text-danger">*</span></label>
                                        <input type="date" name="birthdate" value="{{$student->birthdate}}" placeholder="Enter birthdate" class="form-control" />
                                        @if ($errors->has('birthdate'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <input type="text" name="department" value="{{$student->department}}" placeholder="Department" class="form-control" />
                                        @if ($errors->has('department'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('department') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Code <span class="text-danger">*</span></label>
                                        <input type="text" disabled name="code" value="{{$student->code}}" placeholder="Enter code" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{__('Branch')}} <span class="text-danger">*</span></label>
                                        <select name="branch_id" class="form-control" />
                                        <option value="" selected>{{__('Select Branch')}}</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}" {{$branch->id == $student->branch_id ? "selected":""}}>{{ $branch->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('branch_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('branch_id') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="bus">Bus</label>
                                    <select type="number" name="bus"  placeholder="Bus" class="form-control">
                                        <option value="" selected> Select Bus</option>
                                        <option value="0" {{$student->bus == 0 ? "selected":""}}> YES</option>
                                        <option value="1" {{$student->bus == 1 ? "selected":""}}> NO</option>
                                    </select>
                                    @if ($errors->has('bus'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('bus') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{__('Email')}} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{$student->email}}" placeholder="{{ __('Email') }}" class="form-control" />
                                        @if ($errors->has('email'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="blood_type">Blood Type</label>
                                        <input type="text" name="blood_type" value="{{$student->blood_type}}" placeholder="Blood Type" class="form-control">
                                        @if ($errors->has('blood_type'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('blood_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                                        <input type="password" name="password" value="{{old('password')}}" placeholder="{{ __('Password') }}" class="form-control" />
                                        @if ($errors->has('password'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{__('Period')}} <span class="text-danger">*</span></label>
                                        <select name="period" class="form-control" />
                                        <option value="" selected>{{__('Select Period')}}</option>
                                        <option value="1" {{$student->period == 1 ? "selected":""}}>{{__('Morning')}}</option>
                                        <option value="2" {{$student->period == 2 ? "selected":""}}>{{__('Evening')}}</option>
                                        <option value="3" {{$student->period == 3 ? "selected":""}}>{{__('Both')}}</option>
                                        </select>
                                        @if ($errors->has('period'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('period') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{__('Phone Number')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" value="{{$student->phone_number}}" placeholder="{{ __('Phone number') }}" class="form-control" />
                                        @if ($errors->has('phone_number'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{__('Address')}} <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" placeholder="{{ __('Address') }}" />{{$student->address    }}</textarea>
                                        @if ($errors->has('address'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Joining Date <span class="text-danger">*</span></label>
                                        <input type="date" name="joining_date" value="{{$student->joining_date}}" placeholder="Enter Joining Date" class="form-control" />
                                        @if ($errors->has('joining_date'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Appointment <span class="text-danger">*</span></label>
                                        <input type="date" name="appointment" value="{{$student->appointment}}" placeholder="Enter Appointment" class="form-control" />
                                        @if ($errors->has('appointment'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-control" />
                                        <option value="0">Select gender</option>
                                        <option value="1" {{$student->gender == 1 ? "selected":""}}>Male</option>
                                        <option value="2" {{$student->gender == 2 ? "selected":""}}>Female</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{__('Status')}} <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" />
                                        <option value="" selected >{{__('Select Status')}}</option>
                                        <option value="0" {{$student->status == 0 ? "selected":""}}>{{__('Pending')}}</option>
                                        <option value="1" {{$student->status == 1 ? "selected":""}}>{{__('Approved')}}</option>
                                        <option value="2" {{$student->status == 2 ? "selected":""}}>{{__('Blocked')}}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{__('Guardian Relationship')}} <span class="text-danger">*</span></label>
                                        <select name="guardian_relationship" placeholder="{{ __('Guardian relationship') }}" class="form-control" >
                                            <option value="Father" @if($parent->relationship == 'Father') selected @endif>{{__('Father')}}}</option>
                                            <option value="Mother" @if($parent->relationship == 'Mother') selected @endif>{{__('Mother')}}</option>
                                            <option value="Other" @if($parent->relationship == 'Other') selected @endif >{{__('Other')}}</option>
                                        </select>
                                        @if ($errors->has('guardian_relationship'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_relationship') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <h2>Parents Information</h2>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="guardian_name">Guardian Name</label>
                                            <input type="text" name="guardian_name" value="{{$parent->name}}" placeholder="Guardian Name" class="form-control">
                                            @if ($errors->has('guardian_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="guardian_phone_number">Guardian Phone Number</label>
                                            <input type="text" name="guardian_phone_number" value="{{$parent->phone_number}}" placeholder="Guardian Phone Number" class="form-control">
                                            @if ($errors->has('guardian_phone_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="guardian_whatsapp_number">Guardian WhatsApp Number</label>
                                            <input type="text" name="guardian_whatsapp_number" value="{{$parent->whatsapp_number}}" placeholder="Guardian WhatsApp Number" class="form-control">
                                            @if ($errors->has('guardian_whatsapp_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="id_number">ID Number</label>
                                            <input type="number" name="id_number" value="{{$parent->national_id}}" placeholder="ID Number" class="form-control"/>
                                            @if ($errors->has('id_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('id_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="profession">Profession</label>
                                            <input type="text" name="profession" value="{{$parent->profession}}" placeholder="Profession" class="form-control"/>
                                            @if ($errors->has('profession'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('profession') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>{{__('Guardian Email')}} <span class="text-danger">*</span></label>
                                            <input type="email" name="guardian_email" value="{{$parent->email}}" placeholder="{{ __('Guardian Email') }}" class="form-control" />
                                            @if ($errors->has('guardian_email'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{__('Receiving Officer')}} <span class="text-danger">* </span></label>
                                        <input type="checkbox" name="receiving_officer" placeholder="{{ __('Receiving Officer') }}" class="input__checkbox" {{$parent->student_pickup_optional == 1 ? "checked" : ""}}/>
                                        @if ($errors->has('receiving_officer'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('receiving_officer') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{__('Followup Officer')}} <span class="text-danger">* </span></label>
                                        <input type="checkbox" name="followup_officer"  placeholder="{{ __('Followup Officer') }}" class="input__checkbox" {{$parent->follow_up_person == 1 ? "checked" : ""}} />
                                        @if ($errors->has('followup_officer'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('followup_officer') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-25 mb-25">
                                            <label for="how_did_you_hear_about_us">How Did You Hear About Us?</label>
                                            <textarea name="how_did_you_hear_about_us"  placeholder="How Did You Hear About Us?" class="form-control">
                                               {{$student->how_did_you_hear_about_us}}
                                                </textarea>
                                            @if ($errors->has('how_did_you_hear_about_us'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('how_did_you_hear_about_us') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mt-25 mb-25">
                                            <label>{{ __('Parent\'s Social Status') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="parents_social_status" value="{{$parent->parents_marital_status}}" class="form-control-file">
                                            @if ($errors->has('parents_social_status'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('parents_social_status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
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
