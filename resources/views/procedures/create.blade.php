@extends('templates.create')

@section('create_content')

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name">
</div>


<div class="form-group">
    <label> Patient Name</label>
        <select name="user_id" id="" class="form-control">
            <option value=""> --Select Patient-- </option>
            @foreach ($users as $user)

            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>
</div>


<div class="form-group">

    <label>Service Name</label>

    <select name="service_id"  class="form-control">

        <option value=""> --Select Service-- </option>

        @foreach ($services as $service)
             <option value="{{$service->id}}">{{$service->name}} </option>
        @endforeach

    </select>
</div>


<div class="form-group">

    <label>Appointment</label>

    <select name="appointment_id"  class="form-control">

        <option value=""> --Select Appointment-- </option>

        @foreach ($appointments as $appointment)

             <option value="{{$appointment->id}}">{{$appointment->title}} </option>
             
        @endforeach

    </select>
</div>

<div class="form-group">
    <label>Description</label>
    <input type="text" name="description" class="form-control" placeholder="Enter Description">
</div>

<div class="form-group">
    <label>Cost (NRS)</label>
    <input type="text" name="cost" class="form-control" placeholder="Enter Cost">
</div>



@endsection