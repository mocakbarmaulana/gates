<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\course_details;
use App\Models\Order;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = "Class";

        $id = Auth::guard('expert')->id();

        $courses = Course::all()->where('teacher_id', $id);

        return view('expert.class.class', compact('active', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = "Class";
        $skills = Skill::all();

        return view('expert.class.create', compact('active', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:courses|max:150',
            'description' => 'required|string',
            'price' => 'required|integer',
            'skill' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $this->uploadImage($request->image, null);

        $course = new Course;
        $course->name = $request->name;
        $course->image_course = $image;
        $course->teacher_id = Auth::guard('expert')->user()->id;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->skill_id = $request->skill;
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
            $courseDetail->quota = ($request->event_quota[$i]) ? $request->event_quota[$i] : null;
            $courseDetail->save();
        }

        return redirect(route('expert.class'))->with('success', 'Course baru telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        if(Auth::guard('expert')->id() != $course->teacher_id){
            return redirect()->back();
        }

        $detailcourse = course_details::where('course_id', $id)->get();
        // $order = Order::where('status', 1)->where('course_id', $id)->get();

        $order = course_details::whereHas('orders', function($q){
            $q->where('status', 1);
        })->where('course_id', $id)->orderBy('event_date', 'ASC')->orderBy('event_time', 'ASC')->get();

        //  dd($order->isEmpty());


        return view('expert.class.detail', compact('course', 'detailcourse', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = "Class";
        $idExpert = Auth::guard('expert')->id();
        $courses = Course::all();

        if(empty($courses->where('teacher_id', $idExpert)->where('id', $id)->count())){
            return redirect(route('expert.class'));
        }

        $course = $courses->find($id);
        $skills = Skill::all();

        return view('expert.class.edit', compact('active', 'skills', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->skill);
        $this->validate($request, [
            'name' => 'required|max:150|unique:courses,name,'.$id,
            'description' => 'required|string',
            'skill' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $course = Course::find($id);

        $image = $this->uploadImage($request->image, $course->image_course);

        $course->name = $request->name;
        $course->image_course = $image;
        $course->description = $request->description;
        $course->event = $request->type;
        $course->price = $request->price;
        $course->skill_id = $request->skill;
        $course->save();

        $courseDetails = course_details::where('course_id', $id)->get();

        foreach($courseDetails as $key => $courseDetail){
            $courseDetail->link = ($request->event_link[$key]) ? $request->event_link[$key] : null;
            $courseDetail->event_date = ($request->event_date[$key]) ? $request->event_date[$key] : null;
            $courseDetail->event_time = ($request->event_time[$key]) ? $request->event_time[$key] : null;
            $courseDetail->event_location = ($request->event_location[$key]) ? $request->event_location[$key] : null;
            $courseDetail->quota = ($request->event_quota[$key]) ? $request->event_quota[$key] : null;
            $courseDetail->save();
        }


        return redirect(route('expert.class.edit', $id))->with('success', 'Course berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        Storage::delete('/public/assets/images/course/'.$course->image_course);

        $course->delete();

        return redirect(route('expert.class'))->with('success', 'Course berhasil dihapus');
    }


    // Function upload image
    public function uploadImage($imgProduct, $imageDB){
        $imageName = $imageDB;
        if(!empty($imgProduct)){

            $imageName = md5(time() . '.' . $imgProduct->extension());

            Storage::putFileAs(
                'public/assets/images/course',
                $imgProduct,
                $imageName,
            );

            if ($imageDB != null) {
                Storage::delete('/public/assets/images/course/'.$imageDB);
            }

        }
        return $imageName;
    }
}