<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();

        return view('quiz.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Module::create([
            'title' => $request->title,
        ]);

        return redirect()->route('modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        $courses = $module->courses;
        return view('quiz.modules.show', ['moduleCourses' => $courses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $modules = Module::where('id', $id)->first();
        if (!empty($modules)) {
            //dd($modules);
            return view('quiz.modules.edit', compact('modules'));
        } else {
            return redirect()->route('modules');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $data = [
            'title' => $request->title,
        ];

        $module->update($data);
        return redirect()->route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Module::where('id', $id)->delete();
        return back();
    }

    public function editCourse($id)
    {
        $modules = Module::all();
        $course = Course::where('id', $id)->first();

        return view('quiz.modules.editCourse', compact('course', 'modules'));
    }

    public function updateCourse(Request $request, Course $course)
    {
        $data = [
            'titulo' => $request->titulo,
            'topico' => $request->topico,
            'embed' => $request->embed,
            'descricao' => $request->descricao,
            'module_id' => $request->moduleId
        ];

        $course->update($data);
        return redirect()->route('modules.index');
    }

    public function destroyCourse($id)
    {

        /* Course::where('id',$id)->delete();
        return back(); */
        Course::where('id', $id)->delete();
        return back();
    }
}
