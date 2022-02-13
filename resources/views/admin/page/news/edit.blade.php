@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">News Edit</h1>
    </div>

    @include('admin.include.flashmessage')
    <a href="{{ route('news.index') }}" class="btn btn-secondary btn-sm mb-5"><i class="fas fa-arrow-left"></i> Back</a>
    
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype='multipart/form-data'>
        @method('put')
        @csrf
        <img src="{{ Storage::url($news->image) }}" widht="400" height="200" class="mb-5" alt="">
        <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" value="{{$news->title}}"  name="name" required>
            </div>
        <div class="form-group">
                <label for="name">Image</label>
                <input type="file" name="image" id="imgInp" class="form-control" accept="image/*">
                <img id="blah" src="#" width="400" height="200" class="mb-3 mt-5" alt="your image" />
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea name="description" name="description" id="news-create" class="form-control" id="description" cols="30" rows="10" required>{!! $news->desc !!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Update</button>
    </form>
                   
         
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