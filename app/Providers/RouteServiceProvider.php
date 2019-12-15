<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        // untuk admin
        $this->mapAdminRoutes();
        // rekam_medis
        $this->mapRekamMedisRoutes();
        // dokter
        $this->mapDokterRoutes();
        // apotek
        $this->mapApotekRoutes();
        // pasien
        $this->mapPasienRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    // untuk admin
    protected function mapAdminRoutes()
    {
        Route::middleware('web', 'auth', 'role:admin')
             ->prefix('admin')
             ->namespace($this->namespace . '\Admin')
             ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "rekam_medis" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    // untuk admin
    protected function mapRekamMedisRoutes()
    {
        Route::middleware('web', 'auth', 'role:rekam_medis')
             ->prefix('rekam-medis')
             ->namespace($this->namespace . '\RekamMedis')
             ->group(base_path('routes/rekamMedis.php'));
    }

    /**
     * Define the "dokter" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    // untuk admin
    protected function mapDokterRoutes()
    {
        Route::middleware('web', 'auth', 'role:dokter')
             ->prefix('dokter')
             ->namespace($this->namespace . '\Admin')
             ->group(base_path('routes/dokter.php'));
    }


    /**
     * Define the "apotek" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    // untuk admin
    protected function mapApotekRoutes()
    {
        Route::middleware('web', 'auth', 'role:apotek')
             ->prefix('apotek')
             ->namespace($this->namespace . '\Apotek')
             ->group(base_path('routes/apotek.php'));
    }

    /**
     * Define the "apotek" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    // untuk admin
    protected function mapPasienRoutes()
    {
        Route::middleware('web', 'auth', 'role:pasien')
             ->prefix('pasien')
             ->namespace($this->namespace . '\Pasien')
             ->group(base_path('routes/pasien.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
