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
                                <h2>{{ __('تعديل مستوي') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('لوحة التحكم')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('تعديل مستوي') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>


            {{--            @can('create-admins', 'admins')--}}

            <div class="row">
                <div class="customers__area bg-style mb-30">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <!-- <div class="ibox-title">
                            <h5>{{__('تعديل مستوي')}}</h5>
                        </div> -->
                        <div class="ibox-content mt-15">

                            <form method="post" action="{{route('level.update',$level)}}">
                                @csrf
                                <div class="row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="name">{{__('website.name')}}</label>

                                        <input type="text"
                                               class="form-control"
                                               id="name"
                                               name="name"
                                               value="{{$level->name}}"/>

                                        @error('name')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="name">{{__('website.status')}}</label>

                                        <input type="checkbox"
                                               class="form-check mt-2"
                                               id="status"
                                               name="status"
                                            {{$level->status == 1 ? 'checked':''}}
                                        />

                                        @error('status')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn buttons-style">{{__('website.edit')}}</button>
                                    <a href="{{route('level.index')}}" class="btn btn-secondary">{{__('website.cancel')}}</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            </div>
            {{--            @endcan--}}



        </div>
    </div>
    <!-- Page content area end -->
@endsection


