<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index()
    //usamos left join para que muestre los datos en cas de nulos
    //para obtener el nombre https://stackoverflow.com/questions/48822084/laravel-show-name-of-the-user-when-logged-in#:~:text=if%20you%20using%20laravel%20default,name%20of%20the%20logedin%20user.
    {
        $idusuario = Auth::id();
        $nombreusuario = Auth::user()->name;
    $pedidos = DB::table('pedidos')
    ->leftJoin('bicicletas', 'pedidos.id_bici', '=', 'bicicletas.id')
    ->leftJoin('cascos', 'pedidos.id_casco', '=', 'cascos.id')
    ->leftJoin('productos', 'pedidos.id_producto', '=', 'productos.id')
    ->leftJoin('users', 'pedidos.id_usuario', '=', 'users.id')
    ->select('pedidos.*', 
    'bicicletas.id as id_bici', 
    'bicicletas.nombre as nombre_bici', 
    'cascos.id as id_casco', 
    'productos.id as id_producto', 
    'productos.nombre as nombre_producto', 
    'users.name as nombre_usuario')
    ->where('id_usuario', $idusuario)
    ->paginate(4);


        return view('dashboard', ['pedidos' => $pedidos] , ['nombreusuario' => $nombreusuario]);
    }

    /*
SELECT bicicletas.id AS bicicleta_id, bicicletas.nombre AS bicicleta_nombre, cascos.id AS casco_id, 
productos.id AS producto_id, productos.nombre AS producto_nombre, users.name AS usuario_nombre FROM Pedidos 
INNER JOIN bicicletas ON Pedidos.id_bici = bicicletas.id INNER JOIN cascos ON Pedidos.id_casco = cascos.id 
INNER JOIN productos ON Pedidos.id_producto = productos.id INNER JOIN users ON Pedidos.id_usuario = users.id;
    */



    public function destroy ($id){
        $pedido =  Pedidos::find($id);

        $pedido->delete();
        
        return redirect()->route('dashboard');
    } 
}
