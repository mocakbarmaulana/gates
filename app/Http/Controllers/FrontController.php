<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        $active = 'Home';
        $courses = Course::where('status', 0)->paginate(3);
        return view('home', compact('courses', 'active'));
    }

    public function detail($id){

        $course = Course::with(['orders' => function($order){
            $order->where('student_id', Auth::guard('member')->id());
        }])->find($id);

        // if ($course->orders) {
        //     dd(gettype($course->orders));
        // }

        return view('detailCourse', compact('course'));
    }
}