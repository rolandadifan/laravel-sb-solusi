@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
    </div>

    @include('admin.include.flashmessage')
     <a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm mb-5"><i class="fas fa-arrow-left"></i> Back</a>
    <form action="{{ route('category.update', $data->id) }}" method="POST">
        @method('put')
            @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" value="{{ $data->name }}" name="name" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
   
                   
         
@endsection

@push('addon-script')

@endpush