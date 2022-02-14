<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectClientController extends Controller
{
    public function index()
    {
        $categories = Category::with(['project'])->get();
        $project = Project::with(['gallery'])->orderBy('created_at', 'DESC')->paginate(18);
        return view('page.project', [
            'categories' => $categories,
            'project' => $project,
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        $random = Project::all()->random(4);
        return view('page.project-detail', [
            'project' => $project,
            'random' => $random
        ]);
    }

    public function category(Request $request)
    {
        $id = $request->id;
        $categories = Category::with(['project'])->get();
        $project = Project::with(['gallery'])->orderBy('created_at', 'DESC')->where('category_id', $id)->paginate(18);
        return view('page.search', [
            'categories' => $categories,
            'project' => $project
        ]);
    }

}
