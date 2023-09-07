
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
                                <h2>{{ __('Edit Admin') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">{{ __('All Admins') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Admin') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-title d-flex justify-content-center">
                <a href="{{ route('balances.createOpeningBalance') }}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> {{ __('Add Balance') }}
                </a>
            </div>

            <div class="col-md-12">
                <h1>Opening Balances</h1>
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Date</th>
                        <th>Opening Balance</th>
                        <th>Closing Balance</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($openingBalances as $balance)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $balance->date }}</td>
                            <td>{{ $balance->opening_balance }}</td>
                            <td>{{ $balance->closing_balance }}</td>
                            <td class="d-flex justify-content-around">
                                <!-- Add action buttons or links here -->
                                <a href="{{ route('balances.editOpeningBalance', $balance) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('balances.deleteOpeningBalance', $balance) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-delete-left"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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

    <script>




    </script>
    <!-- //Summernote JS - CDN Link -->
@endpush
