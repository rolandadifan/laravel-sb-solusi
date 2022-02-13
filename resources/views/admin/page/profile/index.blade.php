@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    @include('admin.include.flashmessage')
   <form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input id="name" value="{{ auth()->user()->name }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class=" mb-3">
            <label for="email" class="form-labe">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" value="{{ auth()->user()->email }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-labe">{{ __('phone') }}</label>

            <div class="col-md-6">
                <input id="phone" value="{{ auth()->user()->phone }}" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
          <div class="mb-3">
            <label for="address" class="form-labe">{{ __('address') }}</label>

            <div class="col-md-6">
                <input id="address" value="{{ auth()->user()->address }}" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-labe">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
                   
         
@endsection