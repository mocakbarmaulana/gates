<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class LearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $active = "Learner";

        $q = $request->q;
        $students = Student::where("name", "like", "%{$q}%")
                            ->orderBy("name", "ASC")
                            ->paginate(10);

        return view('admin.learner.index', compact('active', 'students'));
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
            'name' => 'required|string|max:150',
            'email' => 'required|unique:students',
            'phone_number' => 'required|integer',
            'address' => 'required|string|max:250',
            'password' => 'required|confirmed|min:8',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->address = $request->address;
        $student->password = $request->password;
        $student->status = true;
        $student->save();

        return redirect()->back()->with('success', 'Learner baru berhasil ditambahkan');
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
        $active = 'Learner';
        $student = Student::find($id);

        return view('admin.learner.edit', compact('active', 'student'));
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
            'name' => 'required|string|max:150',
            'email' => 'required|unique:students,email,' . $id,
            'phone_number' => 'required|integer',
            'address' => 'required|string|max:250',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->address = $request->address;
        if(!empty($request->password)) {
            $student->password = $request->password;
        };
        $student->save();

        return redirect()->back()->with('success', 'Learner berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
