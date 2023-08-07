
@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{trans('website.dashboard') }} </h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{ get_option('app_name') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.dashboard') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/students.png" alt="total students">
                        </div>
                        <div class="status__box__text">

                        <a href="">
                            <h1 class="color-purple">{{ $total_admins }}</h1>
                            <h2>{{ trans('website.total_students') }}</h2>
                        </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/instructors.png" alt="total instructors">
                        </div>
                        <div class="status__box__text">
                            <a href="">
                                <h1 class="color-purple">{{ $total_instructors }}</h1>
                                <h2>{{ trans('website.total_instructors') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/add-student.png" alt="students per month">
                        </div>
                        <div class="status__box__text">
                            <a href="">
                                <h1 class="color-blue">{{ $total_students }}</h1>
                                <h2>{{ trans('website.new_students_month') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/remove-student.png" alt="rejected students">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-green">{{ $total_courses }}</h1>
                                <h2>{{ trans('website.rejected') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">

                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/instructors.png" alt="instructors">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-blue">{{ $total_active_courses }}</h1>
                                <h2>{{ trans('website.total_instructors') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/courses.png" alt="courses">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-purple">{{ $total_pending_courses }}</h1>
                                <h2>{{ trans('website.courses') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/best-courses.png" alt="best-courses">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-purple">{{ $total_free_courses }}</h1>
                                <h2>{{ trans('website.best_courses') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/students_trans.png" alt="students transactions">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-green">{{ $total_paid_courses }}</h1>
                                <h2>{{ trans('website.students_trans') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/bank.png" alt="banking">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-red">{{ $total_lessons }}</h1>
                                <h2>{{ trans('website.balance') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/book-money.png" alt="book-money">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-red">{{ $total_lectures }}</h1>
                                <h2>{{ trans('website.sales_books_things') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/revenue.png" alt="total income">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-yellow">{{ $total_blogs }}</h1>
                                <h2>{{ trans('website.total_income') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/absent.png" alt="revenue">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-yellow">{{ $total_blogs }}</h1>
                                <h2>{{ trans('website.absent_students') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/calendar.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-yellow">{{ $total_blogs }}</h1>
                                <h2>{{ trans('website.calendar') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/analytics.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <a href="#">
                                <h1 class="color-yellow">{{ $total_blogs }}</h1>
                                <h2>{{ trans('website.students_rate') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/save-money.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-green">

                                @if(get_currency_placement() == 'after')
                                    {{ $total_paid_sales }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_paid_sales }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Paid Sales') }}</h3>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/paying.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-red">{{ $total_free_sales }}</h2>
                            <h3>{{ __('Total Free Sales') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="images/admin-dashboard-icons/commission-1.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-purple">

                                @if(get_currency_placement() == 'after')
                                    {{ $total_platform_charge }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_platform_charge }}
                                @endif
                            </h2>
                            <h3>{{ __('Total Platform Charge') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="images/admin-dashboard-icons/money-loss.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_platform_charge_this_month }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_platform_charge_this_month }}
                                @endif

                            </h2>
                            <h3>{{ __('Total Platform Charge (Current Month)') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/discount.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-purple">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_admin_commission }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_admin_commission }}
                                @endif

                            </h2>
                            <h3>{{ __('Total Sell Commission') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/shop.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-red">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_admin_commission_this_month }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_admin_commission_this_month }}
                                @endif</h2>
                            <h3>{{ __('Total Sell Commission (Current Month)') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/money.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue"> @if(get_currency_placement() == 'after')
                                    {{ $total_revenue }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_revenue }}
                                @endif</h2>
                            <h3>{{ __('Total Revenue') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/economy.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-yellow">
                                @if(get_currency_placement() == 'after')
                                    {{ $total_new_withdraws }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_new_withdraws }}
                                @endif
                                </h2>
                            <h3>{{ __('Total Request Withdraw') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/save-money.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-green"> @if(get_currency_placement() == 'after')
                                    {{ $total_complete_withdraws }} {{ get_currency_symbol() }}
                                @else
                                    {{ get_currency_symbol() }} {{ $total_complete_withdraws }}
                                @endif</h2>
                            <h3>{{ __('Total Complete Withdraw') }}</h3>
                        </div>
                    </div>
                </div> -->
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="revenue__chart-v2__area bg-style">
                        <div class="revenue__chart-v2__top">
                            <div class="revenue__chart-v2__top__left">
                                <div class="content-title">
                                    <h2>{{ __('Enrollment') }}</h2>
                                </div>
                            </div>
                            <div class="revenue__chart-v2__top__right">
                                <div class="revenue__chart-v2__list">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab"
                                                    aria-controls="nav-two" aria-selected="false">
                                                {{ __('Month') }}
                                            </button>
                                            <button class="nav-link active" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab"
                                                    aria-controls="nav-three" aria-selected="false">
                                                {{ __('Year') }}
                                            </button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="total-profit">
                            <h2>
                                {{ __('Total Enrollment') }} <span>{{ $total_enrolments }}</span>
                            </h2>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                                <div id="chartMonth"></div>
                            </div>
                            <div class="tab-pane fade show active" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                                <div id="chartYear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <div class="sales-location__area bg-style">
                        <div class="sales-location__title">
                            <h2>{{ __('Top Seller') }}</h2>
                        </div>
                        <div class="sales-location__map">
                            <div id="topSellerChart" ></div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="row">
                <div class="col-md-6">
                    <div class="top-products__area bg-style">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h2>{{ __('Top Courses') }}</h2>
                            <a href="{{ route('admin.course.index') }}"><button class="btn bg-primary">{{ __('View All') }}</button></a>
                        </div>
                        <div class="top-products__table">
                            <table class="table-style">
                                <thead>
                                <tr>
                                    <th>{{ __('Course') }}</th>
                                    <th>{{ __('Instructor Name') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Total') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($total_ten_courses as $course)
                                    <tr>
                                        <td><a href="{{ route('admin.course.view', $course->uuid) }}">{{ Str::limit($course->title, 90) }}</a></td>
                                        <td>{{ @$course->instructor->name }}</td>
                                        <td>{{ $course->price }}</td>
                                        <td>{{ $course->totalOrder }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="top-products__area bg-style">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h2>{{ __('Requested Withdrawal') }}</h2>
                            <a href="{{ route('payout.new-withdraw') }}"><button class="btn bg-primary">{{ __('View All') }}</button></a>
                        </div>
                        <div class="top-products__table">
                            <table class="table-style">
                                <thead>
                                <tr>
                                    <th>{{__('Instructor')}}</th>
                                    <th>{{__('Payment Method')}}</th>
                                    <th>{{__('Request Date')}}</th>
                                    <th>{{__('Amount')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($withdraws as $withdraw)
                                    <tr>
                                        <td>
                                            <div class="finance-table-inner-item my-2">
                                                <span class="fw-bold mr-1">{{__('Name')}}</span>: {{$withdraw->user->instructor->name}}
                                            </div>
                                            <div class="finance-table-inner-item my-2">
                                                <span class="fw-bold mr-1">{{__('Phone')}}</span>: {{$withdraw->user->instructor->phone_number}}
                                            </div>
                                        </td>
                                        <td>@if($withdraw->payment_method == 'paypal')
                                                <div class="finance-table-inner-item my-2">
                                                    <span class="fw-bold mr-1">{{__('Payment Method')}}</span>: PayPal
                                                </div>
                                                <div class="finance-table-inner-item my-2">
                                                    <span class="fw-bold mr-1">{{__('Email')}}</span>: {{$withdraw->user->paypal ? $withdraw->user->paypal->email : '' }}
                                                </div>
                                            @endif

                                            @if($withdraw->payment_method == 'card')
                                                <div class="finance-table-inner-item my-2">
                                                    <span class="fw-bold mr-1">{{__('Payment Method')}}</span>: Card
                                                </div>
                                                @if($withdraw->user->card)
                                                    <div class="finance-table-inner-item my-2">
                                                        <span class="fw-bold mr-1">{{__('Card Number')}}</span>: {{$withdraw->user->card->card_number }}
                                                    </div>
                                                    <div class="finance-table-inner-item my-2">
                                                        <span class="fw-bold mr-1">{{__('Car Holder')}}</span>: {{$withdraw->user->card->card_holder_name }}
                                                    </div>
                                                    <div class="finance-table-inner-item my-2">
                                                        <span class="fw-bold mr-1">{{__('Date')}}</span>: {{$withdraw->user->card->month }}/{{$withdraw->user->card->year }}
                                                    </div>
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{$withdraw->created_at->format('d M Y')}}</td>
                                        <td> @if(get_currency_placement() == 'after')
                                                {{$withdraw->amount}} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{$withdraw->amount}}
                                            @endif </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ __('No Requested Found') }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

@endsection

@push('script')

    <script>

        'use strict'

        // Month
        var options = {
            series: [{
                name: 'Total Enroll students',
                data: @json($totalMonthlyEnroll)
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'year',
                // categories: @json($totalMonths)
                categories: [1, 2, 3, 4, 5, 6]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartMonth"), options);
        chart.render();

        // Year
        var options = {
            series: [{
                name: 'Total enroll students',
                data: @json($totalYearlyEnroll)
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'year',
                categories: @json($totalYears)
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartYear"), options);
        chart.render();

        var options = {
            series: @json(@$allPercentage),
            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            ],
            labels: @json(@$allName)
        };

        var chart = new ApexCharts(document.querySelector("#topSellerChart"), options);
        chart.render();

    </script>
@endpush
