<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\course_details;

class CourseController extends Controller
{
    public function index(){
        $active = 'Course';

        $courses = Course::paginate(10);

        return view('admin.course.index', compact('active', 'courses'));
    }

    public function show($id){
        $active = 'Course';
        $course = Course::find($id);

        $order = course_details::whereHas('orders', function($q){
            $q->where('status', 1);
        })->where('course_id', $id)->orderBy('event_date', 'ASC')->orderBy('event_time', 'ASC')->get();


        return view('admin.course.show', compact('active', 'course', 'order'));
    }
}
