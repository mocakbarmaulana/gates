<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Subskills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'Skill';

        $skills = Skill::orderBy('name', 'ASC')->paginate(10);

        return view('admin.skill.skill', compact('active', 'skills'));

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
            'skill' => 'required|string|max:50|unique:skills,name',
        ]);

        $request->request->add(['slug' => $request->skill]);

        Skill::create([
            'name' => $request->skill,
            'slug' => $request->slug,
        ]);

        return redirect(route('skill.index'))->with('success', 'Skill baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $active = 'Skill';
        $skill = Skill::find($id);
        $subskills = Subskills::where('skill_id', $skill->id)->paginate(10);

        return view('admin.skill.show', compact( 'active', 'skill', 'subskills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = 'Skill';

        $skills = Skill::orderBy('name', 'ASC')->paginate(10);
        $skill = Skill::find($id);

        return view('admin.skill.edit', compact('active', 'skill', 'skills'));
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
            'skill' => 'required|string|max:50|unique:skills,name,' . $id,
        ]);

        $course = Skill::withCount(['courses'])->find($id);

        if($course->courses_count != 0 && $request->status == 0){
            return redirect()->back()->with('error', 'Skill sedang digunakan');
        }

        $request->request->add(['slug' => $request->skill]);

        $skill = Skill::find($id);
        $skill->name = $request->skill;
        $skill->slug = $request->slug;
        $skill->save();

        return redirect()->back()->with('success', 'Skill berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Skill::withCount(['courses'])->find($id);

        if($course->courses_count == 0){
            $course->delete();

            return redirect(route('skill.index'))->with('success', 'Skill berhasil dihapus');
        }

       return redirect()->back()->with('error', 'Skill sedang digunakan');
    }

    public function getskillsub($id)
    {
        $subskill = Subskills::where('skill_id', $id)->orderBy('id', 'ASC')->get();

        return json_encode($subskill);
    }
}
