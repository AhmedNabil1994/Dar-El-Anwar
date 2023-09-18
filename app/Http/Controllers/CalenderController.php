<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.common.apps-calendar');
    }


    public function events()
    {
        $events = Calender::all();
        return response()->json($events);
    }

    public function storeEvent(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->save();

        return response()->json($event);
    }
}
