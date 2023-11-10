<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
      public string $route;

        public function __construct(){
    
            $this->route ='services.';
        }
    public function index(Request $request){
    
            if ($request->ajax()) {
    
                $data = Service::select('*');
    
                return DataTables::of($data)
    
                        ->addIndexColumn()
    
                        ->addColumn('action', function($row){
    
                            return view('services.indexaction',['id'=>$row->id]);
    
                        })
                        ->rawColumns(['action'])
              
    
                        ->make(true);
            }
    
            $info['services']= Service::all();
            $info['route']= $this->route;
            $info['title']= "Service Lists";
    
            return view("services.index",$info);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info['title']="Add Service";
        $info['route']=$this->route;
        return view("services.create",$info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service=new Service;
        $service->name=$request['name'];
        $service->description=$request['description'];
        $service->cost=$request['cost'];
        $service->duration=$request['duration'];
        $service->save();
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $info['item']=$service;
        $info['title']="Edit Service Details";
        $info['route']=$this->route;
        return view('services.edit', $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->name=$request['name'];
        $service->description=$request['description'];
        $service->cost=$request['cost'];
        $service->duration=$request['duration'];
        $service->save();
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }
}
