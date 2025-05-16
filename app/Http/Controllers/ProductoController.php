<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //Índice de productos
    public function index()
    {
        $productos = Productos::paginate(5);
        return view('productos',['productos'=>$productos]);
    }
  
}

