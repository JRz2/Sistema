<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    use HasFactory;
    protected $fillable=['nombre','paterno','materno','celular'];
    //uno a muchos
    public function despachos(){
        return $this->hasMany(Despacho::class);
    }
    public function supermarteks(){
        return $this->hasMany(Despacho::class);
    }
    public function plantas(){
        return $this->hasMany(Despacho::class);
    }

}
