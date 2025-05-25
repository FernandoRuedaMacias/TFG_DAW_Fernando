<?php

use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\CascoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResenyaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Bicicletas*/
/*Índice*/
Route::get('/',[BicicletaController::class,'index'])->name('Inicio');
/*Ver más bicicletas*/
Route::get('/bicis/{id}/{tipo}',[BicicletaController::class,'show'])->name('vistavermasbicis');
/*Almacenar TODO tipo de productos*/
Route::get('/carritobicis/{id}/{tipo}', [BicicletaController::class, 'almacenarProducto'])->name('almacenarproducto');
/************************************************************************************************* */


/*Vista del carrito*/
Route::get('/carrito',[BicicletaController::class,'carrito'])->name('carrito');
/*Eliminar producto del carrito*/
Route::get('/eliminarproducto/{id}',[BicicletaController::class,'eliminardelcarrito'])->name('eliminar');
/************************************************************************************************* */

/*Cascos*/
/*Índice*/
Route::get('/cascos',[CascoController::class,'index'])->name('cascos');
/*Ver más cascos*/
Route::get('/cascos/{id}/{tipo}',[CascoController::class,'show'])->name('vistavermascascos');
/************************************************************************************************* */


/*Reseñas*/
/*Meter Reseñas*/
Route::post('/resenyaok/{id}/{tipo}',[ResenyaController::class,'store'])->name('almacenaresenya');
/*Enseñar reseñas*/
Route::get('/resenyaok/{id}/{tipo}',[ResenyaController::class,'index'])->name('veresenya');
/*Borrar reseñas solo si eres el autor*/
Route::get('/eliminaresenya/{id}/{tipo}',[ResenyaController::class,'destroy'])->name('borraresenya');
/************************************************************************************************* */

/*Productos*/
/*Índice*/
Route::get('/productos',[ProductoController::class,'index'])->name('productos');
/************************************************************************************************* */

/*Borrar un producto en la vista del usuario una vez que haya iniciado sesión y pedido algo*/
Route::get('/eliminarpedido/{id}',[PedidoController::class,'destroy'])->name('borrarpedido');

/*Filtrar bicicletas*/
Route::get('/filtrar',[BicicletaController::class,'filter'])->name('Filtrar');

/*Pago ficticio de los productos*/
Route::get('/pago', [BicicletaController::class, 'pagoficticio'])->name('pagoficticio');

/*Mensaje de gracias por su compra*/
Route::get('/compra', [BicicletaController::class, 'graciascompra'])->name('graciascompra');

/*Vista del usuario en la que pueda ver y modificar sus pedidos*/
Route::get('/dashboard', [PedidoController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/borrarcuenta', [ProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
