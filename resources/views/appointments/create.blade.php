@extends('templates.create')

@section('create_content')



<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Title">
</div>

<div class="form-group">

    <label> Patient Name</label>
   
    <select class="form-control" name="user_id" id="">

        <option value="">--Select Patient--</option>

        @foreach ($users as $user)

        <option value="{{$user->id}}">{{$user->name}}</option>
            
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Dentist Name</label>

    <select class="form-control" name="dentist_id" id="" >
        <option value="">--Select Dentist--</option>

        @foreach ($dentists as $dentist)

        <option value="{{$dentist->id}}">{{$dentist->name}}</option>
            
        @endforeach
    </select>



   
</div>

<div class="form-group">
    <label>Date</label>
    <input type="datetime-local" name="date" class="form-control" placeholder="Enter date">
</div>

<div class="form-group">
    <label>Status</label>
    
    <select name="status" class="form-control">
    
        <option value="free">Free</option>
        <option value="scheduled">Scheduled</option>
        <option value="cancelled">Cancelled</option>
        <option value="completed">Completed</option>
    </select>

</div>



<div class="form-group">
    <label>Notes</label>
    <input type="text" name="notes" class="form-control" placeholder="Notes">
</div>



@endsection