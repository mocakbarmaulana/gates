<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchieveController extends Controller
{
    public function achive(Request $request, $id){
        $course = Course::find($id);

        $orders = Order::where('course_id', $id)->where('status', 1)->get();

        $achieve = Achievement::where('skill_id', $course->skill_id)
                    ->where('subskill_id', $course->subskill_id)
                    ->where('student_id', Auth::guard('member')->id())
                    ->first();

        foreach ($orders as $key => $order) {
            if(is_null($achieve)){
                $trophy = new Achievement();
                $trophy->student_id = $order->student_id;
                // $trophy->course_id = $order->course_id;
                $trophy->skill_id = $order->course->skill_id;
                $trophy->subskill_id = $order->course->subskill_id;
                $trophy->name_student = $order->student_name;
                // $trophy->name_course = $order->course->name;
                $trophy->name_skill = $order->course->skill->name;
                $trophy->total = $trophy->total += 1;
                // $trophy->status = true;
                $trophy->save();
            } else {
                $achieve->total = $achieve->total += 1;
                $achieve->save();
            }
        }

        $course->status = true;
        $course->save();

        return redirect()->back()->with('success', 'Workshop telah selesai');
    }
}
