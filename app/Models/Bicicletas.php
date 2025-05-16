<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicletas extends Model
{
    private $id;
    private $nombre;
    private $tipo;
    private $medidas;
    private $color;
    private $peso;
    private $precio;
    private $imagen;

    use HasFactory;
}
