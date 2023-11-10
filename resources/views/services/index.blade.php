@extends('templates.index')

@section('index_content')

<table class="table table-bordered data-table">
    <thead class="bg-dark">
    <tr>
    <th>#</th>
    <th>Name</th>
    <th>Description</th>
    <th>Cost (NRS)</th>
    <th>Duration</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
    
@endsection

@push('scripts')

<script type="text/javascript">

    $(function () {
      
      var table = $('.data-table').DataTable({

          processing: true,

          serverSide: true,

          ajax: "{{ route('services.index') }}",

          columns: [

            {data: 'DT_RowIndex', name: 'id'},

              {data: 'name', name: 'name'},

              {data: 'description', name: 'description'},

              {data: 'cost', name: 'cost'},

              {data: 'duration', name: 'duration'},

              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script>
    
@endpush