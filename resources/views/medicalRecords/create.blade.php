@extends('templates.create')

@section('create_content')


<div class="form-group">
    <label>Patient Name</label>
   
    <select name="user_id" id="" class="form-control">

        <option value=""> --Select Patient-- </option>

        @foreach ($users as $items)

        <option value="{{$items->id}}">{{$items->name}}</option>

        @endforeach

    </select>
    {{-- <input type="text" name="user_id" class="form-control" placeholder="Enter Patient Name"> --}}
</div>

<div class="form-group">
    <label>Medical Condition</label>
    <input type="text" name="medical_condition" class="form-control" placeholder="Enter Medical Condition">
</div>

<div class="form-group">
    <label>Allergies</label>
    <input type="text" name="allergies" class="form-control" placeholder="Enter Allergies">
</div>



@endsection