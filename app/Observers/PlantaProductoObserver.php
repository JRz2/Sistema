<?php

namespace App\Observers;

use App\Models\Inventario;
use App\Models\InventarioProducto;
use App\Models\Kardex;
use App\Models\KardexDespacho;
use App\Models\PlantaProducto;

class PlantaProductoObserver
{
    /**
     * Handle the PlantaProducto "created" event.
     *
     * @param  \App\Models\PlantaProducto  $plantaProducto
     * @return void
     */
    public function created(PlantaProducto $plantaProducto)
    {
        $kardex= Kardex::all();
        $detalle = new KardexDespacho();
        $detalle->planta_producto_id=$plantaProducto->id;
        foreach($kardex as $kar){
            if($kar->producto_id==$plantaProducto->producto_id){
                $detalle->kardex_id=$kar->id;
                $detalle->cantidad=$plantaProducto->salida;
                $detalle->fecha= now();                
                $detalle->tipo= 'Entrada';
                $detalle->save();
            }
        }

        //$inventario = Inventario::all();
        //$inven = new InventarioProducto();
        //$fecha = $inven->fecha;
        //$mesinv=$fecha.getdate();
       // $fecha2 = $plantaProducto->fecha();
        //$mesproducto =$fecha2.getdate();
        //foreach($inventario as $inv ){
        //    if($mesinv == $mesproducto){
        //        
        //    }     
        //}
    }

    /**
     * Handle the PlantaProducto "updated" event.
     *
     * @param  \App\Models\PlantaProducto  $plantaProducto
     * @return void
     */
    public function updated(PlantaProducto $plantaProducto)
    {
        //
    }

    /**
     * Handle the PlantaProducto "deleted" event.
     *
     * @param  \App\Models\PlantaProducto  $plantaProducto
     * @return void
     */
    public function deleted(PlantaProducto $plantaProducto)
    {
        //
    }

    /**
     * Handle the PlantaProducto "restored" event.
     *
     * @param  \App\Models\PlantaProducto  $plantaProducto
     * @return void
     */
    public function restored(PlantaProducto $plantaProducto)
    {
        //
    }

    /**
     * Handle the PlantaProducto "force deleted" event.
     *
     * @param  \App\Models\PlantaProducto  $plantaProducto
     * @return void
     */
    public function forceDeleted(PlantaProducto $plantaProducto)
    {
        //
    }
}
