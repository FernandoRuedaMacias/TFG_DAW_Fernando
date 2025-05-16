<?php

namespace App\Http\Controllers;

use App\Models\Cascos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CascoController extends Controller
{
    //Índice de cascos
    public function index()
    {
        $cascos = Cascos::paginate(4);
        return view('cascos',['cascos'=>$cascos]);
    }

    //Ver más de un casco
    public function show($id,string $tipo)
    {
        $casco =  Cascos::find($id);
        $resenyas = DB::table('resenyas')
        ->where('id_casco', $id)  
        ->where('tipo', $tipo)  
        ->get();
        
        return view('vermascascos', ['casco' => $casco] , ['resenyas' => $resenyas]);
    }
}
