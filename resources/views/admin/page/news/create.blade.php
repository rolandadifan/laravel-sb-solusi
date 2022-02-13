@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">News Create</h1>
    </div>

    @include('admin.include.flashmessage')
  
    <section class="content">
      <div class="container-fluid">
        <a href="{{ route('news.index') }}" class="btn btn-secondary btn-sm mb-5"><i class="fas fa-arrow-left"></i> Back</a>
        @include('admin.include.flashmessage')
        <form action="{{ route('news.store') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name"  name="name" required>
            </div>
            <div class="form-group">
                <label for="name">Image</label>
                <input type="file" name="image" id="imgInp" class="form-control" accept="image/*" required>
                <img id="blah" src="#" width="400" height="200" class="mb-3 mt-5" alt="your image" />
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea name="description" name="description" id="news-create" class="form-control" id="description" cols="30" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Create</button>
            </div>
        </form>
      </div>
    </section>
                   
         
@endsection

@push('addon-script')
<script>
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
// ckeditor
var textarea = document.getElementById('news-create')
CKEDITOR.replace(textarea);
</script>
@endpush