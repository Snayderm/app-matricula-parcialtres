<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use Illuminate\Support\Facades\DB;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras =DB::table('carreras')              
         ->select('carreras.*')
        ->get();
        return view("carrera.index",['carreras' => $carreras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = DB::table('carreras')    
        ->orderBy("nombre")    
        ->get();
        return view('carrera.new',['carreras'=>$carreras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carrera = new Carrera();        
        $carrera ->nombre =$request->nombre;
        $carrera ->detalle =$request->detalle;               
        $carrera->save();

        $carreras = DB::table('carreras')        
        ->select('carreras.*') 
        ->get();
        return view('carrera.index',['carreras'=>$carreras]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carrera = Carrera::find($id);
        $carreras = DB::table('carreras')   
         ->orderBy('nombre')    
        ->get();
        return view('carrera.edit',['carrera'=>$carrera]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carrera = Carrera::find($id);        
        $carrera->nombre = $request->nombre;       
        $carrera->detalle =$request->detalle;
        $carrera->save();
 
        $carreras = DB::table('carreras')       
        ->select('carreras.*')
        ->get();
         return view('carrera.index',['carreras'=>$carreras]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carrera = Carrera::find($id);        
        $carrera->delete();        
        
        $carreras = DB::table('carreras')        
        ->select('carreras.*')
        ->get();
        return view('carrera.index',['carreras'=>$carreras]);
    }
} 
