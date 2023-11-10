@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="card">
   
    <div class="card-header">

      <h1 class="card-title ">{{$title}}</h1>


      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <button type="submit" class=" btn btn-info p-2 "><a href="{{route($route.'create')}}" style="color:white"><i class="fas fa-plus"></i></a></button>

      </div>


    </div>



    <div class="card-body">
    

      @yield('index_content')
    
    </div>

    <div class="card-footer clearfix">

     
      
    </div> 
</div> 


@stop



@section('js')

@stack('scripts')


@stop