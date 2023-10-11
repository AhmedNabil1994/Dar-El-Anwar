<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Student;
use App\Models\Chat;
use App\Models\ChatThread;
use App\Models\Instructor;
use Auth;
use Illuminate\Http\Request;
use function App\Http\Controllers\translate;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $chat_threads = ChatThread::orderBy('created_at', 'desc');
        $chat_threads = $chat_threads->paginate(12);

        return view('admin.chats.index', compact('chat_threads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chatThread = ChatThread::findOrFail($id);
        return view('admin.chats.show', compact('chatThread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Instructor $instructor)
    {
        //
        $chatThread = ChatThread::find($request->id);
        if(!$chatThread)
        {
            ChatThread::created([
                'user_id' => $instructor->id,
                'sender_id' => Auth::guard('students')->id(),
            ]);
        }
        return view('admin.chats.show', compact('chatThread'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh(Request $request)
    {
        $chatThread = ChatThread::findOrFail($request->id);
        $chats = Chat::where('chat_thread_id', $chatThread->id)->where('id', '>', $request->lastMessageId)->get();

        return [
            'view' => view('admin.chats.refresh', compact('chats'))->render(),
            'lastMessageId' => $chats->count() > 0 ? $chats->last()->id : $request->lastMessageId
        ];
    }

    public function reply(Request $request)
    {
        $chatThread = ChatThread::findOrFail($request->id);
        $chatThread->last_message_at = date("Y-m-d H:i:s");
        $chatThread->save();

        Chat::create([
            'chat_thread_id' => $chatThread->id,
            'user_id' => Auth::user()->id,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => translate('Your message has been sent successfully.')
        ]);
    }
}
