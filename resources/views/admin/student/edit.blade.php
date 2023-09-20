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
                        <div class="item-title d-flex justify-content-center">
                            <button class="btn mx-3 buttons-style">{{ trans('التعليمات') }}</button>
                            <a href="{{route('review.create',$student->id)}}" class="btn mx-3 buttons-style">{{ trans('التقييمات') }}</a>
                        </div>
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.add_student') }}</h2>
                        </div>
                        <form action="{{route('student.update',$student)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="upload-img-box mb-25">
                                            <input type="file" name="image" id="image" accept="image/*" onchange="previewFile(this)">
                                            <img id="upload-img-box-icon" src="{{asset($student->getImg())}}" >
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
                                        <input type="text" name="name" value="{{$student->name}}" placeholder='{{trans("website.name")}}' class="form-control" />
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
                                                    {{$student->city_id == $city->id ? 'selected' : ''}}
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
                                                    {{in_array($level->id, $student->level->pluck('id')->toArray()) ? 'selected' : ''}}
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
                                            {{$student->class_room_id? 'selected' : ''}}
                                            >فصل</option>
                                            <option value="option2"
                                                {{$student->courses->count() > 0 ? 'selected' : ''}}
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
                                                    {{$student->class_room_id == $class_room->id? 'selected' : ''}}
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
                                                    {{in_array($appointment->id, $student->courses->pluck('id')->toArray())? 'selected' : ''}}
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
                                        <textarea name="medical_history" class="form-control" >{{$student->medical_history}}</textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.birth_date")}} <span class="text-danger">*</span></label>
                                        <input type="date" name="birthdate" value="{{$student->birthdate}}" placeholder="Enter birthdate" class="form-control" />
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
                                                    {{in_array($dept->id, $student->dept->pluck('id')->toArray())?'selected':''}}
                                                >{{$dept->name}}</option>
                                            @endforeach
                                            <select>
                                    </div>
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
                                        <option value="{{ $branch->id }}"
                                            {{$student->branch_id == $branch->id ? 'selected' : ''}}
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
                                    <select type="number" name="bus" value="" placeholder="Bus" class="form-control">
                                        <option value="" selected>{{trans("website.select_bus")}}</option>
                                        <option value="0"
                                            {{$student->bus == 0 ? 'selected' : ''}}
                                        >{{trans("website.yes")}}</option>
                                        <option value="1"
                                            {{$student->bus == 1 ? 'selected' : ''}}
                                        >{{trans("website.no")}}</option>
                                    </select>
                                    @if ($errors->has('bus'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('bus') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.email')}} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{$student->email}}" placeholder="{{ __('Email') }}" class="form-control" />
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
                                        <input type="text" name="blood_type" value="{{$student->blood_type}}" placeholder='{{trans("website.blood_type")}}' class="form-control">
                                        @if ($errors->has('blood_type'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('blood_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.password")}} <span class="text-danger">*</span></label>
                                        <input type="password" name="password" value="" placeholder="{{ trans('website.password') }}" class="form-control" />
                                        @if ($errors->has('password'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.period')}} <span class="text-danger">*</span></label>
                                        <select name="period" class="form-control" />
                                        <option value="" selected>{{trans('website.select_period')}}</option>
                                        <option value="1" {{$student->period == 1 ? 'selected' : ''}}>{{trans('website.morning')}}</option>
                                        <option value="2" {{$student->period == 2 ? 'selected' : ''}}>{{trans('website.evining')}}</option>
                                        <option value="3" {{$student->period == 3 ? 'selected' : ''}}>{{trans('website.both')}}</option>
                                        </select>
                                        @if ($errors->has('period'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('period') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.address')}} <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" placeholder="{{ trans('website.address') }}" />{{$student->address}}</textarea>
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
                                        <input type="date" id="joining_date" name="joining_date" value="{{$student->joining_date}}" placeholder="Enter Joining Date" class="form-control" />
                                        @if ($errors->has('joining_date'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>{{trans("website.gender")}} <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-control" />
                                        <option value="">{{trans("website.select_gender")}}</option>
                                        <option value="1" {{$student->gender == 1? 'selected' : ''}}>{{trans("website.male")}}</option>
                                        <option value="2" {{$student->gender == 2? 'selected' : ''}}>{{trans("website.female")}}</option>
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
                                        <label>{{trans('website.status')}} <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control" />
                                        <option value="" selected >{{trans('website.select_status')}}</option>
                                        <option value="0" {{$student->status == 0? 'selected' : ''}}>{{trans('website.pending')}}</option>
                                        <option value="1" {{$student->status == 1? 'selected' : ''}}>{{trans('website.approved')}}</option>
                                        <option value="3" {{$student->status == 3? 'selected' : ''}}>{{trans('website.excluded')}}</option>
                                        <option value="4" {{$student->status == 4? 'selected' : ''}}>{{trans('website.converted')}}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <button type="button" class="btn buttons-style" id="add_user">اضافة مستحدم</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input__group mt-25 mb-25">
                                        <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                                        <select class="form-select" name="parents_social_status">
                                            <option value="">اختر الحالة</option>
                                            <option value="1" {{$student->parents_marital_status == 1? 'selected' : ''}}>متزوجين</option>
                                            <option value="2" {{$student->parents_marital_status == 2? 'selected' : ''}}>منفصلين</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-25 mb-25">
                                        <label for="how_did_you_hear_about_us">{{trans("website.how_know_about_us")}}</label>
                                        <textarea name="how_did_you_hear_about_us"
                                                  placeholder='{{trans("website.how_know_about_us")}}'
                                                  class="form-control">{{$student->how_did_you_hear_about_us}}</textarea>
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
                                            <textarea name="notes" class="form-control" >{{$student->notes}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div id="parent_info">
                                    @if($student->parent->count() > 0)
                                        @foreach($student->parent as $parent)
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
                                            <img id="imagePreview" src="{{asset($student->get_birth_certificate?->file_name)}}" alt="Image Preview" style="max-width: 150px; height: 200px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-25">
                                            <label for="another_file">{{trans("website.another")}} <i class="fa fa-file"></i></label>
                                            <input type="file" name="another_file"  id="imageInput2" value="" placeholder="{{trans('')}}" class="form-control">
                                            <img id="imagePreview2" src="{{asset($student->get_another_file?->file_name)}}" alt="Image Preview" style=" max-width: 150px; height: 200px;">
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
                                                @if($student->parents_card_copy)
                                                @foreach(json_decode($student->parents_card_copy) as $photo)
                                                    <img src="{{api_asset($photo)}}" style=" max-width: 150px; height: 150px;">
                                                @endforeach
                                             @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12 text-right">
                                        <button class="btn buttons-style" type="submit">{{ trans('website.save') }}</button>
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
        const add_user = document.getElementById('add_user');
        const add_user_component = document.getElementById('add_user_component');
        const parent_info = document.getElementById;
        count = {{$student->parent->count()}};
        add_user.addEventListener('click', function() {
            if(count < 3 )
                $('#parent_info').append(`<h2>{{trans("website.parents_information")}}</h2>
<br>
<div class="col-md-6">
    <div class="input__group mb-25">
        <label>{{trans('website.guardian_Relationship')}} <span class="text-danger">*</span></label>
        <select name="guardian_relationship[]"  class="form-control" >
            <option value="1">{{trans('website.father')}}</option>
            <option value="2">{{trans('website.mother')}}</option>
            <option value="3">{{trans('اخري')}}</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-25">
            <label for="guardian_name">{{trans("website.guardian_name")}}</label>
            <input type="text" name="guardian_name[]" value="" placeholder='{{trans("website.guardian_name")}}' class="form-control">
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
                <div class="input__group mb-25">
                    <label>{{trans('website.guardian_email')}} <span class="text-danger">*</span></label>
            <input type="email" name="guardian_email[]" value="{{old('guardian_email')}}" placeholder="{{ trans('website.guardian_email') }}" class="form-control" />
            @if ($errors->has('guardian_email'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_email') }}</span>
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
        <input type="checkbox" name="followup_officer[]"  placeholder="{{ trans('website.followup_officer') }}" class="input__checkbox" />
        @if ($errors->has('followup_officer'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('followup_officer') }}</span>
        @endif
                </div>

            </div>

        </div>`);
            count++
        });
    </script>
    <script>
        $.ajax({
            type: 'GET',
            url: '{{url('/')}}/admin/student/getClasses/' + $('#level_id').val(),
            success: function (data) {
                $('#classroom').empty()
                $('#classroom').append(`<option value="">اختر فصل</option>`)
                data.forEach(function (e){
                    $('#classroom').append(`<option value="${e.id}" >${e.name}</option>`)
                    $('#classroom').val({{$student->class_room_id}})
                })
            }
        })

    </script>
    <script>
        $('#level_id').on('change', function() {

            $.ajax({
                type: 'GET',
                url: '{{url('/')}}/admin/student/getClasses/' + $(this).val(),
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
