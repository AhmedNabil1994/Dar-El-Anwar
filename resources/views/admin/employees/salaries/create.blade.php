@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('اضافة راتب') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('اضافة راتب') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ __('اضافة راتب لموظف') }}</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('salaries.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="employee_id" class="col-md-4 col-form-label text-md-right">{{ __('موظف') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <select  id="employee_id" type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id"  autocomplete="employee_id">
                                            <option value="">اختر معلم</option>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('employee_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('راتب') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary', $employee?->salary) }}"  autocomplete="salary">
                                        @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="button-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
