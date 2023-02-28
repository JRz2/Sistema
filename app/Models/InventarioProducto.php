<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioProducto extends Model
{
    use HasFactory;
    protected $fillable=['inventario_id','producto_id','cierre','ingreso','despacho','stock'];
}
