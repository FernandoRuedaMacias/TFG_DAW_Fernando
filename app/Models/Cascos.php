<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cascos extends Model
{
    private $id;
    private $tamanyo;
    private $color;
    private $precio;
    private $imagen;

    use HasFactory;
}
