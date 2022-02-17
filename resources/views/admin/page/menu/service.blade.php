@extends('admin.layout.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">News</h1>
    </div>

    @include('admin.include.flashmessage')
  
   <section class="content">
      <div class="container-fluid">

     <table id="table-service" class="table-responsive-md display" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $new)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $new->title }}</td>
                            <td>
                                <a href="{{ route('service.edit', $new->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
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
$('#table-service').DataTable({
    responsive: true
});
</script>
@endpush