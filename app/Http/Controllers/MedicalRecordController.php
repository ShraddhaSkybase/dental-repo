<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public string $route;

    public function __construct(){

        $this->route ='medicalRecords.';
    }
  
        public function index(Request $request)
        {
            if ($request->ajax()) {
    
                $data =MedicalRecord::select('*');
    
                return DataTables::of($data)
    
                        ->addIndexColumn()

                        ->addColumn('user_id', function($row){
                            return $row->user_id ? $row->user->name : "--";
                        })
    
                        ->addColumn('action', function($row){
    
                            return view('medicalRecords.indexaction',['id'=>$row->id]);
    
                        })
                        ->rawColumns(['action'])
              
    
                        ->make(true);
            }
    
            $info['medicalRecords']= MedicalRecord::all();
            $info['route']= $this->route;
            $info['title']= "MedicalRecords List";
    
            return view("medicalRecords.index",$info);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info['users']=User::role('patient')->get();
        $info['title']="Add Medical Records";
        $info['route']=$this->route;
        return view("medicalRecords.create",$info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required|exists:users,id',
           'medical_condition'=>'required',
            'allergies'=> 'required|string',
            
            
        ]);
        $medicalRecord=new MedicalRecord;
      
        $medicalRecord->user_id=$request['user_id'];
        $medicalRecord->medical_condition=$request['medical_condition'];
        $medicalRecord->allergies=$request['allergies'];
        $medicalRecord->save();
        return redirect()->route('medicalRecords.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        $info['users']=User::role('patient')->get();
        $info['item']=$medicalRecord;
        $info['title']="Edit Medical Details";
        $info['route']=$this->route;
        return view('medicalRecords.edit', $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'user_id'=> 'required|exists:users,id',
           'medical_condition'=>'required',
            'allergies'=> 'required|string',
            
            
        ]);
 
        $medicalRecord->user_id=$request['user_id'];
        $medicalRecord->medical_condition=$request['medical_condition'];
        $medicalRecord->allergies=$request['allergies'];
        $medicalRecord->save();
        return redirect()->route('medicalRecords.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();
        return redirect()->route('medicalRecords.index');
    }
}
