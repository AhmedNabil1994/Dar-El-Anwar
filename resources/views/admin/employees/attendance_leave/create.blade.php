@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Add Employees') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Employees') }}</li>
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
                            <h2>{{ __('Add Salary Employees') }}</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('attendance_leave.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="employee_id" class="col-md-4 col-form-label text-md-right">{{ __('Employee') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <select  id="employee_id" type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id"  autocomplete="employee_id">
                                            <option value="">Select Employee</option>
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
                                <div class="form-group row">
                                    <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="start_date" type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" name="start_date"   autocomplete="start_date">
                                        @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="end_date" type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" name="end_date"   autocomplete="end_date">
                                        @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Salary Cycle') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <select id="status" class="form-control @error('status') is-invalid @enderror"
                                                name="status"  autocomplete="status" required>
                                            <option value="">{{ __('Select Status') }}</option>
                                            <option value="attend">{{ __('Attend') }}</option>
                                            <option value="leave" >{{ __('Leave') }}</option>
                                            </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reason" class="col-md-4 col-form-label text-md-right">{{ __('Reason') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6">
                                        <input required id="reason" type="text" class="form-control @error('reason') is-invalid @enderror" name="reason"   autocomplete="reason">
                                        @error('reason')
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
