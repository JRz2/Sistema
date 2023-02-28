<?php

namespace App\Observers;

use App\Models\Kardex;
use App\Models\KardexDespacho;
use App\Models\SupermarketProducto;

class SupermarketProductoObserver
{
    /**
     * Handle the SupermarketProducto "created" event.
     *
     * @param  \App\Models\SupermarketProducto  $supermarketProducto
     * @return void
     */
    public function created(SupermarketProducto $supermarketProducto)
    {
        $kardex= Kardex::all();
        $detalle = new KardexDespacho();
        $detalle->supermarket_producto_id =$supermarketProducto->id;
        foreach($kardex as $kar){
            if($kar->producto_id==$supermarketProducto->producto_id){
                $detalle->kardex_id=$kar->id;
                $detalle->cantidad=$supermarketProducto->salida;
                $detalle->fecha= now();                
                $detalle->tipo= 'Salida SuperMercado';
                $detalle->save();
            }
        }
    }

    /**
     * Handle the SupermarketProducto "updated" event.
     *
     * @param  \App\Models\SupermarketProducto  $supermarketProducto
     * @return void
     */
    public function updated(SupermarketProducto $supermarketProducto)
    {
        //
    }

    /**
     * Handle the SupermarketProducto "deleted" event.
     *
     * @param  \App\Models\SupermarketProducto  $supermarketProducto
     * @return void
     */
    public function deleted(SupermarketProducto $supermarketProducto)
    {
        //
    }

    /**
     * Handle the SupermarketProducto "restored" event.
     *
     * @param  \App\Models\SupermarketProducto  $supermarketProducto
     * @return void
     */
    public function restored(SupermarketProducto $supermarketProducto)
    {
        //
    }

    /**
     * Handle the SupermarketProducto "force deleted" event.
     *
     * @param  \App\Models\SupermarketProducto  $supermarketProducto
     * @return void
     */
    public function forceDeleted(SupermarketProducto $supermarketProducto)
    {
        //
    }
}
