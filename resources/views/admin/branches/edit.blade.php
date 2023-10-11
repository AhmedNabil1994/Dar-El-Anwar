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
                                    <h2>{{ trans('تعديل فرع') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ trans('تعديل فرع') }}</li>
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
                            <h2>{{ trans('تعديل فرع') }}</h2>
                        </div>
                        <form action="{{route('branches.update',$branch->id)}}" method="post" class="form-horizontal">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="input__group text-black">
                                        <label>{{ trans('اسم الفرع') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="branch_name" value="{{$branch->name}}" placeholder="{{ trans('website.typeSubjectName') }}"
                                               class="form-control" required>
                                        @if ($errors->has('branch_name'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('branch_name') }}</span>
                                        @endif
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

@endpush

@push('script')
    <script src="{{ asset('admin/js/custom/coupon-create.js') }}"></script>
@endpush
