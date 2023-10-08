<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatThread;
use App\Models\Employee;
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
        $chat_threads = ChatThread::orderBy('created_at', 'desc')->where('user_id',Auth::user()->employee->id);
        $chat_threads = $chat_threads->paginate(12);

        return view('instructor.chats.index', compact('chat_threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $chatThread = ChatThread::where( 'user_id',Auth::user()->employee->id)
            ->where('sender_id' , $request->student)
        ->first();

        if(!$chatThread)
        {
            $chatThread = ChatThread::create([
                'user_id' => Auth::user()->employee->id,
                'sender_id' => $request->student,
            ]);
        }

        return view('instructor.chats.show', compact('chatThread'));
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
        return view('instructor.chats.show', compact('chatThread'));
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
    public function update(Request $request, $id)
    {
        //
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
            'view' => view('instructor.chats.refresh', compact('chats'))->render(),
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
            'message' => __('Your message has been sent successfully.')
        ]);
    }
}
