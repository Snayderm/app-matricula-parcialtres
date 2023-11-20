<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes =DB::table('estudiantes')       
       ->join('carreras', 'estudiantes.carreraid', '=', 'carreras.id')       
        ->select('estudiantes.*', 'carreras.nombre as nombre_carrera')//se coloca un alias para solucionar el problema de que en el campo de nombre del estudiante se veia el nombre de la carrera
       ->get();
       return view("estudiante.index",['estudiantes' => $estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = DB::table('carreras')    
        ->orderBy("nombre")    
        ->get();
        return view('estudiante.new',['carreras'=>$carreras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estudiante = new Estudiante();        
        $estudiante ->nombre =$request->nombre;
        $estudiante ->apellido =$request->apellido;
        $estudiante ->cedula =$request->cedula;
        $estudiante ->email =$request->email;
        $estudiante ->telefono =$request->telefono;
        $estudiante ->carreraid =$request->carreraid;        
        $estudiante->save();

        $estudiantes = DB::table('estudiantes')       
        ->join('carreras', 'estudiantes.carreraid', '=', 'carreras.id')
        ->select('estudiantes.*', "carreras.nombre") 
        ->get();
        return view('estudiante.index',['estudiantes'=>$estudiantes]);
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
        $estudiante = Estudiante::find($id);
        $carreras = DB::table('carreras')   
         ->orderBy('nombre')    
        ->get();
        return view('estudiante.edit',['estudiante'=>$estudiante, 'carreras'=> $carreras ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estudiante = Estudiante::find($id);            
        $estudiante ->nombre =$request->nombre;
        $estudiante ->apellido =$request->apellido;
        $estudiante ->cedula =$request->cedula;
        $estudiante ->email =$request->email;
        $estudiante ->telefono =$request->telefono;
        $estudiante ->carrera =$request->carrera;        
        $estudiante->save();
 
        $estudiantes = DB::table('estudiantes')       
        ->select('estudiantes.*') 
        ->get();
        return view('estudiante.index',['estudiantes'=>$estudiantes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiante::find($id);        
        $estudiante->delete();        
        
        $estudiantes = DB::table('estudiantes')        
        ->select('estudiantes.*')
        ->get();
        return view('estudiante.index',['estudiantes'=>$estudiantes]);
    }
}
