<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DentistController extends Controller
{
    public string $route;

    public function __construct(){

        $this->route ='dentists.';
    }
    public function index(Request $request){

        if ($request->ajax()) {

            $data = User::role('dentist')->get();

            return DataTables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                        return view('dentists.indexaction',['id'=>$row->id]);

                    })
                    ->rawColumns(['action'])
          

                    ->make(true);
        }

        $info['dentists']= User::all();
        $info['route']= $this->route;
        $info['title']= "Dentists List";

        return view("dentists.index",$info);
       
    }


    public function create(){

        $info['title']="Add Dentists";
        $info['route']=$this->route;
        return view("dentists.create",$info);
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      



        $dentist=new User;
        $dentist->name=$request['name'];
        $dentist->contact=$request['contact'];
        $dentist->address=$request['address'];
        $dentist->email=$request['email'];
        $dentist->save();
        $dentist->assignRole('dentist');
        return redirect()->route('dentists.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $dentist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $dentist)
    {
        $info['item']=$dentist;
        $info['title']="Edit Dentist Details";
        $info['route']=$this->route;
        return view('dentists.edit', $info);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $dentist)
    {

    $dentist->name=$request['name'];
    $dentist->address=$request['address'];
    $dentist->contact=$request['contact'];
    $dentist->email=$request['email'];
    $dentist->save();
    return redirect()->route('dentists.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $dentist)
    {
        $dentist->delete();
        return redirect()->route('dentists.index');
    }
        
}
