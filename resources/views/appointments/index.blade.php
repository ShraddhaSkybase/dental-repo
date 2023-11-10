@extends('templates.index')

@section('index_content')

<table class="table table-bordered data-table">
    <thead class="bg-dark">
    <tr>
    <th>#</th>
    <th>Title</th>
    <th>Patient Name</th>
    <th>Dentist Name</th>
    <th>Date/Time</th>
    <th>Status</th>
    <th>Notes</th>
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

          ajax: "{{ route('appointments.index') }}",

          columns: [

            {data: 'DT_RowIndex', name: 'id'},

              {data: 'title', name: 'title'},

              {data: 'user_id', name: 'user_id'},

              {data: 'dentist_id', name: 'dentist_id'},
           
              {data: 'date', name: 'date'},

              {data: 'status', name: 'status'},

              {data: 'notes', name: 'notes'},


              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script>
    
@endpush