@extends('layouts.app')
@section('content')
    
     <div class="prodoct-content">
            <div class="product-list mt-5">
                <div class="container">
                    <div class="col-lg-6 mb-5">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" style="margin-top: 20px !important;"><a href="{{ url('/') }}" style="font-size: 24px;">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="font-size: 24px;margin-top: 20px !important;">Project</li>
                        </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-4 recomend">
                            <div class="display-website">
                                    <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="pc-title-content">Category</h5>
                                        </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             <ul class="list-group">
                                                 @forelse ($categories as $ctg)
                                                <form action="{{ url('/project/search/category') }}" method="get">
                                                    <input type="hidden" name="id" value="{{ $ctg->id }}">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <button type="submit" style="border: none; background:none" class="ctg-all">{{ $ctg->name }}</button>
                                                    <span class="badge" style="color: black">({{ count($ctg->project) }})</span>
                                                    </li>
                                                </form>
                                                @empty
                                                    <h3 class="text-center">belum ada data</h3>
                                                @endforelse
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                              
                            <div class="display-mobile">
                                <form action="">
                                    <label for="exampleDataList" class="form-label">Category</label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                        @forelse ($categories as $ctgs)
                                            <option value="{{ $ctgs->name }}">
                                        @empty
                                        <option value="no data here" disabled>
                                        @endforelse
                                    </datalist>

                                    <div class="text-center mt-3">
                                        <p>
                                            <button class="btn btn-search btn-filter">Find Category</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                        <div class="col-md-8">
                            <div class="filter-section">
                                <div class="col-sm-12" >
                                    <form action="{{url('/search') }}" method="get">
                                        <div class="input-group">
                                        <input id="table_filter" type="text" placeholder="cari product anda" class="form-control search-input" aria-label="Text input with segmented button dropdown" name="q">
                                        <div class="input-group-btn" >
                                        <button id="searchBtn" type="submit" class="btn btn-search btn-filter"><span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Search</span></button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                @forelse ($project as $item)
                                <div class="col-md-4 col-sm-6">
                                    <div class="project-card">
                                        <a href="{{ route('project.client.detail', $item->slug) }}">
                                            <img src="{{ !$item->gallery[0]->image  ? asset("asset/img/p1.jpg") : Storage::url($item->gallery[0]->image) }}" class="project-img" alt="">
                                            <div class="project-title">{{ mb_strimwidth($item->title, 0, 25,"...") }}</div>
                                        </a>
                                        <div class="project-date">{{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y') }}</div>
                                    </div>
                                </div>
                                @empty
                                    <h3 class="text-center">No Data Here</h3>
                                @endforelse
                            </div>
                            <div style="margin-top: 100px">
                                {{ $project->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
