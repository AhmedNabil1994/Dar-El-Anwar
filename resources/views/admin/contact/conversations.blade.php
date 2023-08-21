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
            <div class="chat chat__wrapper" style="min-height: 95vh;height: auto;">
              <header class="chat__header">
                <h2 class="text-center">
                  Contact Us / Conversation
                </h2>
              </header>

              <div class="row">
                <div class="col-md-3">
              <!-- Start chat sidebar -->
              <div class="chat__sidebar border px-4">
                <h6>
                 Conversation 
                </h6>
                <ul class="chat__list">
                  <li>
                    <a href="#">
                    <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/teacher.png" alt="archived">
                    my Teachers
                  </a>
                  </li>
                  <li>
                    <a href="#">
                      <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/recieved.png" alt="archived">
                      Recieving Messages</a>
                  </li>
                  <li>
                    <a href="#">
                      <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/sent.png" alt="archived">
                      Sending Messages
                    </a>
                  </li>
                  <li>
                  <a href="#">
                    <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/chat.png" alt="archived">
                    Chats
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
