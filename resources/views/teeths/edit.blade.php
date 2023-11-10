@extends('templates.edit')

@section('edit_content')

<div class="form-group">
    <label> Patient Name</label>
        <select name="user_id" id="" class="form-control">
         
            @foreach ($users as $items)
            <option   @if($items->id === $item->user_id)selected @endif value="{{$items->id}}">   {{$items->name}} </option>
          
            @endforeach

        </select>
</div>

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$item->name}}">
</div>

<div class="form-group">
    <label>Types</label>
   
    <select multiple class="form-control" name="type_id" id="">
      
        @foreach ($types as $type)

        <option @if(in_array($type->id,$teeth_types))selected @endif value="{{$type->id}}">{{"$type->name"}}</option>
            
        @endforeach
        
    </select>

</div>



<div class="form-group">
    <label>X-ray</label>
    <input type="file" name="image" class="form-control" value="">
    <img src="{{$item->getFirstMediaUrl('image')}}" alt="">
</div>

<div class="form-group">
    <label>Condition</label>
    <input type="text" name="condition" class="form-control" placeholder="Enter condition" value="{{$item->condition}}">
</div>


    
@endsection