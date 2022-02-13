@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Projects Edit</h1>
        <form action="{{ route('project.destroy', $project->id) }}" class="d-inline" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">
                Delete Project
            </button>
        </form>
    </div>

    @include('admin.include.flashmessage')
    <a href="{{ route('project.index') }}" class="btn btn-secondary btn-sm mb-5"><i class="fas fa-arrow-left"></i> Back</a>
  
   <form action="{{ route('project.update', $project->id) }}" method="POST" >
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" value="{{$project->title}}"  name="title" required>
        </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                <option value="{{ $project->category->id }}">{{ $project->category->name }}</option>
                @foreach($category as $ctg)
                    <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <textarea name="description"  id="project-edits" class="form-control"  cols="30" rows="10" required>{{$project->desc ?? ''}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Create</button>
   </form>

    <form action="{{ route('project.gallery.create') }}" method="post" enctype='multipart/form-data' class="mt-5 mb-2">
        @csrf
        <h3>Image Project</h3>
        <input type="hidden" value="{{$project->id}}" name="project_id">
        <div class="row">
            <div class="col-md-8">
            <div class="form-group">
                <input type="file" name="image[]" id="gallery-photo-adds" class="form-control" accept="image/*" multiple required>
                <small id="emailHelp" class="form-text text-muted">can input more then 1</small>
                <div class="gallerys"></div>
            </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" >Add</button>
            </div>
        </div>
    </form>

    <div class="mt-3 mb-3">
        <div class="row">
        @forelse($project->gallery as $gallerys)
        <div class="col-lg-3 col-sm-4">
            <img src="{{ Storage::url($gallerys->image) ?? '' }}" width="300" height="200" class="mb-2" alt="">
            <form action="{{ route('project.gallery.destroy', $gallerys->id) }}" method="post">
                @method('delete')
                @csrf
                <div class="delete-image">
                <button type="submit" class="button-delete-gallery">x</button>
                </div>
            </form>
        </div>
        @empty
        <div><h5>no image here</h5></div>
        @endforelse
        </div>
    </div>
                   
         
@endsection

@push('addon-script')
<script>
    var textarea = document.getElementById('project-edits')
  CKEDITOR.replace(textarea);

  $(function() {
    // Multiple images preview in browser
    var imagesPreviews = function(input, placeToInsertImagePreview) {
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
    $('#gallery-photo-adds').on('change', function() {
        imagesPreviews(this, 'div.gallerys');
    });
});
      thumbnails.onchange = evt => {
        const [file] = thumbnails.files
        if (file) {
          Thumbanailss.src = URL.createObjectURL(file)
        }
      }
</script>
@endpush