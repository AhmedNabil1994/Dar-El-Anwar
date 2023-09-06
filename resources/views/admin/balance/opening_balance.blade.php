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
                                <h2>{{ __('Add Admin') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">{{ __('All Admins') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Admins') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header text-dark">Enter Opening Balance</div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('balances.storeOpeningBalance') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="date">Date:</label>
                                            <input type="date" name="date" id="date" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="opening_balance">Opening Balance:</label>
                                            <input type="number" name="opening_balance" id="opening_balance" class="form-control" step="0.01" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- Page content area end -->
@endsection


