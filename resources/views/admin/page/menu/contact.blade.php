@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contact</h1>
    </div>

    @include('admin.include.flashmessage')
  
    <form action="{{ route('contact.update') }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control" value="{{ $address->value }}" id="name" aria-describedby="name"  name="address" required>
        </div>
        <div class="form-group">
            <label for="name">Phone</label>
            <input type="text" class="form-control" value="{{ $phone->value }}" id="name" aria-describedby="name"  name="phone" required>
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" value="{{ $email->value }}" id="name" aria-describedby="name"  name="email" required>
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