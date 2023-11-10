@extends('templates.index')

@section('index_content')


<table class="table table-bordered data-table">
    <thead class="bg-dark">
    <tr>
    <th>#</th>
    <th>Patient Name</th>
    <th>Name</th>
    <th>Types</th>
    <th>X-Ray</th>
    <th>Condition</th>
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

          // ajax: "{{ route('teeths.index') }}",

          columns: [

            {data: 'DT_RowIndex', name: 'id'},

            {data: 'user_id', name: 'user_id'},

            {data: 'name', name: 'name'},

            {data: 'type_id', name: 'type_id'},

           

                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            if (data) {
                                return '<img src="' + data +
                                '" alt="Image" width="50" height="50">';
                            } 
                        },
                    },

              // {data: 'x_ray', name: 'x_ray'},

              {data: 'condition', name: 'condition'},

              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
</script>
    
@endpush
