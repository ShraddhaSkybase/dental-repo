<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Procedure;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public string $route;

     public function __construct(){
 
         $this->route ='appointments.';
     }
     
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data=Appointment::with(['user'])->get();

            return DataTables::of($data)
    
                    ->addIndexColumn()

                    ->editColumn('titlw',function($row){
                       
                        return $row->title ? $row->title :'--';
                    })
    
                    ->addColumn('user_id', function($row){
                       
                        return $row->user_id ? $row->user->name : "--";
                    })
    
                    ->addColumn('dentist_id', function($row){

                        return $row->dentist_id ? $row->dentist->name : "--";
                    })

                  
                   
                    ->addColumn('status',function($row){
                       
                        return $row->status ? $row->status :'--';
                    })

                    ->editColumn('notes',function($row){
                       
                        return $row->notes ? $row->notes :'--';
                    })

                  

                
                   
                   
                    
                    ->addColumn('action', function($row){
    
                        return view('appointments.indexaction',['id'=>$row->id, 'route'=>$this->route]);
    
                    })
                    ->rawColumns(['action'])
          
    
                    ->make(true);
        }
    
    
        $info['appointment']= Appointment::all();
        $info['route']= $this->route;
        $info['title']= "Appointment List";
    
        return view("appointments.index",$info);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info['users']=User::role('patient')->get();
        $info['dentists']=User::role('dentist')->get();
        $info['title']="Add Appointment";
        $info['route']=$this->route;
        return view("appointments.create",$info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $appointment=new Appointment;
        
        $appointment->title=$request['title'];
        $appointment->user_id=$request['user_id'];
        $appointment->dentist_id=$request['dentist_id'];
        $appointment->date=$request['date'];
        $appointment->status=$request['status'];
        $appointment->notes=$request['notes'];
        $appointment->save();
        return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $info['users']=User::role('patient')->get();
        $info['dentists']=User::role('dentist')->get();
        $info['item']=$appointment;
        $info['title']="Edit Appointment Details";
        $info['route']=$this->route;
        return view('appointments.edit', $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
      
    //    $data = $request->except(['_method', '_token']);
    //    $appointment->update($data);

     $appointment->title=$request['title'];
        $appointment->user_id=$request['user_id'];
        $appointment->dentist_id=$request['dentist_id'];
        $appointment->date=$request['date'];
        $appointment->status=$request['status'];
        $appointment->notes=$request['notes'];
        $appointment->save();
        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index');
    }
}
