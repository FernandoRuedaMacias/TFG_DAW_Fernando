<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    private $id_pedido;
    private $id_usuario;
    private $id_bici;
    private $id_casco;
    private $id_producto;
    use HasFactory;
}
