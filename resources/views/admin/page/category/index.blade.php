@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
    </div>

    @include('admin.include.flashmessage')
  
   <section class="content">
      <div class="container-fluid">
      <button type="button" class="btn btn-primary mb-3 pl-5 pr-5" data-toggle="modal" data-target="#exampleModal">
         create
      </button>
      @include('admin.page.category.create')

      <table id="table-category" class="table-responsive-md display" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $ctg)
                      <tr>
                          <td>{{  $loop->iteration  }}</td>
                          <td>{{ $ctg->name }}</td>
                          <td>
                              <a href="{{ route('category.show', $ctg->id) }}" class="btn btn-warning btn-sm">
                                  <i class="fas fa-fw fa-edit"></i>
                              </a>
                              <form action="{{ route('category.destroy', $ctg->id) }}" class="d-inline" method="POST">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm">
                                      <i class="fas fa-fw fa-trash"></i>
                                  </button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
      </div>
    </section> 
                   
         
@endsection

@push('addon-script')
<script>
// data table
$('#table-category').DataTable({
    responsive: true
});
</script>
@endpush