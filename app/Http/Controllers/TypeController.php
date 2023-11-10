<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public $route;

     public function __construct(){
        $this->route="types.";
     }
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Type::select('*');

            return DataTables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                        return view('types.indexaction',['id'=>$row->id]);

                    })
                    ->rawColumns(['action'])
          

                    ->make(true);
        }

        $info['types']= Type::all();
        $info['route']= $this->route;
        $info['title']= "Type List";

        return view("types.index",$info);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info['title']="Add type";
        $info['route']=$this->route;
        return view("types.create",$info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type=new Type;
        $type->name=$request['name'];
        $type->save();
        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $info['item']=$type;
        $info['title']="Edit Type Details";
        $info['route']=$this->route;
        return view('types.edit', $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $type->name=$request['name'];
        $type->save();
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index');

    }
}
