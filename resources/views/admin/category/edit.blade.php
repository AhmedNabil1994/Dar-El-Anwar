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
                                <h2>{{ trans('website.editCategory') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ trans('website.dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">{{ trans('website.categories') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans("website.editCategory") }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-vertical__item bg-style">
                        <div class="item-top mb-30">
                            <h2>{{trans('website.editCategory')}}</h2>
                        </div>
                        <form action="{{route('category.update', [$category->uuid])}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="input__group mb-25">
                                <label for="name"> {{trans('website.name')}} </label>
                                <div>
                                    <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control flat-input" placeholder=" {{trans('website.name')}} ">
                                    @if ($errors->has('name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="input__group mb-25">
                                <label for="is_feature"> {{trans('website.feature')}} </label>
                                <div>
                                    <label class="text-black"> <input type="checkbox" name="is_feature" id="is_feature" value="yes" {{$category->is_feature == 'yes' ? 'checked' : '' }} > {{ trans('website.yes') }} </label>
                                </div>
                            </div>

                            <div class="custom-form-group mb-25 ">
                                <label for="image" class="text-lg-right text-black mb-2"> {{trans('website.image')}} </label>
                                <div class="upload-img-box mb-25">
                                    @if($category->getImg())
                                        <img src="{{asset($category->getImg())}}">
                                    @else
                                        <img src="">
                                    @endif
                                    <input type="file" name="image" id="image" accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="fa fa-camera"></i>
                                        <p class="m-0">{{trans('website.image')}}</p>
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                @endif
                                <p>{{ __('Accepted Image Files') }}: PNG <br> {{ __('Recommend Size') }}: 60 x 60 (1MB)</p>
                            </div>

                            <div class="input__group">
                                <div>
                                    @updateButton
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

