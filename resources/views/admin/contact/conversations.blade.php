@extends('layouts.admin')


@section('content')
<div class="page-content">
        <div class="container-fluid">
            <div class="chat chat__wrapper" style="min-height: 80vh;height: auto;">
              <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __(' المحادثات') }}</h2>
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

              <div class="row">
                <div class="col-md-3">
              <!-- Start chat sidebar -->
              <div class="chat__sidebar border px-4">
                <h6>
                 المحادثات 
                </h6>
                <ul class="chat__list">
                  <li>
                    <a href="#">
                    <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/teacher.png" alt="archived">
                    أساتذتي
                  </a>
                  </li>
                  <li>
                    <a href="#">
                      <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/recieved.png" alt="archived">
                      استقبال الرسائل </a>
                  </li>
                  <li>
                    <a href="#">
                      <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/sent.png" alt="archived">
                      إرسال الرسائل 
                    </a>
                  </li>
                  <li>
                  <a href="#">
                    <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/chat.png" alt="archived">
                    الدردشة
                  </a>
                  </li>
                </ul>
              </div>
              <!-- end chat sidebar -->
            </div>
            <div class="col-9">
              <div class="chat__main-content" >
                <div class="messages-field">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, eveniet!
                </div>
                <form action="" class="send-message">
                  <input type="text" vlaue="" placeholder="Insert your message">
                  <div class="send-message__controller">
                    <div class="icon">
                      <img class="img-responsive" src="{{ asset('admin') }}/images/messages/docs.png" alt="upload files">
                    </div>
                    <div class="icon">
                      <img class="img-responsive" src="{{ asset('admin') }}/images/messages/send-msg.png" alt="send">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
