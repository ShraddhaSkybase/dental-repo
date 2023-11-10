<?php

namespace App\Http\Controllers;

use App\Models\Teeth;
use App\Models\TeethType;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Yajra\DataTables\DataTables;

class TeethController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
        public string $route;

    public function __construct(){

        $this->route ='teeths.';
    }
    public function index(Request $request){

        if ($request->ajax()) {

            $data = Teeth::with('user')->get();

            return DataTables::of($data)

                    ->addIndexColumn()

                    // ->editColumn('teeth_name', function($row){
                    //     return $row->user_id->name ?? "--";
                    // })

                    ->addColumn('user_id', function($row){
                        return $row->user_id ? $row->user->name : "--";
                    })

                    ->addColumn('type_id', function($row){

                        return $row->types? $row->types[0]['name'] : '---';
                    })

                    ->editColumn('name', function($row){
                        return $row->name ?? "--";
                    })
                   

                    ->addColumn('image', function ($row) {
                        return $row->image_url ?? '---';
                        // return "--";
                        // return "<img src=". $row->getMedia('x_ray').">"?:'---';
                    })

                    ->editColumn('condition', function ($row) {

                        return $row->condition   ? : "---";
                    })

                    ->addColumn('action', function($row){

                        return view('teeths.indexaction',['id'=>$row->id]);

                    })

                    ->rawColumns(['action', 'variation'])
          

                    ->make(true);
        }

        $info['teeths']= Teeth::all();;
        $info['route']= $this->route;
        $info['title']= "Teeths List";

        return view("teeths.index",$info);
       
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info['users']=User::role('patient')->get();
        $info['types']=Type::all();
        $info['title']="Add Teeth";
        $info['route']=$this->route;
        return view("teeths.create",$info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image'=> 'nullable|image|mimetypes:jpg,png,jpeg',
            'name'=> 'required|string',
            'types'=> 'required|string',
            'condition'=> 'nullable|string',
            'user_id'=> 'required|exists:users,id',
        ]);


        
        // $data = $request->all();
        // $teeth=new Teeth($data);


        $types=$request['type_id'];
        $teeth=new Teeth([]);
        $teeth->user_id = $request['user_id'];
        $teeth->name=$request['name'];
        // $teeth->type_id = $request['type_id'];
        $teeth->condition=$request['condition'];
        $teeth->save();
       
        $teeth->types()->attach($types); //many-many relationship
        

        // $type = new TeethType([
        //     'teeth_id' => $teeth->id,
        //     'type_id'=> $request->type_id
        // ]);
        // $type->save();

        if($request->image){

        $teeth->addMediaFromRequest('image')->toMediaCollection('teeths');

        }

        return redirect()->route('teeths.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Teeth $teeth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teeth $teeth)
    {
        $info['users']=User::role('patient')->get();
        $info['types']=Type::all();
        $info['item']=$teeth;
        $info['teeth_types']  = $teeth->types->pluck('id')->toArray();
        $info['title']="Edit Teeth Details";
        $info['route']=$this->route;
        return view('teeths.edit', $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teeth $teeth)
    {
        $types=Type::where('id', $request->type_id)->pluck('id')->toArray();
        
        $teeth->user_id = $request['user_id'];
        $teeth->name=$request['name'];
        // $teeth->type_id = $request['type_id'];
        $teeth->condition=$request['condition'];
        $teeth->save();


        $teeth=Teeth::find(1);
        $teeth->types()->sync($types);
        $teeth->save();
    
        // $type = new TeethType([
        //     'teeth_id' => $teeth->id,
        //     'type_id'=> $request->type_id
        // ]);
        // $type->save();

        

        if($request->image){
            $teeth->clearMediaCollection('teeths');
             $teeth->addMediaFromRequest('image')->toMediaCollection('teeths');
        }
   
            return redirect()->route('teeths.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teeth $teeth)
    {
          $teeth->delete();
        return redirect()->route('teeths.index');
    }
}
