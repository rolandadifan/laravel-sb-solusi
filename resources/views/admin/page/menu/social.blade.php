@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Social Media</h1>
    </div>

    @include('admin.include.flashmessage')
  
    <form action="{{ route('social.update') }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Linkedin</label>
            <input type="text" class="form-control" value="{{ $linkedin->value }}" id="name" aria-describedby="name"  name="linkedin" required>
        </div>
        <div class="form-group">
            <label for="name">Whatssapp</label>
            <input type="text" class="form-control" value="{{ $wa->value }}" id="name" aria-describedby="name"  name="wa" required>
        </div>
        <div class="form-group">
            <label for="name">Instagram</label>
            <input type="text" class="form-control" value="{{ $ig->value }}" id="name" aria-describedby="name"  name="ig" required>
        </div>
        <div class="form-group">
            <label for="name">Youtube</label>
            <input type="text" class="form-control" value="{{ $yt->value }}" id="name" aria-describedby="name"  name="yt" required>
        </div>
        <button class="btn btn-md btn-primary">Update</button>
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