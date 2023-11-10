@extends('templates.create')

@section('create_content')

<div class="form-group">
    <label> Patient Name</label>
        <select name="user_id" id="" class="form-control">
            <option value=""> --Select Patient-- </option>
            @foreach ($users as $item)

            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach

        </select>
</div>

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name">
</div>

<div class="form-group">
    <label>Types</label>
   
    <select class="form-control" name="type_id" id="">
        <option value="">--Select Type--</option>
        @foreach ($types as $items)

        <option value="{{$items->id}}">{{"$items->name"}}</option>
            
        @endforeach
    </select>

</div>



<div class="form-group">
    <label>X-ray</label>
    <input type="file" name="image" class="form-control">
  
</div>

<div class="form-group">
    <label>Condition</label>
    <input type="text" name="condition" class="form-control" placeholder="Enter condition">
</div>


    
@endsection