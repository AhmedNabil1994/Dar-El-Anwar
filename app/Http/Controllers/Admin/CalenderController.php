<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Event;
use App\Models\Calender;
use App\Models\Notification;
use DateTime;
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
        $dateString = $request->start;
        $cleanDateString = preg_replace('/\((.*?)\)/', '', $dateString);


// Create a DateTime object from the date string
        $dateTime = Carbon::parse($cleanDateString);

// Format the DateTime object as needed
        $formattedDate = $dateTime->format('Y-m-d'); // Example format: '2023-09-01'

// You can also convert it to a Carbon instance if you prefer
        $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dateTime->format('Y-m-d H:i:s'));

        $event = new Calender;
        $event->title = $request->title;
        $event->start = $carbonDate??Carbon::today();
        $event->save();


        return redirect()->back()->with('success','تمت اضافة تذكير');
    }
}
