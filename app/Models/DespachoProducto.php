<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DespachoProducto extends Model
{
    use HasFactory;
    protected $fillable=['despacho_id','producto_id','salida','fvencimiento','devoluciones'];
}
