@extends('templates.edit')

@section("edit_content")



<div class="form-group">

    <label>Title</label>

    <input type="text" name="title" class="form-control"value="{{$item->title}}">
    
</div>


<div class="form-group">
    <label> Patient Name</label>
   
    <select class="form-control" name="user_id" id="">

       

        @foreach ($users as $user)

        <option  @if($user->id === $item->user_id)selected @endif  value="{{$user->id}}">{{$user->name}}</option>
            
        @endforeach
    </select>
</div>



<div class="form-group">
    <label>Dentist Name</label>

    <select class="form-control" name="dentist_id" id="" >
       

        @foreach ($dentists as $dentist)

        <option @if($dentist->id === $item->dentist_id)selected @endif  value="{{$dentist->id}}">{{$dentist->name}}</option>
            
        @endforeach
    </select>



   
</div>

<div class="form-group">
    <label>Date</label>
    <input type="datetime-local" name="date" class="form-control"  value="{{$item->date}}">
</div>

<div class="form-group">

    <label>Status</label>

    

    <select name="status" class="form-control">

       
        <option  {{$item->status === "free"?"selected":""}} value="free"> Free </option>
        <option  {{$item->status  === "scheduled"?"selected":""}} value="scheduled"> Scheduled </option>
        <option  {{$item->status  === "cancelled"?"selected":""}} value="cancelled"> Cancelled </option>
        <option  {{$item->status  === "completed"?"selected":""}} value="completed"> Completed </option>

    </select>

</div>


<div class="form-group">
    <label>Notes</label>
    <input type="text" name="notes" class="form-control" value="{{$item->notes}}">
</div>
    
@endsection