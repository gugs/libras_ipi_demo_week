<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $userId = Auth::user()->id;
        $moduleId = $request->input('moduleId');
        $completed = 1;


        Subscription::create([
            'user_id' => $userId,
            'module_id' => $moduleId,
            'completed' => $completed,
        ]);

        return redirect()->route('course-module', $moduleId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modules = Module::all();
        $quizzes = Quiz::all();
        $courses = Course::all();
        if (!$user = User::find($id)) //if para caso o usuário n exista
            return back();

        $progressModules = round(($user->subscriptions->count()/$modules->count())*100,1);
        $progressCourses = round(($user->subscriptionsCourses->count()/ $courses->count())* 100,1);
        $progressQuizzes = round(($user->subscriptionsQuizzes->count()/$quizzes->count())*100,1);
        $totalProgress = round(($progressModules + $progressCourses + $progressQuizzes)/3,1);
        return view('teste', compact('user', 'courses', 'quizzes','progressModules', 'progressCourses', 'progressQuizzes', 'totalProgress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
