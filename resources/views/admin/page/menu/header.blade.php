@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Header Landing</h1>
    </div>

    @include('admin.include.flashmessage')
  
    <form action="{{ route('header.update') }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Header One</label>
            <textarea class="form-control" id="name" aria-describedby="name"  name="one" required cols="30" rows="10">{{ $one->value }}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Header Two</label>
             <textarea class="form-control" id="name" aria-describedby="name"  name="two" required cols="30" rows="10">{{ $two->value }}</textarea>
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