@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                              <h2>{{ trans('website.sent') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.students') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="chat" style="min-height: 95vh;height: auto;">
                <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('صندوق الصادر') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('تواصل معنا') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

                <div class="row" style="min-height: 95%;height: auto;">
                    <!-- Start chat sidebar -->
                    <div class="col-md-12">
                        <div class="chat__content px-3">
                            <div class="chat__filters ">
                                <form class="row">
                                    <div class="col-md-4">
                                        <div class="input__group mt-3 mb-3">
                                            <label>القسم</label>
                                            <input type="text" name="parents_social_status" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input__group mt-3 mb-3">
                                            <label>العام الدراسي</label>
                                            <input type="text" name="parents_social_status" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input__group mt-3 mb-3">
                                            <label>بحث عن</label>
                                            <input type="text" name="parents_social_status" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="show-filter">
                                        <a href="#">
                                            <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/reply.png" alt="archived">
                                            رد
                                        </a>
                                        <a href="#">
                                            <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/show.png" alt="archived">
                                            إظهار
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <div class="customers__table" style="overflow: auto">
                                <table id="" class="row-border data-table-filter table-style table table-bordered table-striped">
                                    <thead style="background-color: #50bfa5;">
                                    <tr>
                                        <th>الي</th>
                                        <th>التاريخ</th>
                                        <th>الموضوع</th>
                                        <th>الحالة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sent_messages as $message)
                                        <tr>
                                            <td>{{$message->email}}</td>
                                            <td>{{\Carbon\Carbon::parse($message->created_at)->format('Y/m/d')}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{$message->is_seen == 'yes'? 'مقروء':'غير مقروء'}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
