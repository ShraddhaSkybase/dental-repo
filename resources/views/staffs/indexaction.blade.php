
<div  class="container" style="display:flex">


    <div class="row">

        <div class="col-5 m-1 p-2">
            <a href="{{route('staffs.edit',$id)}}" class="edit btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
        </div>
        

        <div class="col-5 m-1 p-2">

            <form action="{{route('staffs.destroy', $id)}}" method="POST">
                @csrf
                @method('DELETE')
                
                <button  class="delete btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
              
            </form>

        </div>
    </div>
       
       
</div>