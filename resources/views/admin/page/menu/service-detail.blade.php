@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service Edit</h1>
    </div>

    @include('admin.include.flashmessage')
    <a href="{{ route('service.index') }}" class="btn btn-secondary btn-sm mb-5"><i class="fas fa-arrow-left"></i> Back</a>
    
    <form action="{{ route('service.update', $services->id) }}" method="POST" enctype='multipart/form-data'>
        @method('put')
        @csrf
        <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" value="{{ $services->title }}"  name="title" required>
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea  name="desc" id="news-create" class="form-control" id="description" cols="30" rows="10" required>{{ $services->desc }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Update</button>
    </form>
                   
         
@endsection

@push('addon-script')
<script>

</script>
@endpush