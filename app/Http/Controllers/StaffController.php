<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StaffController extends Controller
{
    public string $route;

    public function __construct(){

        $this->route ='staffs.';
    }
    public function index(Request $request){

        if ($request->ajax()) {

            $data = User::role('receptionist')->get();

            return DataTables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                        return view('staffs.indexaction',['id'=>$row->id]);

                    })
                    ->rawColumns(['action'])
          

                    ->make(true);
        }

        $info['staffs']= User::all();
        $info['route']= $this->route;
        $info['title']= "Staffs List";

        return view("staffs.index",$info);
       
    }


    public function create(){

        $info['title']="Add staffs";
        $info['route']=$this->route;
        return view("staffs.create",$info);
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $staff=new User;
        $staff->name=$request['name'];
        $staff->contact=$request['contact'];
        $staff->address=$request['address'];
        $staff->email=$request['email'];
        $staff->save();
        $staff->assignRole('receptionist');
        return redirect()->route('staffs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $staff)
    {
        $info['item']=$staff;
        $info['title']="Edit Dentist Details";
        $info['route']=$this->route;
        return view('staffs.edit', $info);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $staff)
    {

    $staff->name=$request['name'];
    $staff->address=$request['address'];
    $staff->contact=$request['contact'];
    $staff->email=$request['email'];
    $staff->save();
    return redirect()->route('staffs.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $staff)
    {
        $staff->delete();
        return redirect()->route('staffs.index');
    }
}
