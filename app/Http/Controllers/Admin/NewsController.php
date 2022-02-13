<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
     public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->get();
        return view('admin.page.news.index')->with([
            'news' => $news
        ]);
    }

    public function create()
    {
        return view('admin.page.news.create');
    }

    public function store(Request $request)
    {
        try {
            //code...
            $name = $request->name;
            $slug = Str::slug($name);
            $file = $request->file('image')->store('news', 'public');
            $description = $request->description;
    
            News::create([
                'title' => $name,
                'slug' => $slug,
                'desc' => $description,
                'image' => $file
            ]);
    
            return redirect()->route('news.index')->with('status', 'Succesfully create news');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.page.news.edit')->with([
            'news' => $news
        ]);

    }

    public function update(Request $request, $id)
    {
        try {
            //code...
            $news = News::findOrFail($id);
        if(!$request->image || $request->image == null){
            $name = $request->name;
            $slug = Str::slug($name);
            $description = $request->description;

            $news->update([
                'title' => $name,
                'slug' => $slug,
                'desc' => $description,
            ]);
            return redirect()->back()->with('status', 'Succesfully update news');
        }else if($request->file('image')){
            $file_path = Storage::url($news->image);
            $path = str_replace('\\', '/', public_path());
            if (file_exists($path . $file_path)) {
                unlink($path . $file_path);
            }
            $name = $request->name;
            $slug = Str::slug($name);
            $file = $request->file('image')->store('news', 'public');
            $description = $request->description;
            $news->update([
                'title' => $name,
                'slug' => $slug,
                'desc' => $description,
                'image' => $file
            ]);

            return redirect()->back()->with('status', 'Succesfully update news');
        }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
        

    }

    public function destroy($id)
    {
        try {
            //code...
             $news = News::findOrFail($id);
            $file_path = Storage::url($news->image);
            $path = str_replace('\\', '/', public_path());
            if (file_exists($path . $file_path)) {
                unlink($path . $file_path);
            }
            $news->delete();
            return redirect()->back()->with('status', 'Succesfully delete news');
        } catch (\Throwable $th) {
            //throw $th;
             return redirect()->back()->with('error', $th->getMessage());
        }
       


    }
}
