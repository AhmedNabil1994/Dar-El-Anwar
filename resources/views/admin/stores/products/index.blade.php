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
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                    <form method="GET" action="{{ route('stores.product.index') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="product_id">اسم المنتج:</label>
                                    <select class="form-control" id="product_id" name="product_id">
                                        <option value="">الكل</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                        <!-- Add more options for categories -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="department_id">القسم:</label>
                                    <select class="form-control" id="department_id" name="department_id">
                                        <option value="">الكل</option>
                                        @foreach($departs as $depart)
                                            <option value="{{$depart->id}}">{{$depart->name}}</option>
                                        @endforeach
                                        <!-- Add more options for categories -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn buttons-style">
                                    <i class="fa fa-filter"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                    <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between align-items-end">
                            <h2>تقارير المنتجات</h2>
                        </div>
                    <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                            <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>كود المنتج</th>
                            <th>القسم</th>
                            <th>مسمى الوحدة</th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>وصف المنتج</th>
                            <th>المورد</th>
                            <th>المستلم</th>
                            <th>أخر سعر بيع</th>
                            <th>أخر سعر شراء</th>
                            <th>الرصيد الحالي</th>
                            <th>الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productReports as $report)
                            <tr class="removable-item">
                                <td>{{ $report->sku }}</td>
                                <td>{{ $report->department?->name }}</td>
                                <td>{{ $report->unit }}</td>
                                <td>{{ $report->price }}</td>
                                <td>{{ $report->quantity }}</td>
                                <td>{{ $report->description }}</td>
                                <td>{{ $report->transactions->first()?->supplier }}</td>
                                <td>{{ $report->transactions->first()?->receiver }}</td>
                                <td>{{ $report->last_sell_price }}</td>
                                <td>{{ $report->last_purchase_price }}</td>
                                <td>{{ $report->current_balance }}</td>
                                <td>
                                <div class="action__buttons">
                                        <a href="{{ route('stores.product.edit', $report) }}" class=" btn-action mr-1 edit" data-toggle="tooltip" title="Edit">
                                            <i class="fa text-info fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-url="{{route('stores.product.delete', $report)}}" class="btn-action delete" title="Delete">
                                            <i class="fa text-danger fa-trash"></i>
                                        </a>

                                </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
                <div class="row">
                    {{$productReports->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
