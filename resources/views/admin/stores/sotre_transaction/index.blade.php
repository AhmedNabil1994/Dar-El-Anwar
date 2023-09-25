@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('أضف صفحة') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('كل الصفحات') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('أضف صفحة') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-md-3 ">
                    <a href="{{route('stores.movement.create')}}" class="form-control btn mb-3 " style = "background-color:#50bfa5">
                        <i class="fas fa-cash-register"></i>
                    </a>
                </div>
                <div class="col-md-12">
                <div class="customers__area bg-style mb-30">
                <form action="{{ route('stores.movement.index') }}" method="GET" class="form-group row justify-content-center">

                    <div class="form-group col-3">
                        <label for="movement_type">نوع الحركة:</label>
                        <select class="form-control" id="movement_type" name="movement_type">
                            <option value="">الكل</option>
                            <option value="expense" {{'expense' == request('movement_type')? "selected":''}}>صادر من مخزن لمخزن</option>
                            <option value="income" {{'income' == request('movement_type')? "selected":''}}>وارد من مخزن لمخزن</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="product_name">اسم الصنف:</label>
                        <select class="form-select" id="product_id" name="product_id" required>
                            <option value="">اختر الصنف</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}" {{$product->id == request('product_id')? "selected":''}}>{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 d-flex align-items-center flex-column justify-content-end">

                    <button type="submit" class="form-control btn" style = "background-color:#50bfa5">
                        <i class="fas fa-filter "></i>
                    </button>
                    </div>
                </form>
                </div>
                </div>

                <div class="col-md-12">
                <div class="customers__area bg-style mb-30">
                <form action="{{ route('stores.movement.index') }}" method="get" class="form-group row justify-content-center">
                    <div class="col-sm-2 m-3">
                        <label for="filterByJoining">{{trans("website.date_from")}}:</label>
                        <input type="date" class="form-control" name="dateFrom" value="{{request('dateFrom')}}" required>
                    </div>
                    <div class="col-sm-2 m-3">
                        <label for="filterByJoining">{{trans("website.date_to")}}:</label>
                        <input type="date" class="form-control" name="dateTo" value="{{request('dateTo')}}" required>
                    </div>
                    <div class="col-sm-2 m-3 d-flex align-items-center flex-column justify-content-end">
                        <button type="submit" class="form-control btn" style = "background-color:#50bfa5">
                            <i class="fas fa-filter "></i>
                        </button>
                    </div>
                </form>
            </div>
            </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="customers__area bg-style mb-30 ">
                    <div class="item-title d-flex justify-content-between align-items-end">
                            <h2>حركات المنتجات</h2>
                        </div>
                <div class="col-md-12 customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                    <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>رقم الإذن</th>
                            <th>نوع الحركة</th>
                            <th>اسم الصنف</th>
                            <th>الكمية</th>
                            <th>السعر</th>
                            <th>التاريخ والوقت</th>
                            <th>المورد</th>
                            <th>المستلم</th>
                            <th>الرصيد بعد الحركة</th>
                            <th>الرصيد الحالي</th>
                            <th>البيان</th>
                            <th>الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productMovements as $movement)
                            <tr>
                                <td>{{ $movement->permission_number }}</td>
                                <td>{{ $movement->movement_type }}</td>
                                <td>{{ $movement->product->name }}</td>
                                <td>{{ $movement->quantity }}</td>
                                <td>{{ $movement->price }}</td>
                                <td>{{ $movement->created_at }}</td>
                                <td>{{ $movement->supplier }}</td>
                                <td>{{ $movement->receiver }}</td>
                                <td>{{ $movement->balance_after_movement }}</td>
                                <td>{{ $movement->current_balance }}</td>
                                <td>{{ $movement->notes }}</td>
                                <td>
                                    <button data-url="{{route('stores.movement.delete',$movement->id)}}" type="submit" class="btn-action delete"  title="{{ __('Delete') }}">
                                        <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ __('Delete') }}">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$productMovements->links()}}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).on("click", "a.delete", function () {
            const selector = $(this);
            Swal.fire({
                title: 'Sure! You want to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete It!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: $(this).data("url"),
                        success: function (data) {
                            selector.closest('.removable-item').fadeOut('fast');
                            Swal.fire({
                                title: 'Deleted',
                                html: ' <span style="color:red">Item has been deleted</span> ',
                                timer: 2000,
                                icon: 'success'
                            })
                        }
                    })
                }
            })
        });
    </script>
@endpush
