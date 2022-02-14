<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsClientController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->paginate(10);
        return view('page.news', ['news' => $news]);
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        $random = News::all()->random(4);
        return view('page.news-detail', [
            'news' => $news,
            'random' => $random
        ]);
    }
}
