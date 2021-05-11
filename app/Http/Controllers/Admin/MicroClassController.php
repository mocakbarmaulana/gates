<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Micro_classes;
use App\Models\Skill;
use App\Models\Subskills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MicroClassController extends Controller
{

    private $title = "Micro Class";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = "Micro Class";

        $skills = Skill::all();
        $microclasses = Micro_classes::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.micro_class.index', compact('active', 'skills', 'microclasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = $this->title;

        $skills = Skill::all();

        return view('admin.micro_class.create', compact('active', 'skills'));
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
            'name' => 'required|string|max:150|unique:micro_classes,name',
            'description' => 'required|string',
            'skill' => 'required|integer',
            'subskill' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = Helper::uploadImage($request->image, null, 'micro-class');

        Micro_classes::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'skill_id' => $request->skill,
            'subskill_id' => $request->subskill,
        ]);

        return redirect()->back()->with('success', 'Micro class baru telah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $active = $this->title;
        $microclass = Micro_classes::find($id);

        return view('admin.micro_class.show', compact('active', 'microclass'));
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
            'name' => 'required|string|max:150|unique:micro_classes,name,'.$id,
            'description' => 'required|string',
            'skill' => 'required|integer',
            'subskill' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $microclass = Micro_classes::find($id);

        $image = Helper::uploadImage($request->image, $microclass->image, 'micro-class');

        $microclass->name = $request->name;
        $microclass->description = $request->description;
        $microclass->image = $image;
        $microclass->skill_id = $request->skill;
        $microclass->subskill_id = $request->subskill;
        $microclass->save();

        return redirect()->back()->with('success', 'Micro class berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $microclass = Micro_classes::find($id);

        Storage::delete('/public/assets/images/micro-class/'.$microclass->image);

        $microclass->delete();

        return redirect()->back()->with('success', 'Micro class berhasil dihapus');
    }
}
