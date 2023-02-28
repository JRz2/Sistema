<?php

namespace App\Observers;

use App\Models\Inventario;
use App\Models\InventarioProducto;
use App\Models\Planta;

class PlantaObserver
{
    /**
     * Handle the Planta "created" event.
     *
     * @param  \App\Models\Planta  $planta
     * @return void
     */
    public function created(Planta $planta)
    {
        //$inventario=Inventario::all();
       // if($planta->fecha  == $inventario->fecha){

       // }
        //$inventarioproducto= InventarioProducto::all();
        //$ingreso=0;
       // foreach($planta as $plant){
           // if($plant->producto_id == $productos->producto_id){
           //     $ingreso=$plant->salida;
           //     $productos->ingreso = $ingreso+$ingreso;
           // }
           // $ingreso=0;
        //}
    }

    /**
     * Handle the Planta "updated" event.
     *
     * @param  \App\Models\Planta  $planta
     * @return void
     */
    public function updated(Planta $planta)
    {
        //
    }

    /**
     * Handle the Planta "deleted" event.
     *
     * @param  \App\Models\Planta  $planta
     * @return void
     */
    public function deleted(Planta $planta)
    {
        //
    }

    /**
     * Handle the Planta "restored" event.
     *
     * @param  \App\Models\Planta  $planta
     * @return void
     */
    public function restored(Planta $planta)
    {
        //
    }

    /**
     * Handle the Planta "force deleted" event.
     *
     * @param  \App\Models\Planta  $planta
     * @return void
     */
    public function forceDeleted(Planta $planta)
    {
        //
    }
}
