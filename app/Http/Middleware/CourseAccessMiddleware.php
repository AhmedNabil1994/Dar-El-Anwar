<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use App\Models\Order_item;

class CourseAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = auth()->id();
        $course = Course::whereSlug($request->slug)->select('id')->firstOrfail();
        $orderItem = Order_item::where('user_id', $user_id)->where('course_id', $course->id)->whereHas('order', function($q){
            $q->whereIn('payment_status', ['paid' , 'free']);
        })->count();

        if(!$orderItem){
            abort('403');
        }
        
        return $next($request);
    }
}
