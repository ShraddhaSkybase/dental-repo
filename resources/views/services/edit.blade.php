@extends('templates.edit')

@section("edit_content")

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{$item->name}}">

    <span class="text-danger">
        @error('name')
        {{$message}}
        @enderror
        
    </span>
</div>

<div class="form-group">
    <label>Description</label>
    <input type="text" name="description" class="form-control" value="{{$item->description}}">

    <span class="text-danger">
        @error('description')
        {{$message}}
        @enderror
        
    </span>
</div>

<div class="form-group">
    <label>Cost (NRS)</label>
    <input type="text" name="cost" class="form-control" value="{{$item->cost}}">

    <span class="text-danger">
        @error('cost')
        {{$message}}
        @enderror
        
    </span>
</div>

<div class="form-group">
    <label>Duration</label>
    <input type="text" name="duration" class="form-control" value="{{$item->duration}}">

    <span class="text-danger">
        @error('duration')
        {{$message}}
        @enderror
        
    </span>
</div>
    
@endsection