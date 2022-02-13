@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">About</h1>
    </div>

    @include('admin.include.flashmessage')

    <form action="{{ route('img.update') }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('put') 
        <img src="{{ $image_about->value == 'no pic' ? asset("img/about.jpg") : Storage::url($image_about->value) }}" class="mb-2" width="200" heigh="200" alt="">
        <input type="file"  class="form-control" accept="image/*" style="width: 600px"  name="image_about" id="img_about">
        <button class="btn btn-md btn-primary mb-3 mt-3">Update Image</button>
    </form>

    <img id="blah_about" src="#" width="400" height="200" class="mb-3 mt-5" alt="your image" />
  
    <form action="{{ route('about.update') }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">About</label>
             <textarea class="form-control" id="name" aria-describedby="name"  name="about" required cols="30" rows="10">{{ $about->value }}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Misi</label>
             <textarea class="form-control" id="name" aria-describedby="name"  name="visi" required cols="30" rows="10">{{ $visi->value }}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Visi</label>
             <textarea class="form-control" id="name" aria-describedby="name"  name="misi" required cols="30" rows="10">{{ $misi->value }}</textarea>
        </div>
        <button class="btn btn-md btn-primary mb-5">Update</button>
    </form>
         
@endsection

@push('addon-script')

<script>
img_about.onchange = evt => {
  const [file] = img_about.files
  if (file) {
    blah_about.src = URL.createObjectURL(file)
  }
}

</script>
@endpush