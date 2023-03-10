<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $frequentUsers = User::limit(5)->get();
        $modules = Module::all();
        $frequentModules = Module::limit(5)->get();
        $courses = Course::all()->count();
        $quizzes = Quiz::all()->count();
        $subscribes = Subscription::all()->count();

      /*   $x = (2 / $modules)*100;
 */
        ;
        
        return view('admin.index', compact('users', 'frequentUsers', 'modules', 'frequentModules', 'courses', 'quizzes'));
    }

    public function showUsers(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
