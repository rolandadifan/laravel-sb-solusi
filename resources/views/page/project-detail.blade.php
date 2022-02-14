@extends('layouts.app')
@section('content')
    <section id="project-detail">
        <div class="container">
            <div class="col-lg-6 mb-5" style="margin-top: 50px">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/project') }}">Project</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project Detail</li>
                </ol>
                </nav>
            </div>

            <div>
                <div id="main-slider" class="splide">
                    <div class="splide__track">
                            <ul class="splide__list">
                                @forelse ($project->gallery as $image)
                                <li class="splide__slide">
                                    <img src="{{  !$image->image ? asset('asset/img/p1.jpg') : Storage::url($image->image) }}" class="project-img-detail">
                                </li>
                                @empty
                                     <li class="splide__slide">
                                        <img src="{{ asset('asset/img/p1.jpg') }}" class="project-img-detail">
                                    </li>
                                @endforelse
                            </ul>
                    </div>
                </div>
               <div id="thumbnail-slider" class="splide">
                    <div class="splide__track">
                            <ul class="splide__list">
                                @forelse ($project->gallery as $image)
                                     <li class="splide__slide">
                                        <img src="{{  !$image->image ? asset('asset/img/p1.jpg') : Storage::url($image->image) }}">
                                    </li>
                                @empty
                                     <li class="splide__slide">
                                        <img src="{{ asset('asset/img/p1.jpg') }}">
                                    </li>
                                @endforelse
                            </ul>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="mt-5">{{ $project->title }}</h2>
                <p class="detail-date">{{ \Carbon\Carbon::parse($project->created_at)->format('j F, Y') }}</p>
                <p class="mt-3 detail-desc">{!! $project->desc !!}</p>
            </div>
        </div>
    </section>

    <section id="more-project">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro">
                    <h1>Other Project</h1>
                    <div class="hline"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="row">
                    @forelse ($random as $item)
                    <div class="col-md-3 mt-2 col-6">
                        <a href="{{ route('project.client.detail', $item->slug) }}" class="more-project" style="text-decoration: none; color: black;">
                            <img src="{{ !$item->gallery[0]->image  ? asset("asset/img/p1.jpg") : Storage::url($item->gallery[0]->image) }}" class="img-news" alt="">
                            <div class="project-title">{{ $item->title }}</div>
                        </a>
                    </div>
                    @empty
                        <h3 class="text-center">No Data Here</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection