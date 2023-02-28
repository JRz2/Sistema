<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupermarketProducto extends Model
{
    use HasFactory;
    protected $fillable=['supermarket_id','producto_id','salida','fvencimiento','devoluciones'];
}
