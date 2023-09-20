@extends('layouts.admin')

@push('style')
    <style>
        /* Styling for the modal */
        .modal {
            display: none;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .modal2 {
            display: none;
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
    </style>
@endpush
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
                                <h2>{{ __('الصفحات') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('كل الصفحات') }}</li>
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
                            <h2>{{ __('الاشتراك') }}</h2>
                            <a id="openModalBtn" class="btn buttons-style btn-sm">
                                <i class="fa fa-plus"></i> {{ __('أضف صفحة') }}
                            </a>
                        </div>
                        <div>
                            <div class="customers__area bg-style mb-30">
                            <form method="get" action="{{ route('invoices.index') }}" class="row justify-content-start mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">اسم الطفل</label>
                                    <select class="form-select" name="child_name">
                                        <option value="">اختر اسم الطفل</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->name}}" {{$student->name == request('child_name') ? "selected": ""}}>{{$student->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">المرحلة</label>
                                    <input multiple class="form-control" name="subscription_name" value="{{request('subscription_name')}}" placeholder = "اختر المرحلة"/>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">الفصل</label>
                                    <select class="form-select" name="class">
                                        <option value="">اختر الفصل</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-center" style = "height:90px">
                                    <button class="btn buttons-style" type="submit">تم</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="customers__table" style = "overflow-x:auto">
                            <!-- <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped"> -->
                            <table class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>رقم الايصال</th>
                                    <th>التاريخ</th>
                                    <th>الاشتراك</th>
                                    <th>الدفعة عن شهر</th>
                                    <th>ملاحظات</th>
                                    <th>إجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($paidInvoices as $paidInvoice)
                                    <tr>
                                        <td>{{$paidInvoice->id}}</td>
                                        <td>{{\Carbon\Carbon::parse($paidInvoice->paid_at)->format('Y-m-d')}}</td>
                                        <td>{{$paidInvoice->subscription->subscription->name}}</td>
                                        <td>{{ \Carbon\Carbon::parse($paidInvoice->subscription->created_at)->format('F')}}</td>
                                        <td>
                                            {{ $paidInvoice->note}}
                                        </td>
                                        <td>
                                            <a href="{{route('invoices.print',$paidInvoice)}}" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button type="submit" class="btn-action delete"  title="{{ __('Delete') }}">
                                                <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ __('Delete') }}">
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal to display registered student names -->
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$paidInvoices->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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



@endpush
