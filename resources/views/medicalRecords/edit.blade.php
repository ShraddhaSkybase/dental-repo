@extends('templates.edit')

@section("edit_content")


<div class="form-group">
   
    <label> Patient Name</label>
    <select name="user_id" id="" class="form-control">
     
        @foreach ($users as $items)
        
        <option   @if($items->id === $item->user_id)selected @endif value="{{$items->id}}">   {{$items->name}} </option>
      
        @endforeach

    </select>
    <span class="text-danger">
        @error('user_id')
        {{$message}}
        @enderror
        
    </span>
   
</div>

<div class="form-group">
    <label>Medical Condition</label>
    <input type="text" name="medical_condition" class="form-control" value="{{$item->medical_condition}}">

    <span class="text-danger">
        @error('medical_condition')
        {{$message}}
        @enderror
        
    </span>
</div>

<div class="form-group">
    <label>Allegries</label>
    <input type="text" name="allergies" class="form-control" value="{{$item->allergies}}">
    
    <span class="text-danger">
        @error('allergries')
        {{$message}}
        @enderror
        
    </span>
</div>
    
@endsection