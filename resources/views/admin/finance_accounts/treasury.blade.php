@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__content__left">
                                <div class="breadcrumb__title">
                                    <h2>{{ __('الخزينة') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a>
                                        </li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{trans('الخزينة') }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('الخزينة') }}</h2>
                            <button id="print" class="btn btn-secondary print-button"
                                    type="button">{{ trans('طباعة') }}</button>
                        </div>

                        <div class="row mb-5">
                            <div class="col-sm-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-money-bill"></i> {{ $openingBalance ?? 0 }}
                            </div>

                            <div class="col-sm-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-plus-circle"></i> {{ $totalCredit?? 0 }}
                            </div>

                            <div class="col-sm-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-minus-circle"></i> {{ $totalDebit ?? 0 }}
                            </div>

                            <div class="col-sm-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-balance-scale"></i> {{ $closingBalance ?? 0 }}
                            </div>

                            <div class="col-md-2 m-3">
                                <i class="fas fa-2xl mx-3 fa-coins"></i> {{ $totalBalanceSoFar }}
                            </div>

                        </div>

                        <div class="row justify-content-center mb-4">
                            <form method="get" action="{{route('accounts.treasury')}}" class="row">

                                <div class="col-sm-2 m-3">
                                    <label for="dateFrom">:{{ trans('website.date_from') }}</label>
                                    <input type="date" class="form-control" name="dateFrom" value="{{request('dateFrom')}}">
                                </div>
                                <div class="col-sm-2 m-3">
                                    <label for="dateTo">:{{ trans('website.date_to') }}</label>
                                    <input type="date" class="form-control" name="dateTo" value="{{request('dateTo')}}">
                                </div>
                                <div class="col-md-3 my-3 mb-3">
                                    <button id="btn_filter" class="btn buttons-style mt-4">{{trans("website.filter")}}</button>
                                </div>
                            </form>
                        </div>

                        <div class="row justify-content-center mb-4">
                            <div class="col-sm-2">
                                <a href="{{route('accounts.treasury',['subscription'=>true])}}" class="btn buttons-style w-100">الاشتراكات</a>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{route('accounts.treasury',['another'=>true])}}" class="btn buttons-style w-100">مبيعات المخزن والكانتين</a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{route('accounts.treasury',['book'=>true])}}" class="btn buttons-style w-100">مبيعات الكتب</a>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-4">

                            <div class="col-sm-2">
                                <a class="btn incomeBtn buttons-style w-100">قبض</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn expenseBtn buttons-style w-100">صرف</a>
                            </div>

                            <div class="col-sm-2">
                                <a href="{{route('accounts.treasury',['fiterByType'=>'income'])}}"
                                   class="btn buttons-style w-100">تقارير الايرادات</a>
                            </div>

                            <div class="col-sm-2">
                                <a href="{{route('accounts.treasury',['fiterByType'=>'expense'])}}"
                                   class="btn buttons-style w-100">تقارير المصروفات</a>
                            </div>
                        </div>

                        <div
                            class=" customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                            <table
                                class="print-table row-border data-table-filter table-style table table-bordered table-striped">
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
                                    <th>{{ __('إجراءات') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="removable-item">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{\Carbon\Carbon::parse($transaction->date)->format('Y/m/d h:i A')}}</td>
                                        <td>{{$transaction->trans_no}}</td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>{{$transaction->name}}</td>
                                        <td>{{$transaction->student?->name}}</td>
                                        <td>{{$transaction->transaction_type == 'income' ? 'دائن':''}}</td>
                                        <td>{{$transaction->transaction_type== 'expense' ? 'مدين':''}}</td>
                                        <td>{{$transaction->last_amount}}</td>
                                        <td>{{$transaction->user?->name}}</td>
                                        <td>{{$transaction->description}}</td>
                                        <td>{{$transaction->branch?->name}}</td>
                                        <td>
                                            <div class="action__buttons">

                                                <a href="{{ route('accounts.editIncomeTransaction', $transaction) }}"
                                                   class=" btn-action mr-1 edit" data-toggle="tooltip" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>

                                                <form action="{{ route('accounts.delete',$transaction) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action delete"
                                                            title="{{ __('Delete') }}">
                                                        <img src="{{ asset('admin/images/icons/trash-2.svg') }}"
                                                             alt="{{ __('Delete') }}">
                                                    </button>
                                                </form>

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

    <div id="incomeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('قبض')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('accounts.storeTransaction') }}" method="POST">
                        @csrf
                        <input type="hidden" name="transaction_type" value="income">
                        <div class="form-group">
                            <label for="date">التاريخ:</label>
                            <input type="datetime-local" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">اسم الحركة:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="amount">المبلغ:</label>
                            <input type="number" name="amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">البيان:</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn mx-3 buttons-style">حفظ</button>

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">@lang('الغاء')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div id="expenseModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('صرف')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('accounts.storeTransaction') }}" method="POST">
                        @csrf
                        <input type="hidden" name="transaction_type" value="expense">
                        <div class="form-group">
                            <label for="date">التاريخ:</label>
                            <input type="datetime-local" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">اسم الحركة:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="amount">المبلغ:</label>
                            <input type="number" name="amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">البيان:</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn mx-3 buttons-style">حفظ</button>

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">@lang('الغاء')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/jquery.dataTables.min.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/data-table-page.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('admin/js/jasonday-printThis-23be1f8/printThis.js')}}"></script>
    <!-- Ajax Search Script -->
    <script>
        $(function () {
            $('#searchForm input[name="search"]').on('keyup', function () {
                alert('hello');
                $.ajax({
                    url: '{{ route("admins.index") }}',
                    type: 'GET',
                    data: $('#searchForm').serialize(),
                    success: function (res) {
                        $('#admins-list').html(res);
                    },
                    error: function (jqXHR, status, error) {
                        // console.log(status + ": " + error);
                    }
                });
            });
        });
    </script>
    <!-- Printing -->
    <script>
        $(document).ready(function () {
            $("#print").on("click", function printDiv() {
                console.log("clicked")
                $(".print-table").printThis({
                    importStyle: true,
                    loadCSS: "./main.css",
                })
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            "use strict";
            $('.incomeBtn').on('click', function () {
                var modal = $('#incomeModal');

                modal.modal('show');
            });
            $('.expenseBtn').on('click', function () {
                var modal = $('#expenseModal');

                modal.modal('show');
            });
        });
    </script>
@endpush
