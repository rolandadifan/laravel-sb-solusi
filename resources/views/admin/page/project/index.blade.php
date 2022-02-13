@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Projects</h1>
    </div>

    @include('admin.include.flashmessage')
  
   <section class="content">
      <div class="container-fluid">
      <a href="{{route('project.create')}}" class="btn btn-primary btn-sm px-5 py-1 mb-3">Create</a>

      <table id="table-project" class="table-responsive-md display" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Create On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $item)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y') }}</td>
                            <td>
                                <a href="{{ route('project.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <form action="{{ route('project.destroy', $item->id) }}" class="d-inline" method="POST">
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
$('#table-project').DataTable({
    responsive: true
});
</script>
@endpush