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
                                <h2>{{__('Add User')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{__('All Users')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __($title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-horizontal__item bg-style">
                        <div class="item-top mb-30">
                            <h2>{{__('Add User')}}</h2>
                        </div>
                        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="custom-form-group mb-3 col-md-6">
                                    <label for="name" class="col-lg-3 text-lg-right text-black"> {{__('Name')}} </label>
                                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control flat-input" placeholder="{{__('Name')}}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="custom-form-group mb-3 col-md-6">
                                    <label for="email" class="text-lg-right text-black"> {{__('Email')}} </label>
                                    <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control flat-input" placeholder="{{__('Email')}}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="custom-form-group mb-3 col-md-6">
                                    <label for="phone_number" class="col-lg-3 text-lg-right text-black"> {{__('Phone')}} </label>
                                        <input type="text" name="phone" id="phone_number" value="{{old('phone')}}" class="form-control flat-input" placeholder="{{__('Phone')}}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone') }}</span>
                                        @endif
                                </div>

                                <div class="custom-form-group mb-3 col-md-6">
                                    <label for="user_name" class="col-lg-3 text-lg-right text-black"> {{__('User Name')}} </label>
                                        <input type="text" name="username" id="Username" value="{{old('user_name')}}" class="form-control flat-input" placeholder="{{__('User Name')}}">
                                        @if ($errors->has('user_name'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('user_name') }}</span>
                                        @endif
                                </div>


                            </div>
                            <div class="row">
                                <div class="custom-form-group mb-3 col-md-6">
                                    <label for="password" class="col-lg-3 text-lg-right text-black"> {{__('Password')}} </label>
                                        <input type="password" name="password" id="password" class="form-control flat-input" placeholder="{{__('Password')}}">
                                        @if ($errors->has('password'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password') }}</span>
                                        @endif
                                </div>
                                <!--  password confirm -->
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">{{__('Confirm Password')}}</label>
                                    <input type="password"
                                           class="form-control"
                                           id="password_confirmation"
                                           name="password_confirmation" />
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                             </div>
                            <div class="mb-3">
                                <div class="col-md-12 text-right">
                                    @saveWithAnotherButton
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
