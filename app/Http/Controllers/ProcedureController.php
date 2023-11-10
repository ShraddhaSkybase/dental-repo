<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Procedure;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public string $route;

     public function __construct(){
 
         $this->route ='procedures.';
     }
public function index(Request $request){

    if ($request->ajax()) {

        $data = Procedure::select('*');

        return DataTables::of($data)

                ->addIndexColumn()

                ->addColumn('user_id', function($row){
                    return $row->user_id ? $row->user->name : "--";
                })

                ->addColumn('service_id', function($row){
                    return $row->service_id ? $row->service->name : "--";
                })

                ->addColumn('appointment_id', function($row){

                  
                    return $row->appointment_id ? $row->appointment->title : "--";
                
                })
                
                ->addColumn('action', function($row){

                    return view('procedures.indexaction',['id'=>$row->id]);

                })
                ->rawColumns(['action'])
      

                ->make(true);
    }

    $info['procedures']= Procedure::all();
    $info['route']= $this->route;
    $info['title']= "Procedures List";

    return view("procedures.index",$info);
}

   
       
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        $info['users']=User::role('patient')->get();
        $info['services']=Service::all();
        $info['appointments']=Appointment::all();
        $info['title']="Add Procedure";
        $info['route']=$this->route;
        return view("procedures.create",$info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $procedure=new Procedure;
        $procedure->name=$request['name'];
        $procedure->user_id=$request['user_id'];
        $procedure->service_id=$request['service_id'];
        $procedure->appointment_id=$request['appointment_id'];
        $procedure->description=$request['description'];
        $procedure->cost=$request['cost'];
        $procedure->save();
        return redirect()->route('procedures.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Procedure $procedure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Procedure $procedure)
    {
        $info['users']=User::role('patient')->get();
        $info['services']=Service::all();
        $info['appointments']=Appointment::all();
        $info['item']=$procedure;
        $info['title']="Edit Procedure Details";
        $info['route']=$this->route;
        return view('procedures.edit', $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Procedure $procedure)
    {
        // dd($request->all());

            //   $data = $request->except(['_method', '_token']);
            //     $procedure->update($data);
        $procedure->name=$request['name'];
        $procedure->user_id=$request['user_id'];
        $procedure->service_id=$request['service_id'];
        $procedure->appointment_id=$request['appointment_id'];
        $procedure->description=$request['description'];
        $procedure->cost=$request['cost'];
        $procedure->save();
        return redirect()->route('procedures.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
        return redirect()->route('procedures.index');
    }
}
