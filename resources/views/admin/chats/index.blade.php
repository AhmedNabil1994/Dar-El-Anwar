@extends('layouts.admin')


@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    @if(Auth::guard('students')->check())
                        @foreach(\App\Models\Employee::has('instructor')->whereStatus(1)->get() as $instructor)
                            <div class="row">

                                <div class="col-md-9 p-3 m-3 border border-dark">

                                    <img width="25" height="25" src="{{asset($instructor->getImg())}}"
                                          class="bx-circle">

                                    <a href="{{route('student.chats.create',['instructor'=>$instructor->id])}}">{{$instructor->name}}</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <form class="" id="chat_list" action="" method="GET">
                            <div class="card-header row gutters-5">
                                <div class="col text-center text-md-left">
                                    <h5 class="mb-md-0 h6">{{__('قائمة المحادثات')}}</h5>
                                </div>
                            </div>
                        </form>
                        <div class="card-body">
                            <table class="table aiz-table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('من')}}</th>
                                    <th data-breakpoints="md">{{__('اخر رسالة')}}</th>
                                    <th class="text-right">{{__('خيارات')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chat_threads as $key => $chat_thread)
                                    <tr>
                                        <td>{{ ($key+1) + ($chat_threads->currentPage() - 1)*$chat_threads->perPage() }}</td>
                                        <td>
                                            {{ $chat_thread->instructor->name }}
                                        </td>
                                        <td>
                                            <span>{{ $chat_thread->chats()->latest()->first()?->message }}</span> <br>
                                            <span
                                                class="fs-10 opacity-60">{{ Carbon\Carbon::parse($chat_thread->last_message_at)->diffForHumans()}}</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('chats.show', $chat_thread->id) }}"
                                               class="btn btn-sm btn-icon btn-circle btn-soft-primary"
                                               title="{{ __('عرض') }}">
                                                <i class="fa text-info fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="aiz-pagination aiz-pagination-center">
                                {{ $chat_threads->appends(request()->input())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
