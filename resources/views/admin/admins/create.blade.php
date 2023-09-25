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
                                <h2>{{ __('اضف مسئول') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('اضف مسئولs') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


{{--            @can('create-admins', 'admins')--}}

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        @can('add-admin')
                        <div class="ibox-title">
                            <h5>{{__('اضافة مسئول')}}</h5>
                        </div>
                        @endcan
                        <div class="ibox-content mt-15">

                            <form method="post" action="{{route('admins.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="name">{{__('website.name')}}</label>

                                        <input type="text"
                                               class="form-control"
                                               id="name"
                                               name="name" />

                                        @error('name')
                                            <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">

                                        <label for="email">{{__('الايميل')}}</label>
                                        <input type="email"
                                               class="form-control"
                                               id="email"
                                               name="email" />
                                        @error('email')
                                            <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="username">{{__('website.username')}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="username"
                                               name="username" />
                                        @error('username')
                                            <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">{{__('website.phone_number')}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="phone"
                                               name="phone" />
                                        @error('phone')
                                            <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mt-5">
                                        <label for="role">{{__('المجموعة')}}</label>
                                        <select type="text"
                                               class="form-control"
                                               id="role"
                                               name="role" >
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('role')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="password">{{__('website.password')}}</label>
                                        <input type="password"
                                               class="form-control"
                                               id="password"
                                               name="password" />
                                        @error('password')
                                            <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                            <!--  password confirm -->
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">{{__('website.confirmPassword')}}</label>
                                        <input type="password"
                                               class="form-control"
                                               id="password_confirmation"
                                               name="password_confirmation" />
                                         @error('password_confirmation')
                                            <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn buttons-style">{{__('website.save')}}</button>
                                    <a href="{{route('admins.index')}}" class="btn btn-secondary">{{__('website.cancel')}}</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
{{--            @endcan--}}



        </div>
    </div>
    <!-- Page content area end -->
@endsection


