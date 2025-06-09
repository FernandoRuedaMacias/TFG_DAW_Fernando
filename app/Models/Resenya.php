<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resenya extends Model
{
    public $timestamps = false;
    private $id;
    private $id_usuario;
    private $id_bici;
    private $id_casco;
    private $nombreusuario;
    private $estrellas;
    private $descripcion;
    private $tipo;
    private $fecha;

    use HasFactory;
}
