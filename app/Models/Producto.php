<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=['codigo','nombre','categoria_id'];

    //muchos a uno

    public function categoria(){
        return $this-> belongsTo(Categoria::class);
    }
    public function kardex(){
        return $this-> belongsTo(Kardex::class);
    }


    
    //Relacion muchos a muchos
    public function pedido(){
        return $this->belongsToMany(Pedido::class);
    }

    public function despachos(){
        return $this->belongsTo(Despacho::class);
    }

    public function despachosupers(){
        return $this->belongsTo(DespachoSuper::class);
    }

    public function plantas(){
        return $this->belongsTo(DespachoSuper::class);
    }
}
