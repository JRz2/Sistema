<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Pedido extends Model
{
    use HasFactory;

    //uno a muchos inversa -- muchos a uno
    public function user(){
        return $this-> belongsTo(User::class);
    }

    public function despacho(){
        return $this-> belongsTo(Despacho::class);
    }

    public function despachoSuper(){
        return $this-> belongsTo(DespachoSuper::class);
    }
    
    //Relacion muchos a muchos
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}
