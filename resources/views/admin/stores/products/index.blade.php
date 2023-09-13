@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Add Page') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('All Pages') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Page') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>تقارير المنتجات</h2>

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
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-filter"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered">
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productReports as $report)
                            <tr>
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$productReports->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
