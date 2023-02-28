<?php

namespace App\Providers;


use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Models\Inventario;
use App\Observers\InventarioObserver;
use App\Models\Planta;
use App\Observers\PlantaObserver;
use App\Models\Producto;
use App\Observers\ProductoObserver;
use App\Models\DespachoProducto;
use App\Models\SupermarketProducto;
use App\Observers\DespachoProductoObserver;
use App\Observers\SupermarketProductoObserver;
use App\Models\PlantaProducto;
use App\Http\Controllers\Admin\PlantaProductoController;
use App\Observers\PlantaProductoObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Inventario::observe(InventarioObserver::class);
        Planta::observe(PlantaObserver::class);
        Producto::observe(ProductoObserver::class);
        DespachoProducto::observe(DespachoProductoObserver::class);
        SupermarketProducto::observe(SupermarketProductoObserver::class);
        PlantaProducto::observe(PlantaProductoObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
