@extends('layouts.app')
@section('content')
    <section id="project-detail">
        <div class="container">
            <div class="col-lg-6 mb-5" style="margin-top: 50px">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="margin-top: 20px !important;"><a href="{{ url('/') }}" style="font-size: 24px;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 24px;margin-top: 20px !important;">News</li>
                </ol>
                </nav>
            </div>

            <div>
                @forelse ($news as $item)
                <a href="{{ route('news.client.detail', $item->slug) }}" style="text-decoration: none;">
                    <div class="news-card">
                        <div class="news-card-img">
                            <img src="{{ Storage::url($item->image) }}" class="news-page-img" alt="">
                        </div>
                        <div class="news-card-detail">
                            <div class="news-page-title">{{ $item->title }}</div>
                            <div class="news-page-desc">
                                <p style="color: black;">{!! mb_strimwidth($item->desc, 0, 197, "...") !!}</p>
                            </div>
                            <div class="news-page-date"> <p style="color: black !important;">{{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y') }}</p> </div>
                        </div>
                    </div>
                </a>
                @empty
                    <h3 class="text-center">No Data Here</h3>
                @endforelse
                {{-- <a href="" style="text-decoration: none;">
                    <div class="news-card">
                        <div class="news-card-img">
                            <img src="/asset/img/berita.jpg" class="news-page-img" alt="">
                        </div>
                        <div class="news-card-detail">
                            <div class="news-page-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, sit.</div>
                            <div class="news-page-desc">
                                <p style="color: black;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, minus! Corrupti ipsum velit libero labore eveniet, dolorum sequi neque nulla aliquid quae ipsa officiis a at quidem ducimus temporibus, numquam eos? Rem magnam quis ab a est tenetur expedita...</p>
                            </div>
                            <div class="news-page-date">10 February 2020</div>
                        </div>
                    </div>
                </a>
                <a href="" style="text-decoration: none;">
                    <div class="news-card">
                        <div class="news-card-img">
                            <img src="/asset/img/berita.jpg" class="news-page-img" alt="">
                        </div>
                        <div class="news-card-detail">
                            <div class="news-page-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, sit.</div>
                            <div class="news-page-desc">
                                <p style="color: black;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, minus! Corrupti ipsum velit libero labore eveniet, dolorum sequi neque nulla aliquid quae ipsa officiis a at quidem ducimus temporibus, numquam eos? Rem magnam quis ab a est tenetur expedita...</p>
                            </div>
                            <div class="news-page-date">10 February 2020</div>
                        </div>
                    </div>
                </a>
                <a href="" style="text-decoration: none;">
                    <div class="news-card">
                        <div class="news-card-img">
                            <img src="/asset/img/berita.jpg" class="news-page-img" alt="">
                        </div>
                        <div class="news-card-detail">
                            <div class="news-page-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, sit.</div>
                            <div class="news-page-desc">
                                <p style="color: black;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, minus! Corrupti ipsum velit libero labore eveniet, dolorum sequi neque nulla aliquid quae ipsa officiis a at quidem ducimus temporibus, numquam eos? Rem magnam quis ab a est tenetur expedita...</p>
                            </div>
                            <div class="news-page-date">10 February 2020</div>
                        </div>
                    </div>
                </a> --}}
            </div>
            <div class="justify-content-center mt-5">
                {{ $news->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>

@endsection