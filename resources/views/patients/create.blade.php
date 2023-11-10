@extends('templates.create')

@section('create_content')

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name">
</div>

<div class="form-group">
    <label>Contact</label>
    <input type="number" name="contact" class="form-control" placeholder="Enter Contact">
</div>

<div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control" placeholder="Enter Address">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Enter Email">
</div>



@endsection