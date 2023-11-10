@extends('templates.edit')

@section("edit_content")

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{$item->name}}">
</div>

<div class="form-group">
    <label>Description</label>
    <input type="text" name="description" class="form-control" value="{{$item->description}}">
</div>

<div class="form-group">
    <label>Cost (NRS)</label>
    <input type="text" name="cost" class="form-control" value="{{$item->cost}}">
</div>

<div class="form-group">
    <label>Duration</label>
    <input type="text" name="duration" class="form-control" value="{{$item->duration}}">
</div>
    
@endsection