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
                                <h2>{{__($title)}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('لوحة التحكم')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __($title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="form-horizontal__item bg-style">
                <div class="col-md-12">
                        <div class="item-top mb-30">
                            <h2>{{__($title)}}</h2>
                        </div>
                        <form action="{{route('role.update', [$role->id])}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="custom-form-group mb-3 row">
                                <label for="name" class="col-lg-3 text-lg-right text-black"> {{__('الدور')}} </label>
                                <div class="col-lg-9">
                                    <select class="form-select" name="role_id">
                                        <option value="">اختر المجموعة الرئيسية</option>
                                        @foreach($roles as $role_item)
                                            <option value="{{$role_item->id}}"
                                            {{$role->role_parent_id == $role_item->id ? 'selected' : ''}}
                                            >{{$role_item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="custom-form-group mb-3 row">
                                <label for="name" class="col-lg-3 text-lg-right text-black"> {{__('website.name')}} </label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" id="name" value="{{$role->name}}" class="form-control flat-input" placeholder="{{__('website.name')}}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="custom-form-group mb-3 row">
                                <label for="name" class="col-lg-3 text-lg-right text-black"> {{__('اختر الصلاحية')}} </label>
                                <div class="col-lg-9">
                                    <div class="row text-black">
                                        @foreach($permissions as $permission)
                                            <div class="col-md-4 mb-2">
                                                <div class="form-check mb-0 d-flex align-items-center">
                                                    <input class="form-check-input mx-3" type="checkbox" name="permissions[]" id="permission{{$permission->id}}" value="{{$permission->id}}" @if(in_array($permission->id, $selected_permissions)) checked @endif >
                                                    <label class="form-check-label m-lg-1 mb-0 color-heading" for="permission{{$permission->id}}">@lang('website.'.ucwords(str_ireplace(["-","_"], " ", $permission->name))) </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('permissions'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('permissions') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
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


