@extends('templates.create')

@section('create_content')

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name">
</div>

<div class="form-group">
    <label>Description</label>
    <input type="text" name="description" class="form-control" placeholder="Enter Description">
</div>

<div class="form-group">
    <label>Cost (NRS)</label>
    <input type="text" name="cost" class="form-control" placeholder="Enter Cost">
</div>

<div class="form-group">
    <label>Duration</label>
    <input type="text" name="duration" class="form-control" placeholder="Enter Duration">
</div>



@endsection