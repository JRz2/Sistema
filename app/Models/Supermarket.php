<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    use HasFactory;
    protected $fillable=['codigo','user_id','distribuidor_id','supermercado','sala','fecha','entradacanasta','salidacanasta'];

    // uno a muchos
    public function posts(){
        return $this->hasMany(Pedido::class);
    }
    //mucho a muchos
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}
