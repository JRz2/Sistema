<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    use HasFactory;
    protected $fillable=['codigo','user_id','distribuidor_id','fecha','entradacanasta','salidacanasta'];
    // mucho a uno
    public function distribuidors(){
        return $this-> belongsTo(Distribuidor::class);
    }
    //Relacion muchos a muchos
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}

