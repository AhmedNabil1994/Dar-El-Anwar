@extends('layouts.admin')

@section('content')
    <!-- Start Messages Section -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="chat chat__wrapper" style="min-height: 95vh;height: auto;">
                <header class="chat__header">
                    <h2 class="text-center">
                        قائمة الاشعارات
                    </h2>
                </header>

                <div class="row">
                    <div class="col-md-3">
                        <!-- Start chat sidebar -->
                        <div class="chat__sidebar border px-4">
                            <h6>
                                الاشعارات
                            </h6>
                            <ul class="chat__list">
                                @forelse($notifications as $notify)
                                        @if($notify->sender)
                                            <li>
                                                <a href="{{ route('notification.show',$notify->id) }}" class="message-user-item dropdown-item">
                                                    <div class="message-user-item-left">
                                                        <p class="text-dark">{{$notify->sender->name}}</p>
                                                        <div class="single-notification-item d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="user-img-wrap position-relative radius-50">
                                                                    <img src="{{ asset($notify->sender->image_path) }}" alt="img" class="radius-50">
                                                                </div>
                                                            </div>


                                                            <div class="flex-grow-1 ms-2"  style="text-overflow:ellipsis;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:1;overflow:hidden;width: 20px">
                                                               <p class="font-13 mb-0">{{ __($notify->text) }}</p>
                                                                <div class="font-11 color-gray mt-1">{{$notify->created_at->diffForHumans()}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @empty
                                        <p class="text-center">{{__('لا توجد بيانات')}}</p>
                                    @endforelse
                            </ul>
                        </div>
                        <!-- end chat sidebar -->
                    </div>
                    <div class="col-md-9">
                            @if(@$notification)
                            <div class="row">
                                <div class="col-md-12 m-3 d-flex justify-content-center flex-column ">
                                        <input type="hidden" value="welcome_text" name="option_key[]">
                                        <h3 class="h3 text-dark">{{$notification->sender->name}}</h3>
                                        <textarea class="form-control-lg" disabled style="height: 500px" name="option_value[]">{{$notification->text  }}</textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Messages Section -->
@endsection
