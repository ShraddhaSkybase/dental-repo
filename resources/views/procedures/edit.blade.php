@extends('templates.edit')

@section("edit_content")

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{$item->name}}">
</div>


<div class="form-group">
    <label> Patient Name</label>
        <select name="user_id" id="" class="form-control">
         
            @foreach ($users as $user)
            <option   @if($user->id === $item->user_id)selected @endif value="{{$user->id}}">   {{$user->name}} </option>
          
            @endforeach

        </select>
</div>



<div class="form-group">
    <label>Service Name</label>

    <select name="service_id"  class="form-control">
    
        @foreach ($services as $service)
            <option   @if($service->id === $item->service_id)selected @endif value="{{$service->id}}">{{$service->name}} </option>
        @endforeach
    </select>
   
</div>



<div class="form-group">
    <label>Appointment Name</label>

    <select name="appointment_id"  class="form-control">
    
        @foreach ($appointments as $appointment)

            <option   @if($appointment->id === $item->appointment_id)selected @endif value="{{$appointment->id}}">{{$appointment->title}} </option>
        @endforeach
    </select>
   
</div>


<div class="form-group">
    <label>Description</label>
    <input type="text" name="description" class="form-control" value="{{$item->description}}">
</div>

<div class="form-group">
    <label>Cost (NRS)</label>
    <input type="text" name="cost" class="form-control"  value="{{$item->cost}}">
</div>
    
@endsection