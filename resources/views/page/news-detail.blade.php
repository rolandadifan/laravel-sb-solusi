@extends('layouts.app')
@section('content')
    <section id="project-detail">
        <div class="container">
            <div class="col-lg-6 mb-5" style="margin-top: 50px">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/news') }}">News</a></li>
                    <li class="breadcrumb-item active" aria-current="page">News Detail</li>
                </ol>
                </nav>
            </div>

            <div class="img-news-detail">
                <img src="/asset/img/berita.jpg" width="400" height="350" alt="">
            </div>

            <div>
                <h2 class="mt-5">{{ $news->title }}</h2>
                <p class="detail-date">{{ \Carbon\Carbon::parse($news->created_at)->format('j F, Y') }}</p>
                <p class="mt-3 detail-desc">{!! $news->desc !!}</p>
            </div>
        </div>
    </section>

    <section id="more-project">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro">
                    <h1>Other News</h1>
                    <div class="hline"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="row">
                    @forelse ($random as $item)
                    <div class="col-md-3 mt-2 col-6">
                        <a href="{{ route('news.client.detail', $item->slug) }}" class="more-project" style="text-decoration: none; color: black;">
                            <img src="{{ Storage::url($item->image) }}" class="img-news" alt="">
                            <div class="project-title">{{ $item->title }}</div>
                        </a>
                    </div>
                    @empty
                        <h3 class="text-center">No Data Here</h3>
                    @endforelse
                    {{-- <div class="col-md-3 mt-2 col-6">
                        <a href="#" class="more-project" style="text-decoration: none; color: black;">
                            <img src="asset/img/berita.jpg" class="img-news" alt="">
                            <div class="project-title">Project Title</div>
                        </a>
                    </div>
                    <div class="col-md-3 mt-2 col-6">
                       <a href="#" class="more-project" style="text-decoration: none; color: black;">
                            <img src="asset/img/berita.jpg" class="img-news" alt="">
                            <div class="project-title">Project Title</div>
                        </a>
                    </div>
                    <div class="col-md-3 mt-2 col-6">
                        <a href="#" class="more-project" style="text-decoration: none; color: black;">
                            <img src="asset/img/berita.jpg" class="img-news" alt="">
                            <div class="project-title">Project Title</div>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection