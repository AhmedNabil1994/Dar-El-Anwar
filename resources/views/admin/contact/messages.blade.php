@extends('layouts.admin')

@section('content')
<!-- Start Messages Section -->
<div class="page-content">
        <div class="container-fluid">
            <div class="chat chat__wrapper" style="min-height: 95vh;height: auto;">
              <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('قائمة الرسائل') }}</h2>
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

              <div class="row messages">
                <div class="col-md-3" style ="height:658px">
                  <!-- Start chat sidebar -->
                  <div class="chat__sidebar border px-4">
                    <h6>
                     خيارات
                    </h6>
                      <form method="POST" action="{{route('notification.store')}}" enctype="multipart/form-data">
                          @csrf
                            <div class="chat__list">
                        <div class="row form-group mt-3">
                            <label class="form-label col-12">التنبيه بالغباب في حالة الغياب عدد ايام</label>
                            <div class="col-sm-12">
                            <input type="number" min="0" class="form-control" name="validate_abscent_times"
                             value="{{get_setting('validate_abscent_times')}}"><span class="text-black">دقيقة</span>
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <label class="form-label col-12">وقت رسالة الترحيب</label>
                            <div class="col-sm-12">
                                <input type="number" min="0" class="form-control" name="welcome_time"
                                       value="{{get_setting('welcome_time')}}"><span class="text-black">دقيقة</span>
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <label class="form-label col-12">التنبيه عند تأخير السداد بعد يوم</label>
                            <div class="col-sm-12">
                                <input type="number" min="0" class="form-control" name="warning_late_subscription_time"
                                       value="{{get_setting('warning_late_subscription_time')}}"><span class="text-black">دقيقة</span>
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <label class="form-label col-12">رسالة بسداد الاشتراك</label>
                            <div class="col-sm-12">
                                <input type="number" min="0" class="form-control" name="warning_late_subscription_time"
                                       value="{{get_setting('warning_late_subscription_time')}}"><span class="text-black">دقيقة</span>
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <label class="form-label col-12">المرسل اليه</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="send_user_type">

                                    <option value="1"
                                        {{1 == get_setting('send_user_type')? 'selected' : ''}}
                                    >الكل</option>
                                    <option value="2"
                                        {{2== get_setting('send_user_type')? 'selected' : ''}}
                                    >ولي الامر</option>
                                    <option value="3"
                                        {{3 == get_setting('send_user_type')? 'selected' : ''}}
                                    >طالب</option>
                                    <option value="4"
                                        {{4 == get_setting('send_user_type')? 'selected' : ''}}
                                    >مدرس</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <label class="form-label col-12">طريقة ىالإرسال</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="sending_way[]" multiple>
                                    @php
                                        $arr = json_decode(get_setting('sending_way'));
                                    @endphp

                                    <option value="1"
                                    {{in_array(1,$arr)? 'selected' : ''}}
                                    >الايميل</option>
                                    <option value="2"
                                        {{in_array(2,$arr)?'selected' : ''}}
                                    >لوحة التحكم</option>
                                    <option value="3"
                                        {{in_array(3,$arr)?'selected' : ''}}
                                    >الواتس اب</option>
                                </select>
                            </div>
                        </div>
                    </div>

                          <button type="submit" class="btn btn-primary">حفظ</button>

                      </form>
                  </div>
                  <!-- end chat sidebar -->
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="col-md-9">
                <form method="POST" action="{{route('notification.send')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                      <div class="col-md-5 m-3 d-flex justify-content-center flex-column ">
                          <form method="POST" action="{{route('notification.send')}}" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="welcome_text" name="option_key[]">
                              <h3 class="h3 text-dark">رسالة ترحيب</h3>
                              <textarea style = "width:307px" class="form-control-lg" name="option_value[]">{{get_setting('welcome_text')}}</textarea>
                              <div class="col-md- mt-3">
                                  <button class="btn buttons-style">إرسال</button>
                              </div>
                          </form>
                      </div>
                      <div class="col-md-5 m-3 d-flex justify-content-center flex-column ">
                          <form method="POST" action="{{route('notification.send')}}" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="warning_subscription_text" name="option_key[]">
                              <h3 class="h3 text-dark">رسالة سداد الاشتراك</h3>
                              <textarea class="form-control-lg" name="option_value[]">{{get_setting('warning_subscription_text')}}</textarea>
                              <div class="col-md- mt-3">
                                  <button class="btn buttons-style">إرسال</button>
                              </div>
                          </form>
                      </div>
                      <div class="col-md-5 m-3 d-flex justify-content-center flex-column ">

                              <input type="hidden" value="warning_abscent_text" name="option_key[]">
                              <h3 class="h3 text-dark">رسالة التنبيه بالغياب</h3>
                              <textarea class="form-control-lg" name="option_value[]">{{get_setting('warning_abscent_text')}}</textarea>
                              <div class="col-md- mt-3">
                                  <button class="btn buttons-style">إرسال</button>
                              </div>
                          </form>
                      </div>
                      <div class="col-md-5 m-3 d-flex justify-content-center flex-column ">
                          <form method="POST" action="{{route('notification.send')}}" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="warning_late_subscription_text" name="option_key[]">
                              <h3 class="h3 text-dark">رسالة التأخير عن السداد</h3>
                              <textarea class="form-control-lg" name="option_value[]">{{get_setting('warning_late_subscription_text')}}</textarea>
                              <div class="col-md- mt-3">
                                  <button class="btn buttons-style">إرسال</button>
                              </div>
                          </form>
                      </div>
                      <div class="col-md-5 m-3 d-flex justify-content-center flex-column ">
                      <form method="POST" action="{{route('notification.send')}}" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="warning_late_subscription_text" name="option_key[]">
                              <h3 class="h3 text-dark">تذكير اوملاحظة</h3>
                              <textarea class="form-control-lg" name="option_value[]">{{get_setting('noting_messages')}}</textarea>
                              <div class="col-md- mt-3">
                                  <button class="btn buttons-style">إرسال</button>
                              </div>
                      </form>
                      </div>
                  </div>

            </div>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- End Messages Section -->
@endsection
