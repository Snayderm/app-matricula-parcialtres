<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

    <title>Editar Carrera</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Agregar Carrera') }} </h2>
        </x-slot>
        <div class="py-12">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
            
              <div class="container mb-3">    

    <form method="POST" action="{{ route('carreras.update',['carrera'=>$carrera->id]) }}">
      @method('put')
        @csrf
      <div class="mb-3">
        <label for="id" class="form label">Id</label>
        <input type="text" class="form-input rounded focus:outline-none w-full bg-gray-100" 
        id="id" aria-describedby="idlHelp" name="id" disabled="disabled"
        value="{{$carrera->id}}">
        <div id="idHelp" class="form-text">Id de la Carrera</div>
    </div>    
        
    <div class="mb-3">
        <label for="nombre" class="form label">Nombre</label>
        <input type="text" class="form-input rounded focus:outline-none w-full" 
        id="nombre" aria-describedby="nombreHelp"
        name="nombre" value="{{$carrera->nombre}}">
      </div>

      <div class="mb-3">
        <label for="detalle" class="form label">Detalle</label>
        <input type="text" class="form-input rounded focus:outline-none w-full" 
        id="detalle" aria-describedby="detalleHelp"
        name="detalle"  value="{{$carrera->detalle}}">
      </div>      

        <div class="mt-3">
        <button type="submit" class="btn btn-info" >Guardar</button>
          <a href="{{route('carreras.index')}}" class="btn btn-warning">Cancelar</a>        
      </div>      
    </form>
  
  <!------>
</div> 
</div>  
</div>  
  </x-app-layout>
  </body>
</html>