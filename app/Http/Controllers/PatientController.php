<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    public string $route;

    public function __construct(){

        $this->route ='patients.';
    }
    public function index(Request $request){

        if ($request->ajax()) {

            $data = User::role('patient')->get();

            return DataTables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                        return view('patients.indexaction',['id'=>$row->id]);

                    })
                    ->rawColumns(['action'])
          

                    ->make(true);
        }

        $info['header']= "Patients";
        $info['patients']= User::all();
        $info['route']= $this->route;
        $info['title']= "Patients List";
       

        return view("patients.index",$info);
       
    }


    public function create(){

        $info['title']="Add Patients";
        $info['route']=$this->route;
        return view("patients.create",$info);
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate(
            [
                'name' =>'required',
                'contact'=>'required|min:10|max:10',
                'address'=>'required',
                'email'=>'required|email'

        ]
     );

        $patient=new User;
        $patient->name=$request['name'];
        $patient->contact=$request['contact'];
        $patient->address=$request['address'];
        $patient->email=$request['email'];
        $patient->save();
        $patient->assignRole('patient');

        return redirect()->route('patients.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $patient)
    {
        $info['item']=$patient;
        $info['title']="Edit Patient Details";
        $info['route']=$this->route;
        return view('patients.edit', $info);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $patient)
    {

    $patient->name=$request['name'];
    $patient->address=$request['address'];
    $patient->contact=$request['contact'];
    $patient->email=$request['email'];
    $patient->save();
    return redirect()->route('patients.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }
        

}

