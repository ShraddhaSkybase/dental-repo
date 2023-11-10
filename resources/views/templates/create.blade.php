@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 
@stop

@section('content')

@if($errors->any())
  @foreach($errors->all() as $error)
  <div class="alert alert-danger">
    {{$error}}
  </div>
@endforeach
@endif

<div class="card">

  <div class="card-header">
    <h3 class="card-title">{{$title}}</h3>
  </div>    
   

    <div class="card-body">

      <form action="{{route($route.'store')}}" method="post" enctype="multipart/form-data">
        @csrf

     

        <div class="card-body">


        <div class="form-group">

          @yield('create_content')
       
        </div>
        
        <div class="card-footer clearfix">

          <button type="submit" class=" btn btn-info p-2 ">Submit</button>
{{-- 
          <a href="" style="color:white">Submit</a>
              --}}
         </div>
        </form>
   
    
    </div> 

</div>


    
@stop



@section('js')
    <script> console.log('Hi!'); </script>
@stop