@extends('templates.edit')

@section("edit_content")

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{$item->name}}">
</div>

<div class="form-group">
    <label>Contact</label>
    <input type="number" name="contact" class="form-control" value="{{$item->contact}}">
</div>

<div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control" value="{{$item->address}}">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{$item->email}}">
</div>
    
@endsection