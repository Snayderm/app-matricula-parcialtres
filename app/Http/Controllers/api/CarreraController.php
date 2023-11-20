<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrera;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        return json_encode(['carreras' => $carreras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nombre' => ['required', 'max:30', 'unique:carreras,nombre'],
            'id' => ['required', 'numeric', 'min:1']
            ]);
    
        if ($validate->fails()) {
            return response()->json([
            'msg' => 'Se produjo un error en la validacion de la informacion.',
            'statusCode' => 400
            ]);
        }
        
        
        
        $carrera = new Carrera();        
        $carrera ->nombre =$request->nombre;
        $carrera ->detalle =$request->detalle;               
        $carrera->save();
       
        return json_encode(['carrera'=>$carrera]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carrera = Carrera::find($id);
        if(is_null($carrera)){
            return abort(404);
        }
        return json_encode(['carrera'=>$carrera]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
