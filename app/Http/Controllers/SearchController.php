<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class SearchController extends Controller
{
     public function project(Request $request)
    {
        $name = $request->q;
        $categories = Category::with(['project'])->get();
        $project = Project::where('title','LIKE', '%'.$name.'%')->with(['gallery'])->paginate(18);
        return view('page.search', [
            'categories' => $categories,
            'project' => $project
        ]);
    }
}
