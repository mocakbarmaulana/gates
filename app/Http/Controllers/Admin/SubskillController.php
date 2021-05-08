<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subskills;
use Illuminate\Http\Request;

class SubskillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' => 'required|string|max:50|unique:subskills,name',
        ]);

        $request->request->add(['slug' => $request->name]);

        Subskills::create($request->except('_token'));

        return redirect()->back()->with('success', 'subskill berhasil ditambahkan');
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
        //
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
            'subskills' => 'required|string|max:50|unique:subskills,name,'.$id,
        ]);

        $request->request->add(['slug' => $request->subskills]);

        $subskills = Subskills::find($id);
        $subskills->name = $request->subskills;
        $subskills->slug = $request->slug;
        $subskills->save();

        return redirect()->back()->with('success', 'subskill berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subskills::destroy($id);

        return redirect()->back()->with('success', 'subskill berhasil dihapus');
    }
}
