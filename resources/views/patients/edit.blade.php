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
    <label>Contact</label>
    <input type="number" name="contact" class="form-control" value="{{$item->contact}}">
    
    <span class="text-danger">
        @error('contact')
        {{$message}}
        @enderror
        
    </span>
</div>

<div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control" value="{{$item->address}}">
    
    <span class="text-danger">
        @error('address')
        {{$message}}
        @enderror
        
    </span>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{$item->email}}">
    
    <span class="text-danger">
        @error('email')
        {{$message}}
        @enderror
        
    </span>
</div>
    
@endsection