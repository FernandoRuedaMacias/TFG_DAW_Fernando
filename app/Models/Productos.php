<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    private $id;
    private $nombre;
    private $color;
    private $precio;
    use HasFactory;
}
