<?php

namespace App\Observers;

use App\Models\Inventario;
use App\Models\InventarioProducto;
use App\Models\Producto;

class InventarioObserver
{
    /**
     * Handle the Inventario "created" event.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return void
     */
    public function created(Inventario $inventario)
    {
        $producto = Producto::all();
        foreach ($producto as $producto){
            $detalle = new InventarioProducto();
            $detalle->inventario_id=$inventario->id;
            $detalle->producto_id=$producto->id;
            $detalle->cierre= 0;
            $detalle->ingreso=0;
            $detalle->despacho=0;
            $detalle->baja=0;
            $detalle->stock=0;
            $detalle->save();
        }

    }

    /**
     * Handle the Inventario "updated" event.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return void
     */
    public function updated(Inventario $inventario)
    {
        //
    }

    /**
     * Handle the Inventario "deleted" event.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return void
     */
    public function deleted(Inventario $inventario)
    {
        //
    }

    /**
     * Handle the Inventario "restored" event.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return void
     */
    public function restored(Inventario $inventario)
    {
        //
    }

    /**
     * Handle the Inventario "force deleted" event.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return void
     */
    public function forceDeleted(Inventario $inventario)
    {
        //
    }
}
