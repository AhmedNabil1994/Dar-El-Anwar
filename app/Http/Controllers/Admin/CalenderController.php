<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Event;
use App\Models\Calender;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['calender_notes'] = Calender::all();
        return view('admin.common.apps-calendar',$data);
    }


    public function events()
    {
        $events = Calender::all();
        return response()->json($events);
    }

    public function storeEvent(Request $request)
    {
        dd($request->all());
        $event = new Calender;
        $event->title = $request->title;
        $event->start = $request->start??Carbon::today();
        $event->end = $request->end??Carbon::today();
        $event->save();

        return redirect()->back()->with('success','تمت اضافة تذكير');
    }
}
