<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Project;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index()
    {
        $header_one = Menu::where('key', 'header_one')->first();
        $header_two = Menu::where('key', 'header_two')->first();
        $about = Menu::where('key', 'about')->first();
        $visi = Menu::where('key', 'visi')->first();
        $misi = Menu::where('key', 'misi')->first();
        $image_about = Menu::where('key', 'image_about')->first();

        $province = DB::select('select * from province');


        $project = Project::with(['gallery'])->orderBy('created_at', 'DESC')->limit(6)->get();
        $news = News::orderBy('created_at', 'DESC')->limit(4)->get();
        return view('welcome', [
            'header_one' => $header_one,
            'header_two' => $header_two,
            'about' => $about,
            'visi' => $visi,
            'misi' => $misi,
            'image_about' => $image_about,
            'project' => $project,
            'news' => $news,
            'province' => $province,
        ]);
    }
}
