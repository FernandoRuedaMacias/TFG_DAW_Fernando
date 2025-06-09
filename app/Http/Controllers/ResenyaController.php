<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResenyaRequest;
use App\Models\Resenya;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResenyaController extends Controller
{

    //Almacenar Reseña
    public function store(ResenyaRequest $request, $id , string $tipo)
    {

          $nuevaResenya = new Resenya;
          $nuevaResenya->id_usuario = Auth::id();
        if ($tipo == "bici") {
            $nuevaResenya->id_bici = $id;
            $nuevaResenya->id_casco = null;
        } else {
            $nuevaResenya->id_casco = $id;
            $nuevaResenya->id_bici = null;
        }
        $nuevaResenya->nombreusuario = Auth::user()->name;
        $nuevaResenya->estrellas = $request->estrellas;
        $nuevaResenya->descripcion = $request->descripcion;
        $nuevaResenya->tipo = $tipo;
        $nuevaResenya->save();
        

        if ($tipo == "bici") {
        return redirect()->route('vistavermasbicis', ['id' => $id, 'tipo' => $tipo]);
        } else {
        return redirect()->route('vistavermascascos',['id' => $id, 'tipo' => $tipo]);
        }

    }

    //borrar la reseña solo si eres al autor
    public function destroy ($id,string $tipo){

        $resenya =  Resenya::find($id);

        if($resenya->nombreusuario == Auth::user()->name){
            $resenya->delete();
        }

        return redirect()->back();
    } 
}
