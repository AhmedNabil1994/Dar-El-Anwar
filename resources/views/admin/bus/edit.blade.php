@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="customers__area__header bg-style mb-30">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('تعديل الحافلة') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('تعديل الحافلة') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="customers__area bg-style mb-30">
                <div class="col-md-12">
                    <div class="item-title d-flex justify-content-between">
                        <h2>{{ __('تعديل االحافلة') }}</h2>
                    </div>
                    <form action="{{route('admin.bus.update', $bus->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="input__group mb-25">
                                    <label>{{__('الاسم')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{$bus->name}}" placeholder="{{__('اسم الحافلة')}}" class="form-control" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{ __('الكود') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="code" value="{{$bus->code}}" placeholder="{{ __('Code') }}" class="form-control"
                                           required>
                                    @if ($errors->has('code'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('code') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{__('السائق')}}</label>
                                    <select name="driver_id" id="driver_id" class="form-select">
                                        <option value="">{{__('Select Driver')}}</option>
                                        @foreach($drivers as $driver)
                                            <option value="{{$driver->id}}" @if($bus->driver_id)
                                                {{$bus->driver_id == $driver->id ? 'selected' : '' }}
                                                @endif >{{$driver->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <button class="btn buttons-style" type="submit">{{ __('حفظ') }}</button>
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
@endpush
