<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function send(Request $request)
    {
       $data = $request->except('_token');

       foreach($data['option_key'] as $key => $value){
           $setting = Setting::where('option_key',$value);

           if($setting)
               $setting->update(['option_value'=>$data['option_value'][$key]]);
           else
               Setting::create([
                   'option_key' => $value,
                   'option_value' => $data['option_value'][$key]
               ]);
           Notification::create([
               'user_id' => 1,
               'sender_id' => Auth::id(),
               'user_type' => get_setting('send_user_type'),
               'text' => $data['option_value'][$key],
           ]);
       }


        return redirect()->back()->with('success','تم الارسال بنجاح');
    }

    public function show(Request $request,$id)
    {
        $data['notification'] = Notification::find($id);
        $data['notification']->update(['is_seen'=>'yes']);
        $data['notifications'] = Notification::orderBy('id','DESC')
            ->where('user_id', Auth::id())
            ->where('user_type',1)
            ->get();

        return view('admin.notifications.show',$data);
    }

}
