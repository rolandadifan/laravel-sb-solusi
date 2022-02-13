@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Projects</h1>
    </div>

    @include('admin.include.flashmessage')
  
   <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" id="name" aria-describedby="name"  name="title" required>
        </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                @foreach($category as $ctg)
                    <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <textarea name="description" id="pjs" class="form-control" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="name">Image</label>
            <input type="file" name="image[]" id="gallery-photo-add" class="form-control" accept="image/*" multiple required>
            <small id="emailHelp" class="form-text text-muted">can input more then 1</small>
            <div class="gallery"></div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Create</button>
   </form>
                   
         
@endsection

@push('addon-script')
<script>
    var textarea = document.getElementById('pjs')
  CKEDITOR.replace(textarea);

  $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img width="400" height="200">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
  
</script>
@endpush