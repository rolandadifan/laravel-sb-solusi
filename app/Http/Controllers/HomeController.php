<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $project = Project::all()->count();
        $news = News::all()->count();
        $min=1;
        $max=100;
        $task = rand($min,$max);
        return view('home', [
            'project' => $project,
            'news' => $news,
            'task' => $task,
        ]);
    }
}
