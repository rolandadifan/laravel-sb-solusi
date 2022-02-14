<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('asset/img/press start.png') }}" style="width: 130px; height: 100px;" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ !(request()->is('/') ? '' : 'active') }}" href="{{ (!request()->is('/') ? url('/') : '#home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ (!request()->is('/') ? url('/#service') : '#service') }}">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('project') ? 'active' : '') }}" href="#project">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ (!request()->is('/') ? url('/#about') : '#about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ (!request()->is('/') ? url('/#news') : '#news') }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ (!request()->is('/') ? url('/#contact') : '#contact') }}">Contact</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>