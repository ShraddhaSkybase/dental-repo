@extends('templates.create')

@section('create_content')

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
   
    <span class="text-danger">
        @error('name')
        {{$message}}
        @enderror
        
    </span>
  
</div>

<div class="form-group">
    <label>Contact</label>
    <input type="number" name="contact" class="form-control" placeholder="Enter Contact" value="{{old('contact')}}">

    <span class="text-danger">
        @error('contact')
        {{$message}}
        @enderror
        
    </span>
 
</div>

<div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{old('address')}}">

    <span class="text-danger">
        @error('address')
        {{$message}}
        @enderror
        
    </span>
  
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}">
    
    <span class="text-danger">
        @error('email')
        {{$message}}
        @enderror
        
    </span>
</div>



@endsection