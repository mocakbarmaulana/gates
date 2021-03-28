<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        $active = 'Home';
        $courses = Course::where('status', 0)->withCount('orders')->paginate(3);

        return view('home', compact('courses', 'active'));
    }

    public function menu(Request $request){
        $active = 'Menu';
        $q = $request->q;
        $skills = Skill::all();


        $courses = Course::when($request->q, function($q, $request){
            $q->where('skill_id', $request);
        })->where('status', 0)->paginate(12);


        return view('menucourse', compact('active', 'courses', 'skills', 'q'));
    }

    public function detail($id){
        $active = 'Menu';
        $course = Course::with(['orders' => function($order){
            $order->where('student_id', Auth::guard('member')->id());
        }])->find($id);

        $othercourse = Course::where('status', 0)->withCount('orders')->paginate(6);

        return view('detailCourse', compact('course', 'active', 'othercourse'));
    }

    public function aboutus(){
        $active = '';
        return view('aboutus', compact('active'));
    }

    public function career(){
        $active = '';
        return view('career', compact('active'));
    }

    public function learner(){
        $active = '';
        return view('learners', compact('active'));
    }

    public function teacher(){
        $active = '';
        return view('teacher', compact('active'));
    }

}