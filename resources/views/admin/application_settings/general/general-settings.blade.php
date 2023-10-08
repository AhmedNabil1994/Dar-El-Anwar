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
                                <h2>{{ __('الاعدادت') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('لوحة التحكم')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __(@$title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('admin.application_settings.sidebar')
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="email-inbox__area bg-style form-horizontal__item bg-style admin-general-settings-page">
                        <div class="item-top mb-30"><h2>{{ __(@$title) }}</h2></div>
                        <form action="{{route('settings.general_setting.cms.update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="row input__group mb-25">
                                <label class="col-lg-3">{{__('اسم الموقع')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="app_name" value="{{get_option('app_name')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row input__group mb-25">
                                <label class="col-lg-3">{{ __('الايميل') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="app_email" value="{{get_option('app_email')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row input__group mb-25">
                                <label class="col-lg-3">{{ __('رقم التواصل') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="app_contact_number" value="{{get_option('app_contact_number')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row input__group mb-25">
                                <label class="col-lg-3">{{ __('العنوان') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="app_location" value="{{get_option('app_location')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row input__group mb-25">
                                <label class="col-lg-3">{{ __('حقوق الموقع') }} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="app_copyright" value="{{get_option('app_copyright')}}" class="form-control" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="input__group general-settings-btn">
                                        <button type="submit" class="btn btn-blue float-right">{{__('تحديث')}}</button>
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
@endpush
