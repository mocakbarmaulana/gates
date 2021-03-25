<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $courses = Course::paginate(4);
        return view('home', compact('courses'));
    }

    public function detail($id){

        $course = Course::find($id);

        return view('detailCourse', compact('course'));
    }
}