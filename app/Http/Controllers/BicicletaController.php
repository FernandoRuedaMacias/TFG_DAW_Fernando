<?php

namespace App\Http\Controllers;

use App\Models\Bicicletas;
use App\Models\Cascos;
use App\Models\Productos;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\DB;

class BicicletaController extends Controller
{
  //Inidice de bicicletas
    public function index()
    {
        $bicis = Bicicletas::paginate(3);
        return view('bicis', ['bicis' => $bicis]);
    }

    //Mostras más de una bicicleta
    public function show($id,string $tipo)
    {
        $bici =  Bicicletas::find($id);
        $resenyas = DB::table('resenyas')
        ->where('id_bici', $id)  
        ->where('tipo', $tipo)   
        ->get();
        
        return view('vermasbicis', ['bici' => $bici] , ['resenyas' => $resenyas]);
    }

    //Devolver la vista carrito sin nada
    public function carrito()
    {
        return view('carrito');
    }

    //Devolver la vista pago ficticio sin nada
    public function pagoficticio()
    {
        return view('pagoficticio');
    }
    //https://medium.com/@amiteshbharti/how-to-get-current-user-id-in-laravel-2e24bc14162a
    public function graciascompra()
    {
        // Obtenemos el carrito y el usuario
        $cart = session()->get('cart', []);
        $idusuario = Auth::id();
    
        // Recorremos cada ítem del carrito y creamos un pedido por cada uno
        foreach ($cart as $item => $detalles) {
            $pedido = new Pedidos;
            $pedido->id_usuario = $idusuario;
    
            if (str_contains($item, "bici_")) {
                $pedido->precio= $detalles['precio'];
                $pedido->id_bici = str_replace("bici_", "", $item);
            } elseif (str_contains($item, "casco_")) {
                $pedido->precio= $detalles['precio'];
                $pedido->id_casco = str_replace("casco_", "", $item);
            } elseif (str_contains($item, "producto_")) {
                $pedido->precio= $detalles['precio'];
                $pedido->id_producto = str_replace("producto_", "", $item);
            }
    
            $pedido->save();
        }
    
        // Limpiar la sesión
        session()->forget('cart');
        session()->forget('total');
    
        // Retornar la vista
        return view('graciascompra');
    }


    public function eliminardelcarrito(string $id)
    {
        //Obtenemos las sesiones
        $cart = session()->get('cart', []);
        $total = session()->get('total', 0);

        //Si carrito existe, el total será el total menos el precio, además de borrar el producto por índice que nos pasan.
        if ($cart) {
            $total = $total - $cart[$id]['precio'];
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->put('total', $total);
        }
        //Devolvemos la vista actualizada
        return view('carrito');
    }


    public function almacenarProducto(string $id, string $tipo)
    {
        //Recurso utilizado
        //https://medium.com/@tutsmake.com/laravel-11-add-product-to-cart-example-99aed10ed7cd#:~:text=To%20create%20an%20%E2%80%9CAdd%20Product,handle%20adding%20products%20to%20the
        // Obtener el carrito de la sesión o inicializarlo y el precio total
        $cart = session()->get('cart', []);
        $total = session()->get('total', 0);

        // Verificar el tipo de producto y buscar el producto correspondiente
        switch ($tipo) {
            case 'bici':
                //encuentra la bicicleta
                $bici = Bicicletas::find($id);
                if ($bici) {
                    $cart["bici_{$id}"] = [ // Cambiar la clave para incluir el tipo
                        'nombre' => $bici->nombre,
                        'precio' => $bici->precio,
                        'imagen' => $bici->imagen,
                    ];
                    //sumamos el total
                    $total += $bici->precio;
                }
                break;

            case 'casco':
                //encuentra el casco
                $casco = Cascos::find($id);
                if ($casco) {
                    $cart["casco_{$id}"] = [ // Cambiar la clave para incluir el tipo
                        'nombre' => $casco->nombre,
                        'precio' => $casco->precio,
                        'imagen' => $casco->imagen,
                    ];
                    //sumamos el total
                    $total += $casco->precio;
                }
                break;

            case 'producto':
                //encuentra el producto
                $producto = Productos::find($id);
                if ($producto) {
                    $cart["producto_{$id}"] = [ // Cambiar la clave para incluir el tipo
                        'nombre' => $producto->nombre,
                        'precio' => $producto->precio,
                        'imagen' => $producto->imagen
                        //aunque producto no tenga imagen, se deja así porque si no da error
                    ];
                    //sumamos el total
                    $total += $producto->precio;
                }
                break;

            default:
                // Manejar el caso en que el tipo no es válido
                return redirect()->route('carrito');
        }

        //sumar los precios de los productos
        if (session()->has('total')) {
            session()->increment('total', $total);
        } else {
            session(['total' => $total]);
        }



        // Guardar el carrito actualizado en la sesión
        session()->put('cart', $cart);
        session()->put('total', $total);

       // https://laravel.com/docs/11.x/redirects
        return redirect()->back();
    }


    //Buscar bicicleta por tipo
    public function filter(Request $request)
    //Recursos
    // https://stackoverflow.com/questions/70099674/laravel-7-search-bar-using-eloquent-not-displaying-result
    // https://stackoverflow.com/questions/70575875/second-page-of-paginate-wont-display-the-filtered-data
    {
        $search = $request->tipo;
        $bicis = Bicicletas::when($search, function ($sql) use ($search) {
            $sql->where('tipo', 'like', '%' . $search . '%');
        })
            ->paginate(3)
            ->withQueryString();
            //esto sirve para que después de buscar se siga manteniendo la consulta y se pueda paginar.

        return view('bicis', ['bicis' => $bicis]);
    }
}
