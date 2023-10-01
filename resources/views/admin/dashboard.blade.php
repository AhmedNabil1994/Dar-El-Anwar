
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
                                <h2>{{trans('website.dashboard') }} </h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.dashboard') }}</li>
                                </ul>
                            </nav>
                        </div>
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

                        <a href="{{route('student.index')}}">
                            <h1 class="color-purple">{{$total_students}}</h1>
                            <h2>{{ trans('website.total_students') }}</h2>
                        </a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/students.png" alt="total students">
                        </div>
                        <div class="status__box__text">

                            <a href="{{route('student.index')}}">
                                <h1 class="color-purple">{{$total_joining_students}}</h1>
                                <h2>{{ trans('قيد الالتحاق') }}</h2>
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
                            <a href="{{route('employees.index')}}">
                                <h1 class="color-purple">{{$total_employees}}</h1>
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
                            <a href="{{route('student.index',['filterByJoining'=>1])}}">
                                <h1 class="color-blue">{{$new_students}}</h1>
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
                            <a href="{{route('student.index',['filterByJoining'=>'3'])}}">
                                <h1 class="color-green">{{$excluded_students}}</h1>
                                <h2>{{ trans('website.rejected') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
{{--                <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                    <div class="status__box status__box__v3 bg-style">--}}

{{--                        <div class="status__box__img">--}}
{{--                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/instructors.png" alt="instructors">--}}
{{--                        </div>--}}
{{--                        <div class="status__box__text">--}}
{{--                            <a href="{{route('instructor.index')}}">--}}
{{--                                <h1 class="color-blue">{{$excluded_students}}</h1>--}}
{{--                                <h2>{{ trans('website.total_instructors') }}</h2>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/courses.png" alt="courses">
                        </div>
                        <div class="status__box__text">
                            <a href="{{route('admin.course.index')}}">
                                <h1 class="color-purple">{{$total_courses}}</h1>
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
                            <a href="{{route('admin.course.index')}}">
                                <h1 class="color-purple">{{$total_best_courses}}</h1>
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
                            <a href="{{route('student.index',['filterByJoining'=>4])}}">
                                <h1 class="color-green">{{$converted_students}}</h1>
                                <h2>{{ trans('website.students_trans') }}</h2>
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
                            <a href="{{ route('subscriptions.students_subscription') }}">
                                <h1 class="color-yellow"></h1>
                                <h1 class="color-yellow">{{$total_get_money}}</h1>
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
                            <a href="{{route('absence.index')}}">
                                <h1 class="color-yellow">{{$absence_students}}</h1>
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
                            <a href="{{ route('calender.index') }}">
                                <h1 class="color-yellow"></h1>
                                <h2>{{ trans('website.calendar') }}</h2>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="revenue__chart-v2__area bg-style">
                        <div class="revenue__chart-v2__top">
                            <div class="revenue__chart-v2__top__left">
                                <a href="{{ route('accounts.treasury') }}" class="row">
                                <div class="content-title">
                                    <h2>{{ __('الخزينة') }}</h2>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="row">
                                <div id="chartIncome" class="col-md-6"></div>
                                <div id="chartExpense" class="col-md-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="revenue__chart-v2__area bg-style">
                        <div class="revenue__chart-v2__top">
                            <div class="revenue__chart-v2__top__left">

                                    <div class="content-title">
                                        <h2>{{ __('اجمالي المبيعات في المخزن و الكانتين') }}</h2>
                                    </div>

                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                                <div id="chartSales" class="col-md-12"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="revenue__chart-v2__area bg-style">
                        <div class="revenue__chart-v2__top">
                            <div class="revenue__chart-v2__top__left">
                                <div class="content-title">
                                    <h2>{{ __('إجمالي نسب الطلاب') }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div id="chartPercentage" class="col-md-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    <script>

        'use strict'

        var incomes = @json($total_incomes_month);
        var expenses = @json($total_expenses_month);
        var sales = @json($total_sales);
        var precentage = @json($percentage_of_students);
        var incomesDates = [];
        var incomesAmounts = [];
        var expensesDates = [];
        var expensesAmounts = [];
        var salesDates = [];
        var salesAmounts = [];
        var precentageStatus = [];
        var precentageCount = [];


        incomes.forEach(function (e)
            {
                incomesDates.push(e.date)
            }
        )
        incomes.forEach(function (e)
            {
                incomesAmounts.push(e.count)
            }
        )
        expenses.forEach(function (e)
            {
                expensesDates.push(e.date)
            }
        )
        expenses.forEach(function (e)
            {
                expensesAmounts.push(e.count)
            }
        )
        sales.forEach(function (e)
            {
                salesDates.push(e.date)
            }
        )
        sales.forEach(function (e)
            {
                salesAmounts.push(e.count)
            }
        )
        precentage.forEach(function (e)
            {
                if(e.status == 1)
                    e.status = 'جدد'
                else if(e.status == 3)
                    e.status = 'المستبعدين'
                else if(e.status == 4)
                    e.status = 'نم نقله'
                precentageStatus.push(e.status)
            }
        )
        precentage.forEach(function (e)
            {
                precentageCount.push(e.count)
            }
        )
        console.log(incomesDates)
        // Month
        var options = {
            series: [{
                name: 'المصروفات',
                data: []
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'year',
                categories: incomesDates
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartIncome"), options);
        chart.render();


        var newData = incomesAmounts; // Replace this with your actual data

        // Update the chart's data property
        chart.updateSeries([{
            data: newData
        }]);

        // Year
        var options = {
            series: [{
                name: 'الايرادات',
                data: []
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'incomes',
                categories: expensesDates
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartExpense"), options);
        chart.render();


        var newData = expensesAmounts; // Replace this with your actual data

        // Update the chart's data property
        chart.updateSeries([{
            data: newData
        }]);


        var options = {
            series: [{
                name: 'المبيعات في المحزن و الكانتين',
                data: []
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'المبيعات',
                categories: salesDates
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartSales"), options);
        chart.render();


        var newData = salesAmounts; // Replace this with your actual data

        // Update the chart's data property
        chart.updateSeries([{
            data: newData
        }]);

        var options = {
            series: [{
                name: 'إجمالي نسب الطلاب',
                data: []
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'إجمالي نسب الطلاب',
                categories: precentageStatus

            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartPercentage"), options);
        chart.render();


        var newData = precentageCount; // Replace this with your actual data

        // Update the chart's data property
        chart.updateSeries([{
            data: newData
        }]);

    </script>
@endpush
