<?php

namespace App\Observers;

use App\Models\Despacho;
use App\Models\DespachoProducto;
use App\Models\Kardex;
use App\Models\KardexDespacho;
use PhpParser\Node\Stmt\Foreach_;

class DespachoProductoObserver
{
    /**
     * Handle the DespachoProducto "created" event.
     *
     * @param  \App\Models\DespachoProducto  $despachoProducto
     * @return void
     */
    public function created(DespachoProducto $despachoProducto)
    {
        $kardex= Kardex::all();
        $detalle = new KardexDespacho();
        $detalle->despacho_producto_id =$despachoProducto->id;
        foreach($kardex as $kar){
            if($kar->producto_id==$despachoProducto->producto_id){
                $detalle->kardex_id=$kar->id;
                $detalle->cantidad=$despachoProducto->salida;
                $detalle->fecha= now();                
                $detalle->tipo= 'Salida';
                $detalle->save();
            }
        }

    }

    /**
     * Handle the DespachoProducto "updated" event.
     *
     * @param  \App\Models\DespachoProducto  $despachoProducto
     * @return void
     */
    public function updated(DespachoProducto $despachoProducto)
    {
        //
    }

    /**
     * Handle the DespachoProducto "deleted" event.
     *
     * @param  \App\Models\DespachoProducto  $despachoProducto
     * @return void
     */
    public function deleted(DespachoProducto $despachoProducto)
    {
        //
    }

    /**
     * Handle the DespachoProducto "restored" event.
     *
     * @param  \App\Models\DespachoProducto  $despachoProducto
     * @return void
     */
    public function restored(DespachoProducto $despachoProducto)
    {
        //
    }

    /**
     * Handle the DespachoProducto "force deleted" event.
     *
     * @param  \App\Models\DespachoProducto  $despachoProducto
     * @return void
     */
    public function forceDeleted(DespachoProducto $despachoProducto)
    {
        //
    }
}
