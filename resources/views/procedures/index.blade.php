@extends('templates.index')

@section('index_content')

<table class="table table-bordered data-table">
    <thead class="bg-dark">
    <tr>
    <th>#</th>
    <th>Name</th>
    <th>Patient Name</th>
    <th>Service Name</th>
    <th>Appointment</th>
    <th>Description</th>
    <th>Cost</th>
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

          ajax: "{{ route('procedures.index') }}",

          columns: [

            {data: 'DT_RowIndex', name: 'id'},

              {data: 'name', name: 'name'},

              {data: 'user_id', name: 'user_id'},

              {data: 'service_id', name: 'service_id'},

              {data: 'appointment_id', name: 'appointment_id'},

              {data: 'description', name: 'description'},

              {data: 'cost', name: 'cost'},


              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script>
    
@endpush