@extends('layouts.app')
@section('content')
@include('sweetalert::alert')

    <section id="home">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1 class="text-white display-4">{{ $header_one->value }}</h1>
                    <p class="text-white">{{ $header_two->value }}</p>
                    <a href="#contact" class="btn btn-brand">Contact</a>
                </div>
            </div>
        </div>
    </section>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro">
                    <h1>Our Service</h1>
                    <div class="hline"></div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-sm-6 p-4">
                    <div class="icon-box">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4 class="title-sm mt-4">Graphic Designing</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate non iste dignissimos dolorem. Dolorem a impedit magnam modi officiis!</p>
                </div>
                <div class="col-lg-4 col-sm-6 p-4">
                    <div class="icon-box">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h4 class="title-sm mt-4">Graphic Designing</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate non iste dignissimos dolorem. Dolorem a impedit magnam modi officiis!</p>
                </div>
                <div class="col-lg-4 col-sm-6 p-4">
                    <div class="icon-box">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h4 class="title-sm mt-4">Graphic Designing</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate non iste dignissimos dolorem. Dolorem a impedit magnam modi officiis!</p>
                </div>
                <div class="col-lg-4 col-sm-6 p-4">
                    <div class="icon-box">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="title-sm mt-4">Graphic Designing</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate non iste dignissimos dolorem. Dolorem a impedit magnam modi officiis!</p>
                </div>
                <div class="col-lg-4 col-sm-6 p-4">
                    <div class="icon-box">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4 class="title-sm mt-4">Graphic Designing</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate non iste dignissimos dolorem. Dolorem a impedit magnam modi officiis!</p>
                </div>
                <div class="col-lg-4 col-sm-6 p-4">
                    <div class="icon-box">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="title-sm mt-4">Graphic Designing</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate non iste dignissimos dolorem. Dolorem a impedit magnam modi officiis!</p>
                </div>
            </div>
        </div>
    </section>

    <section id="project" class="row g-0">
        @forelse ($project as $proj)
        <div class="col-lg-4 col-sm-6">
            <div class="project-item">
                <img src="{{ !$proj->gallery[0]->image  ? asset("asset/img/p1.jpg") : Storage::url($proj->gallery[0]->image) }}" alt="">
                <div class="project-overlay">
                    <a href="{{ route('project.client.detail', $proj->slug) }}" style="text-decoration: none" class="project-to-detail">
                        <div>
                            <h3>{{ mb_strimwidth($proj->title, 0, 20,"...") }}</h3>
                            <h6>{{ \Carbon\Carbon::parse($proj->created_at)->format('j F, Y') }}</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @empty
            <h3 class="text-center">No Data Here</h3>
        @endforelse
    </section>

    <section id="cta-project" class="py-5">
        <div class="container py-4">
            <div class="row  justify-content-center">
                <div class="d-flex justify-content-center">
                    <h3 class="text-white">Find More Project</h3>
                    <a href="{{ route('project.client') }}" class="btn btn-light ms-3" style="margin-top: -8px;">Here</a>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro">
                    <h1>About US</h1>
                    <div class="hline"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <p>&nbsp; &nbsp; {{ $about->value }}</p>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h3>VISI</h3>
                            <p>{{ $visi->value }}</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Misi</h3>
                            <p>{{ $misi->value }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-img">
                        <img src="{{ $image_about->value === 'no pic' ?  asset("asset/img/about.jpg") : Storage::url($image_about->value) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro">
                    <h1>News</h1>
                    <div class="hline"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="row">
                    @forelse ($news as $new)
                    <div class="col-md-3 mt-2 col-6">
                        <a href="{{ route('news.client.detail', $new->slug) }}">
                            <img src="{{ Storage::url($new->image) }}" class="img-news" alt="">
                            <div class="news-date">{{ \Carbon\Carbon::parse($new->created_at)->format('j F, Y') }}</div>
                            <div class="news-desc">{{ $new->title }}</div>
                        </a>
                    </div>
                    @empty
                        <h3 class="text-center">No data here</h3>
                    @endforelse
                </div>
            </div>
            <div class="container mt-5">
                <a href="{{ route('news.client') }}">
                    <h5 class="news-to-lainya">Lainnya...</h5>
                </a>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
             <div class="row">
                <div class="col-12 section-intro">
                    <h1>Contact US</h1>
                    <div class="hline"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <img src="asset/img/cntct.jpg" class="img-contact" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <form action="{{ url('/send-mail') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" aria-describedby="phone" name="phone">
                        </div>
                         <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" class="form-select" name="country">
                                @foreach ($province as $prov)
                                    <option value="{{ $prov->name }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="mb-3">
                            <label for="country" class="form-label">Message</label>
                            <textarea name="message" id="" class="form-control" cols="20" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-brand">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="cta" class="py-5">
        <div class="container py-4">
            <div class="row  justify-content-center">
                <div class="col-md-5">
                    <h3 class="text-white">Lets build something great</h3>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-light">Get Started</a>
                </div>
            </div>
        </div>
    </section>

@endsection