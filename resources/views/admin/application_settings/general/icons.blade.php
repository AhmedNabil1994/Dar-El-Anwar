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
                                <h2>{{ __('الاعدادت') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('لوحة التحكم')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __(@$title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('admin.application_settings.sidebar')
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="email-inbox__area bg-style form-horizontal__item bg-style admin-general-settings-page">
                        <div class="item-top mb-30"><h2>{{ __(@$title) }}</h2></div>
                        <form action="{{route('settings.icons.update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="absence_icon">
                                    <label>
                                        <input type="checkbox" name="absence_icon" class="form-check" @if(get_my_option('absence_icon')) checked @endif">
                                        <span>ايقونة الغياب</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="subs_icon">
                                    <label>
                                        <input type="checkbox" name="subs_icon" class="form-check" @if(get_my_option('subs_icon')) checked @endif">
                                        <span>ايقونة الطلبة غير المسددين</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="goals_icon">
                                    <label>
                                        <input type="checkbox" name="goals_icon" class="form-check" @if(get_my_option('goals_icon')) checked @endif">
                                        <span>ايقونة تقييمات اليوم</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="total_students">
                                    <label>
                                        <input type="checkbox" name="total_students" class="form-check" @if(get_my_option('total_students')) checked @endif">
                                        <span>ايقونة عدد الطلبة</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="total_joining_students">
                                    <label>
                                        <input type="checkbox" name="total_joining_students" class="form-check" @if(get_my_option('total_joining_students')) checked @endif">
                                        <span>ايقونة قيد الالتحاق</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="new_students">
                                    <label>
                                        <input type="checkbox" name="new_students" class="form-check" @if(get_my_option('new_students')) checked @endif">
                                        <span>ايقونة طلاب جدد خلال الشهر</span>
                                    </label>
                                </div> <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="excluded_students">
                                    <label>
                                        <input type="checkbox" name="excluded_students" class="form-check" @if(get_my_option('excluded_students')) checked @endif">
                                        <span>ايقونة طلاب مستبعدين</span>
                                    </label>
                                </div> <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="converted_students">
                                    <label>
                                        <input type="checkbox" name="converted_students" class="form-check" @if(get_my_option('converted_students')) checked @endif">
                                        <span>ايقونة طلاب محولين</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="absence_students">
                                    <label>
                                        <input type="checkbox" name="absence_students" class="form-check" @if(get_my_option('absence_students')) checked @endif">
                                        <span>ايقونة طلالب متغيبين</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="total_employee">
                                    <label>
                                        <input type="checkbox" name="total_employee" class="form-check" @if(get_my_option('total_employee')) checked @endif">
                                        <span>ايقونة عدد الموظفين</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="total_courses">
                                    <label>
                                        <input type="checkbox" name="total_courses" class="form-check" @if(get_my_option('total_courses')) checked @endif">
                                        <span>ايقونة الدورات</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="total_best_courses">
                                    <label>
                                        <input type="checkbox" name="total_best_courses" class="form-check" @if(get_my_option('total_best_courses')) checked @endif">
                                        <span>ايقونة أفضل الدورات</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="total_get_money">
                                    <label>
                                        <input type="checkbox" name="total_get_money" class="form-check" @if(get_my_option('total_get_money')) checked @endif">
                                        <span>ايقونة إجمالي التحصيل المالي</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="calender">
                                    <label>
                                        <input type="checkbox" name="calender" class="form-check" @if(get_my_option('calender')) checked @endif">
                                        <span>ايقونة التقويم</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="treasury">
                                    <label>
                                        <input type="checkbox" name="treasury" class="form-check" @if(get_my_option('treasury')) checked @endif">
                                        <span>بيانات الخزينة</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="total_sales">
                                    <label>
                                        <input type="checkbox" name="total_sales" class="form-check" @if(get_my_option('total_sales')) checked @endif">
                                        <span>بيانات اجمالي المبيعات في المخزن و الكانتين</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="type[]" value="percentage_of_students">
                                    <label>
                                        <input type="checkbox" name="percentage_of_students" class="form-check" @if(get_my_option('percentage_of_students')) checked @endif">
                                        <span>بيانات إجمالي نسب الطلاب</span>
                                    </label>
                                </div>


                            </div>





                            <div class="row">
                                <div class="col-12">
                                    <div class="input__group general-settings-btn">
                                        <button type="submit" class="btn btn-blue float-right">{{__('تحديث')}}</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection


@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush
