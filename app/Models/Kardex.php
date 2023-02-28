<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;
    protected $fillable=['producto_id'];

         //relacion uno a muchos
         public function producto(){
            return $this->hasMany(Producto::class);
        }  
}
