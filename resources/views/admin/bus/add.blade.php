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
                                <h2>{{ trans('website.assignBus') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('website.assignBus') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                    <div class="item-title d-flex justify-content-between">
                        <h2>{{ trans('website.assignBus') }}</h2>
                    </div>
                    <form action="{{route('admin.bus.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="input__group mb-25">
                                    <label>{{trans('website.name')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="{{trans('website.busName')}}" class="form-control" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{ trans('website.code') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="code" value="{{old('code')}}" placeholder="{{ trans('website.code') }}" class="form-control"
                                           required>
                                    @if ($errors->has('code'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('code') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input__group mb-25">
                                    <label>{{trans('website.driver')}}</label>
                                    <select name="driver_id" id="driver_id" class="form-select">
                                        <option value="">{{trans('website.selectDriver')}}</option>
                                        @foreach($drivers as $driver)
                                            <option value="{{$driver->id}}" @if(old('driver_id'))
                                                {{old('driver_id') == $driver->id ? 'selected' : '' }}
                                                @endif >{{$driver->name}}</option>
                                        @endforeach
                                    </select>
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
@endpush
