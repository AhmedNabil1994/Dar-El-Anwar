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
                                <h2>{{ __('Add ParentInfo') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add ParentInfo') }}</li>
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
                            <h2>{{ __('Add ParentInfo') }}</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('parent_infos.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __('Father Name') }} <span class="required-star">*</span></label>

                                    <div class="col-md-6">
                                        <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" >

                                        @error('father_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--Select from All Students -->



                                <div class="form-group row">
                                    <label for="father_occupation" class="col-md-4 col-form-label text-md-right">{{ __('Father Occupation') }} <span class="required-star">*</span></label>

                                    <div class="col-md-6">
                                        <input id="father_occupation" type="text" class="form-control @error('father_occupation') is-invalid @enderror" name="father_occupation" value="{{ old('father_occupation') }}" />

                                        @error('father_occupation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="father_national_id" class="col-md-4 col-form-label text-md-right">{{ __('Father National ID') }} <span class="required-star">*</span></label>

                                    <div class="col-md-6">
                                        <input id="father_national_id" type="text" class="form-control @error('father_national_id') is-invalid @enderror" name="father_national_id" value="{{ old('father_national_id') }}" />

                                        @error('father_national_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="father_phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Father Phone Number') }} <span class="required-star">*</span></label>

                                    <div class="col-md-6">
                                        <input id="father_phone_number" type="text" class="form-control @error('father_phone_number') is-invalid @enderror" name="father_phone_number" value="{{ old('father_phone_number') }}" />

                                        @error('father_phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="father_whatsapp_number" class="col-md-4 col-form-label text-md-right">{{ __('Father Whatsapp Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="father_whatsapp_number" type="text" class="form-control
                                         @error('father_whatsapp_number') is-invalid
                                         @enderror" name="father_whatsapp_number"
                                               value="{{ old('father_whatsapp_number') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mother_name" class="col-md-4 col-form-label text-md-right">{{ __('Mother Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}"  autocomplete="mother_name" autofocus>

                                        @error('mother_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mother_occupation" class="col-md-4 col-form-label text-md-right">{{ __('Mother Occupation') }}</label>

                                    <div class="col-md-6">
                                        <input id="mother_occupation" type="text" class="form-control @error('mother_occupation') is-invalid @enderror" name="mother_occupation" value="{{ old('mother_occupation') }}"  autocomplete="mother_occupation" autofocus>

                                        @error('mother_occupation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mother_national_id" class="col-md-4 col-form-label text-md-right">{{ __('Mother National ID') }}</label>

                                    <div class="col-md-6">
                                        <input id="mother_national_id" type="text" class="form-control @error('mother_national_id') is-invalid @enderror" name="mother_national_id" value="{{ old('mother_national_id') }}"  autocomplete="mother_national_id" autofocus>

                                        @error('mother_national_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mother_phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Mother Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="mother_phone_number" type="text" class="form-control @error('mother_phone_number') is-invalid @enderror" name="mother_phone_number" value="{{ old('mother_phone_number') }}"  autocomplete="mother_phone_number" autofocus>

                                        @error('mother_phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mother_whatsapp_number" class="col-md-4 col-form-label text-md-right">{{ __('Mother Whatsapp Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="mother_whatsapp_number" type="text" class="form-control
                                            @error('mother_whatsapp_number') is-invalid
                                            @enderror" name="mother_whatsapp_number"
                                                value="{{ old('mother_whatsapp_number') }}">
                                        @error('mother_whatsapp_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="follow_up_person" class="col-md-4 col-form-label text-md-right">{{ __('Follow Up Person') }}</label>

                                    <div class="col-md-6">
                                        <input id="follow_up_person" type="text" class="form-control @error('follow_up_person') is-invalid @enderror" name="follow_up_person" value="{{ old('follow_up_person') }}" autocomplete="off">

                                        @error('follow_up_person')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="follow_up_name" class="col-md-4 col-form-label text-md-right">{{ __('Follow Up Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="follow_up_name" type="text" class="form-control @error('follow_up_name') is-invalid @enderror" name="follow_up_name" value="{{ old('follow_up_name') }}" autocomplete="off">

                                        @error('follow_up_name')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="follow_up_relationship" class="col-md-4 col-form-label text-md-right">{{ __('Follow Up Relationship') }}</label>

                                    <div class="col-md-6">
                                        <input id="follow_up_relationship" type="text" class="form-control @error('follow_up_relationship') is-invalid @enderror" name="follow_up_relationship" value="{{ old('follow_up_relationship') }}" autocomplete="off">

                                        @error('follow_up_relationship')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="follow_up_phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Follow Up Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="follow_up_phone_number" type="text" class="form-control @error('follow_up_phone_number') is-invalid @enderror" name="follow_up_phone_number" value="{{ old('follow_up_phone_number') }}" autocomplete="off">

                                        @error('follow_up_phone_number')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="follow_up_whatsapp_number" class="col-md-4 col-form-label text-md-right">{{ __('Follow Up Whatsapp Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="follow_up_whatsapp_number" type="text" class="form-control @error('follow_up_whatsapp_number') is-invalid @enderror" name="follow_up_whatsapp_number" value="{{ old('follow_up_whatsapp_number') }}" autocomplete="off">

                                        @error('follow_up_whatsapp_number')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="student_pickup_optional" class="col-md-4 col-form-label text-md-right">{{ __('Student Pickup Optional') }}</label>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="student_pickup_optional" name="student_pickup_optional" {{ old('student_pickup_optional') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="student_pickup_optional">{{ __('Yes, student pickup is optional') }}</label>
                                            </div>
                                            @error('student_pickup_optional')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="parents_marital_status" class="col-md-4 col-form-label text-md-right">{{ __('Parents Marital Status') }}</label>
                                        <div class="col-md-6">
                                            <select id="parents_marital_status" class="form-control @error('parents_marital_status') is-invalid @enderror" name="parents_marital_status"  autocomplete="parents_marital_status">
                                                <option value="" disabled selected>{{ __('Select an option') }}</option>
                                                <option value="Married" {{ old('parents_marital_status') == 'Married' ? 'selected' : '' }}>{{ __('Married') }}</option>
                                                <option value="Divorced" {{ old('parents_marital_status') == 'Divorced' ? 'selected' : '' }}>{{ __('Divorced') }}</option>
                                                <option value="Widowed" {{ old('parents_marital_status') == 'Widowed' ? 'selected' : '' }}>{{ __('Widowed') }}</option>
                                            </select>

                                            @error('parents_marital_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="parents_id_card" class="col-md-4 col-form-label text-md-right">{{ __('Parents ID Card') }}</label>
                                        <div class="col-md-6">
                                            <input id="parents_id_card" type="text" class="form-control @error('parents_id_card') is-invalid @enderror" name="parents_id_card" value="{{ old('parents_id_card') }}" autocomplete="parents_id_card">

                                            @error('parents_id_card')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="button-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
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
