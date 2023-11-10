@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')

<div class="card">

  <div class="card-header">
    <h3 class="card-title">{{$title}}</h3>
</div>
   
    <div class="card-body">

      
      <form action="{{route($route.'update',$item->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

     

        <div class="card-body">


        <div class="form-group">

          @yield('edit_content')
       
        </div>
        
        <div class="card-footer clearfix">

          <button type="submit" class=" btn btn-info p-2 ">Submit</a></button>
             
         </div>
        </form>


    
    </div>
</div>

    
@stop



@section('js')
    <script> console.log('Hi!'); </script>
@stop