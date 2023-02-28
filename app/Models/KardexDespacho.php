<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KardexDespacho extends Model
{
    use HasFactory;
    protected $fillable=['despacho_producto_id','kardex_id','cantidad','fecha','tipo'];
}
