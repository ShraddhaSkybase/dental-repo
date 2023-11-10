@extends('templates.create')

@section('create_content')


<div class="form-group">
    <label>Patient Name</label>
   
    <select name="user_id" id="" class="form-control" value="{{old('user_id')}}">

        <option value=""> --Select Patient-- </option>

        @foreach ($users as $items)

        <option value="{{$items->id}}">{{$items->name}}</option>

        @endforeach

    </select>

    <span class="text-danger">
        @error('user_id')
        {{$message}}
        @enderror
        
    </span>
    {{-- <input type="text" name="user_id" class="form-control" placeholder="Enter Patient Name"> --}}
</div>

<div class="form-group">
    <label>Medical Condition</label>
    <input type="text" name="medical_condition" class="form-control" placeholder="Enter Medical Condition" value="{{old('medical_condition')}}">

    <span class="text-danger">
        @error('medical_condition')
        {{$message}}
        @enderror
        
    </span>
</div>

<div class="form-group">
    <label>Allergies</label>
    <input type="text" name="allergies" class="form-control" placeholder="Enter Allergies" value="{{old('allergies')}}">

    <span class="text-danger">
        @error('allergries')
        {{$message}}
        @enderror
        
    </span>
</div>



@endsection