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
@foreach ($chats as $key => $chat)
    @if ($chat->user_id == $chat->chat_thread->user_id)
        @if ($chat->message != null)
            <div class="chat-coversation d-inline-flex">
                <div class="media">
                    <span class="avatar avatar-xs flex-shrink-0" data-toggle="tooltip" title="{{$chat->chat_thread->instructor->name }}">
                        <img src="{{ asset($chat->chat_thread->instructor->name)}}" onerror="this.onerror=null;this.src='{{ asset('assets/img/avatar-place.png') }}';">
                    </span>
                    <div class="media-body">
                        <div class="text bg-soft-secondary">{{$chat->message}}</div>
                        <div>
                            <span class="time">{{ Carbon\Carbon::parse($chat->created_at)->diffForHumans()}}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        @if ($chat->message != null)
            <div class="chat-coversation right">
                <div class="media">
                    <div class="media-body">
                        <div class="text">{{$chat->message}}</div>
                        <span class="time">{{ Carbon\Carbon::parse($chat->created_at)->diffForHumans()}}</span>
                    </div>
                    <span class="avatar avatar-xs flex-shrink-0" data-toggle="tooltip" title="{{$chat->chat_thread->instructor->name}}">
                    </span>
                </div>
            </div>
        @endif
    @endif
@endforeach
