<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['category'])->orderBy('created_at', 'DESC')->get();
        return view('admin.page.project.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.page.project.create', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
         try {
            $title  = $request->title;
            $slug = Str::slug($title);
            $category_id = $request->category_id;
            $description = $request->description;
            
    
            $data_projects = Project::create([
                'title' => $title,
                'slug' => $slug,
                'category_id' => $category_id,
                'desc' => $description,
            ]);

            
            foreach ($request->file('image') as $images) {
                $path = $images->store('project', 'public');
                ProjectImage::create([
                    'project_id' => $data_projects->id,
                    'image' => $path
                ]);
            }
            return redirect()->route('project.index')->with('status', 'Succesfully create project');
        } catch (Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

     public function show($id)
    {
        $project = Project::with(['category', 'gallery'])->findOrFail($id);
        $category = DB::select('select * from categories');
        return view('admin.page.project.edit')->with([
            'project' => $project,
            'category' => $category
        ]);
    }

     public function update(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);
            
                $title  = $request->title;
                $slug = Str::slug($title);
                $category_id = $request->category_id;
                $description = $request->description;   
                $project->update([
                    'title' => $title,
                    'slug' => $slug,
                    'category_id' => $category_id,
                    'desc' => $description,
                ]);
                $project->save();
                return redirect()->back()->with('status', 'Succesfully update project');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Project::findOrFail($id)->delete();
            return redirect()->route('project.index')->with('status', 'Succesfully delete project');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'image must be delete first');
        }
    }

     public function add_image(Request $request)
    {
        $product = $request->project_id;
        $check = ProjectImage::where('project_id', $product)->count();
        if($check >= 6){
            return redirect()->back()->with('error', 'Image maksimum upload 6');
        }
        foreach ($request->file('image') as $images) {
            $path = $images->store('project', 'public');
            ProjectImage::create([
                'project_id' => $product,
                'image' => $path
            ]);
        }
        return redirect()->back()->with('status', 'Succesfully add image');

    }

    public function destroy_gallery($id)
    {
        try {
            $gallery = ProjectImage::findOrFail($id);
            $file_path2 = Storage::url($gallery->image);
            $path2 = str_replace('\\', '/', public_path());
                if (file_exists($path2 . $file_path2)) {
                    unlink($path2 . $file_path2);
                }
            $gallery->delete();
            return redirect()->back()->with('status', 'Succesfully delete image');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
