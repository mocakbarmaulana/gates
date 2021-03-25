<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $active = 'Teacher';

        $q = $request->q;
        $teachers = Teacher::where("name", "like", "%{$q}%")
            ->orderBy("name", "ASC")
            ->paginate(10);


        return view('admin.teacher.index', compact('active', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:150',
            'email' => 'required|unique:teachers',
            'address' => 'required',
            'password' => 'required|confirmed',
        ]);

        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password,
            'status' => true,
        ]);

        return redirect()->back()->with('success', 'Akun Teacher baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = "Teacher";
        $teacher = Teacher::find($id);

        return view("admin.teacher.edit", compact('active', 'teacher'));
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
        $this->validate($request, [
            'name' => 'required|max:150',
            'email' => 'required|unique:teachers,email,' . $id,
            'address' => 'required',
            'status' => 'required',
            'password' => 'confirmed',
        ]);

        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->address = $request->address;
        $teacher->status = $request->status;
        if(!empty($request->password)) {
            $teacher->password = $request->password;
        };
        $teacher->save();

        return redirect()->back()->with('success', 'Teacher berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::withCount(['courses'])->find($id);
        if($teacher->courses_count != 0) {
            return redirect()->back()->with('error', 'Teacher sudah ada kelas yang terhubung');
        }

        Teacher::destroy($id);

        return redirect(route('teacher.index'))->with('success', 'Teacher berhasil dihapus');
    }
}
