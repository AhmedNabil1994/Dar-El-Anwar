
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
                                <h2>{{ __('تحرير') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">{{trans('website.allAdmins') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('تحرير مشرف') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-title d-flex justify-content-center">
                <form class="row justify-content-center w-100" action="{{route('profit.index')}}" method="get">
                    <div class="col-md-3">
                        <label class="form-label">الفرع</label>
                        <select name="branch_id" class="form-select">
                            <option value="">اختر الفرع</option>
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}" {{$branch->id == request('branch_id')?'selected':''}}>{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">التاريح من</label>
                        <input type="date" name="date_from" class="form-control" value="{{request('date_from')}}"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">التاريح الي</label>
                        <input type="date" name="date_to" class="form-control" value="{{request('date_to')}}"/>
                    </div>
                    <div class="col-sm-1 d-flex justify-content-center">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                <h1>صافي الربح</h1>
                <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                            <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>رقم الحركة</th>
                        <th>التاريخ</th>
                        <th>الوقت</th>
                        <th>المستخدم</th>
                        <th>المبلغ</th>
                        <th>الحساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expense_transactions as $transaction)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->trans_no }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaction->date)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaction->date)->format('h:m:s') }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->account }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-md-3">
                    <label class="form-label">الايرادات</label>
                    <input disabled class="form-control" value="{{$incomes}}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">صافي الربح</label>
                    <input disabled class="form-control" value="{{$profit}}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">المصروفات</label>
                    <input disabled class="form-control" value="{{$expenses}}">
                </div>
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
