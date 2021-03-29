<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use App\Models\course_details;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index(){
        $active = 'Course';

        $courses = Course::paginate(10);

        return view('admin.course.index', compact('active', 'courses'));
    }

    public function create(){
        $active = "Course";
        $skills = Skill::all();

        return view('admin.course.create', compact('active', 'skills'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:courses|max:150',
            'description' => 'required|string',
            'price' => 'required|integer',
            'teacher' => 'required|string',
            'quota' => 'required|integer',
            'skill' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'event_link[1]' => 'required|string',
            'event_date[1]' => 'required|string',
            'event_time[1]' => 'required|string',
            'event_location[1]' => 'required|string',
            'event_link[2]' => 'nullable|string',
            'event_date[2]' => 'nullable|string',
            'event_time[2]' => 'nullable|string',
            'event_location[2]' => 'nullable|string',
        ]);


        $image = Helper::uploadImage($request->image, null, 'course');

        $course = new Course;
        $course->skill_id = $request->skill;
        $course->name = $request->name;
        $course->image_course = $image;
        $course->description = $request->description;
        $course->teacher = $request->teacher;
        $course->price = $request->price;
        $course->event = $request->type;
        $course->status = false;
        $course->save();

        $number = ($request->event_date[2]) ? 2 : 1;

        for ($i=1; $i <= $number; $i++) {
            $courseDetail = new course_details();
            $courseDetail->course_id = Course::orderBy('id', 'DESC')->first()->id;
            $courseDetail->link = ($request->event_link[$i]) ? $request->event_link[$i] : null;
            $courseDetail->event_date = ($request->event_date[$i]) ? $request->event_date[$i] : null;
            $courseDetail->event_time = ($request->event_time[$i]) ? $request->event_time[$i] : null;
            $courseDetail->event_location = ($request->event_location[$i]) ? $request->event_location[$i] : null;
            $courseDetail->quota = $request->quota;
            $courseDetail->save();
        }

        return redirect(route('course.index'))->with('success', 'Course baru telah berhasil ditambahkan');
    }

    public function edit($id) {
        $active = "Course";
        $course = Course::find($id);
        $skills = Skill::all();

        return view('admin.course.edit', compact('active', 'skills', 'course'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|unique:courses|max:150',
            'description' => 'required|string',
            'price' => 'required|integer',
            'teacher' => 'required|string',
            'quota' => 'required|integer',
            'skill' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $course = Course::find($id);

        $image = Helper::uploadImage($request->image, $course->image_course, 'course');

        $course->name = $request->name;
        $course->image_course = $image;
        $course->description = $request->description;
        $course->event = $request->type;
        $course->price = $request->price;
        $course->teacher = $request->teacher;
        $course->skill_id = $request->skill;
        $course->save();

        $courseDetails = course_details::where('course_id', $id)->get();

        foreach($courseDetails as $key => $courseDetail){
            $courseDetail->link = ($request->event_link[$key]) ? $request->event_link[$key] : null;
            $courseDetail->event_date = ($request->event_date[$key]) ? $request->event_date[$key] : null;
            $courseDetail->event_time = ($request->event_time[$key]) ? $request->event_time[$key] : null;
            $courseDetail->event_location = ($request->event_location[$key]) ? $request->event_location[$key] : null;
            $courseDetail->quota = $request->quota;
            $courseDetail->save();
        }


        return redirect()->back()->with('success', 'Course berhasil diperbaharui');
    }

    public function show($id){
        $active = 'Course';
        $course = Course::find($id);

        $order = course_details::whereHas('orders', function($q){
            $q->where('status', 1);
        })->where('course_id', $id)->orderBy('event_date', 'ASC')->orderBy('event_time', 'ASC')->get();

        // dd($order);
        // if ($order->isEmpty()) {
        //     dd('mbuh');
        // };

        return view('admin.course.show', compact('active', 'course', 'order'));
    }

    public function destroy($id){
        $course = Course::withCount(['orders'])->find($id);

        if($course->orders_count == 0){

            dd('oke');
            Storage::delete('/public/assets/images/course/'.$course->image_course);
            $course->delete();

            return redirect(route('course.index'))->with('success', 'Skill berhasil dihapus');
        }


        return redirect()->back()->with('error', 'Course sudah ada yang pesan');
    }
}
