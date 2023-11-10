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
    <label>Description</label>
    <input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{old('description')}}">

    <span class="text-danger">
        @error('description')
        {{$message}}
        @enderror
        
    </span>

</div>

<div class="form-group">
    <label>Cost (NRS)</label>
    <input type="text" name="cost" class="form-control" placeholder="Enter Cost" value="{{old('cost')}}">

    <span class="text-danger">
        @error('cost')
        {{$message}}
        @enderror
        
    </span>

</div>

<div class="form-group">
    <label>Duration</label>
    <input type="text" name="duration" class="form-control" placeholder="Enter Duration" value="{{old('duration')}}">

    <span class="text-danger">
        @error('duration')
        {{$message}}
        @enderror
        
    </span>
</div>



@endsection