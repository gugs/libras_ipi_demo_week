<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Curso;
use App\Models\Module;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class CourseController extends Controller
{
  public function index(Module $module)
  {
    //
  }

  public function create()
  {
    $modules = Module::all();
    return view('courses.create', compact('modules'));
  }


  public function store(Request $request)
  {
    Course::create([
      'titulo' => $request->titulo,
      'topico' => $request->topico,
      'embed' => $request->embed,
      'descricao' => $request->descricao,
      'module_id' => $request->moduleId
    ]);

    return redirect()->route('modules.index');
  }

  public function show(Module $module)
  {
    //
    $courses = $module->courses;
    return view('course', ['moduleCourses' => $courses]);
  }


  public function edit($id)
  {
    //
  }

  public function update(Request $request, Course $course)
  {

    $data = [
      'titulo' => $request->titulo,
      'topico' => $request->topico,
      'embed' => $request->embed,
      'descricao' => $request->descricao,
    ];

    $course->update($data);
    return redirect()->route('modules.index');
  }


  public function destroy($id)
  {
    Course::where('id', $id)->delete();
    return redirect()->route('modules.index');
  }
}
