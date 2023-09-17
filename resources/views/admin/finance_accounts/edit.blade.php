
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
                                <h2>{{ __('تحرير المشرف') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">{{ __('كل المشرفين') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('تحرير المشرف') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-md-12">
                    <div class="form-wrapper">
                            <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                            @csrf
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="name">@lang('Admin Name')</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           id="name"
                                           value="{{ old('name', $admin->name) }}" />
                                    @error('name')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">@lang('Email Address')</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           id="email"
                                           value="{{ old('email', $admin->email) }}" />
                                    @error('email')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="username">@lang('Username')</label>
                                    <input type="text"
                                           name="username"
                                           class="form-control"
                                           id="username"
                                           value="{{ old('username', $admin->username) }}" />
                                    @error('username')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">@lang('Phone Number')</label>
                                    <input type="text"
                                           name="phone"
                                           class="form-control"
                                           id="phone"
                                           value="{{ old('phone', $admin->phone) }}" />
                                    @error('phone')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 mt-5">
                                    <label for="role">{{__('Role')}}</label>
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



                            <button type="submit" class="btn btn-primary">@lang('Update')</button>
                            <a href="{{ route('admins.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-wrapper">
                            <form method="POST" action="{{ route('admins.update.password', $admin->id) }}">
                    <div class="row mb-4">
                        <div class="form-group col-md-6">
                            <label for="password">@lang('Password')</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   id="password">
                        </div>
                        <!--  password confirm -->
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">@lang('Confirm Password')</label>
                            <input type="password"
                                   class="form-control"
                                   id="password_confirmation"
                                   name="password_confirmation" />
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                    <a href="{{ route('admins.index') }}" class="btn btn-secondary">@lang('Cancel')</a>


            </form>
                </div>

        </div>


        </div>

    <!-- Page content area end -->
@endsection

@push('style')
    <!-- Summernote CSS - CDN Link -->
    <link href="{{ asset('common/css/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('common/css/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/slug.js')}}"></script>
    <script src="{{asset('admin/js/custom/form-editor.js')}}"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({dialogsInBody: true});
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
@endpush
