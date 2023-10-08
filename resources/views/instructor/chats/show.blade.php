@extends('layouts.admin')

@push('style')
    <style>

        .chat-coversation {
            max-width: 450px;
            margin: 10px 0;
        }
        .chat-coversation .avatar {
            margin-right: 15px;
            margin-bottom: 12px;
        }
        .chat-coversation .media {
            -ms-flex-align: end;
            align-items: flex-end;
        }
        .chat-coversation .media-body .text {
            background: gray;
            padding: 10px 20px;
            line-height: 1.7;
            border-radius: 4px;
        }
        .chat-coversation .media-body .time {
            font-size: 10px;
            opacity: 0.5;
            display: block;
        }

        .chat-coversation.right {
            margin-left: auto;
        }
        .chat-coversation.right .avatar {
            margin-right: 0px;
            margin-left: 15px;
        }
        .chat-coversation.right .time {
            text-align: right;
        }
        .chat-coversation.right .media-body .text {
            background: rgba(0, 0, 255, 0.53);
            color: #fff;
        }
    </style>
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="mb-0">{{ __('رسائل') }} {{ $chatThread->student->name }}</h6>
        </div>
        <div class="card-body">
            <div class="border-0 shadow-none aiz-chat pb-7">
                <div class="chat-list-wrap c-scrollbar-light scroll-to-btm" style="overflow:auto;height: calc(100vh - 350px);max-height: calc(100vh - 350px);">
                    <div class="chat-list">
                        @foreach ($chatThread->chats as $key => $chat)
                            @if ($chat->user_id == $chatThread->sender_id)
                                @if ($chat?->message != null)
                                    <div class="chat-coversation d-flex ">
                                        <div class="media">
                                        <span class="avatar avatar-xs flex-shrink-0" data-toggle="tooltip" title="{{ $chat->chat_thread->student?->name }}">
                                            <p  >{{ $chat->chat_thread->student?->name}}</p >
                                        </span>
                                            <div class="media-body">
                                                <div class="text">{{$chat?->message}}</div>
                                                <div>
                                                    <span class="time">{{ $chat->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if ($chat?->message != null)
                                    <div class="chat-coversation right">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="text">{{$chat?->message}}</div>
                                                <span class="time">{{ $chat->created_at->diffForHumans()}}</span>

                                            </div>
                                            <span class="avatar avatar-xs flex-shrink-0" data-toggle="tooltip" title="{{$chat->chat_thread->instructor->name}}">
{{--                                            <img src="{{ __($chat->sender->avatar)}}" onerror="this.onerror=null;this.src='{{ asset('assets/img/avatar-place.png') }}';">--}}
                                        </span>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="chat-footer border-top p-3 attached-bottom bg-white">
                    <form id="send-mesaage" onsubmit="send_reply(event)">
                        <div class="input-group">
                            <input type="hidden" id="chat_thread_id" name="chat_thread_id" value="{{ $chatThread->id }}">
                            <input type="text" class="form-control" id="message" name="message" placeholder="{{ __('رسالتك..') }}" autocomplete="off">
                            <input type="hidden" class="" name="attachment" id="attachment">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-circle btn-icon" type="submit">
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script>

        var lastMessageId = '{{ $chatThread->chats()->latest()->first()?->id }}';

        $(document).ready(function(){
            setInterval(() => {
                refreshChat()
            }, 5000);
        });

        function refreshChat(){
            $.post('{{ route('instructor.chats.refresh') }}', {_token: '{{ csrf_token() }}', id: $('input[name=chat_thread_id]').val(), lastMessageId: lastMessageId}, function(data){
                $('.chat-list').append(data.view);
                lastMessageId = data.lastMessageId;
                AIZ.extra.scrollToBottom();
            });
        }

        function send_reply(e){
            e.preventDefault();
            $.post('{{ route('instructor.chats.reply') }}', {
                _token: '{{ csrf_token() }}',
                id: $('input[name=chat_thread_id]').val(),
                message: $('input[name=message]').val()},
                function(data){
                    $('input[name=message]').val(null);
                refreshChat();
            });
        }

    </script>
@endpush
