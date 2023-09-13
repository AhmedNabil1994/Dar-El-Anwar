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
                                <h2>{{ __('Admins') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('All Admins') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <h1> </h1>



{{--             {{dd(auth()->guard('admins')->user()->roles('manage-admins'))}}--}}
{{--                @if (auth()->guard('admins')->user()->hasPermissionTo('manage-admins'))--}}

{{--                <p>You have the "manage-admins" permission on the "web" guard</p>--}}
{{--                @endif--}}
{{--             --}}


{{--            </h1>--}}
{{--                @can('manage-admins', 'web')--}}
{{--            @endcan--}}

{{--            @can('manage-admins', 'admins')--}}
{{--            @endcan--}}


{{--        @can('manage-admins', 'admins')--}}

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.adminList') }}</h2>
                            <a href="{{ route('admins.create') }}" class="btn buttons-style btn-sm">
                                <i class="fa fa-plus"></i> {{ trans('website.addAdmin') }}
                            </a>
                        </div>

                        <div class="item-title d-flex justify-content-center">
                               <a href="{{ route('balances.openingBalanceForm') }}" class="btn buttons-style btn-sm">
                                <i class="fa fa-plus"></i> {{ trans('website.balances') }}
                            </a>
                        </div>

                        <div class="row mb-5">
                            <div class="col-sm-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-coins"></i> {{ $openingBalance ?? 0 }}
                            </div>

                            <div class="col-sm-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-arrow-up"></i> {{ $totalCredit }}
                            </div>

                            <div class="col-sm-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-arrow-down"></i> {{ $totalDebit }}
                            </div>

                            <div class="col-sm-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-chart-pie"></i> {{ $closingBalance ?? 0 }}
                            </div>

                            <div class="col-md-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-coins"></i> {{ $totalBalanceSoFar }}
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <a href="{{route('accounts.createIncomeTransaction')}}" class="btn btn-primary w-100" >قبض</a>
                            </div>

                            <div class="col-sm-2">
                                <a href="{{route('accounts.createExpenseTransaction')}}" class="btn btn-primary w-100" >صرف</a>
                            </div>

                            <div class="col-sm-2">
                                <a href="{{route('accounts.treasury',['fiterByType'=>'income'])}}" class="btn btn-primary w-100">تقارير الايرادات</a>
                            </div>

                            <div class="col-sm-2">
                                <a href="{{route('accounts.treasury',['fiterByType'=>'expense'])}}" class="btn btn-primary w-100">تقارير المصروفات</a>
                            </div>
                        </div>

                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>تاريخ</th>
                                    <th>رقم الحركة</th>
                                    <th>المبلغ</th>
                                    <th>اسم الجركة</th>
                                    <th>اسم الطفل</th>
                                    <th>دائن</th>
                                    <th>مدين</th>
                                    <th>رصيد الخزينة بعد الحركة</th>
                                    <th>المستخدم</th>
                                    <th>بيان</th>
                                    <th>فرع</th>
                                    <th>{{ __('اجارءات') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="removable-item">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$transaction->date}}</td>
                                        <td>{{$transaction->trans_no}}</td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>{{$transaction->name}}</td>
                                        <td>{{$transaction->student?->name}}</td>
                                        <td>{{$transaction->transaction_type == 'income' ? 'income':''}}</td>
                                        <td>{{$transaction->transaction_type== 'expense' ? 'expense':''}}</td>
                                        <td>{{$transaction->last_amount}}</td>
                                        <td>{{$transaction->user?->name}}</td>
                                        <td>{{$transaction->description}}</td>
                                        <td>{{$transaction->branch?->name}}</td>
                                        <td>
                                            <div class="action__buttons">
{{--                                                @can('edit-admins', 'admins')--}}

                                                <a href="{{ route('accounts.editIncomeTransaction', $transaction) }}" class=" btn-action mr-1 edit" data-toggle="tooltip" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
{{--                                                @endcan--}}

{{--                                                    @can('delete-admins', 'admins')--}}
                                            <form action="{{ route('accounts.delete',$transaction) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action delete"  title="{{ __('Delete') }}">
                                                    <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ __('Delete') }}">
                                                </button>
                                            </form
{{--                                                @endcan--}}

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$transactions->appends(request()->input())->links()}}
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

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/jquery.dataTables.min.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/data-table-page.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>




    </script>
    <!-- Ajax Search Script -->
    <script>
        $(function() {
            $('#searchForm input[name="search"]').on('keyup', function() {
                alert('hello');
                $.ajax({
                    url: '{{ route("admins.index") }}',
                    type: 'GET',
                    data: $('#searchForm').serialize(),
                    success: function(res) {
                        $('#admins-list').html(res);
                    },
                    error: function(jqXHR, status, error) {
                        // console.log(status + ": " + error);
                    }
                });
            });
        });
    </script>
@endpush
