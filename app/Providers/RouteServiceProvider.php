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

        $this->mapFieldagentRoutes();

        $this->mapClientRoutes();

        $this->mapStoreOwnerRoutes();

        $this->mapAgentRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "agent" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAgentRoutes()
    {
        Route::group([
            'middleware' => ['web', 'agent', 'auth:agent'],
            'prefix' => 'agent',
            'as' => 'agent.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/agent.php');
        });
    }

    /**
     * Define the "store_owner" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapStoreOwnerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'store_owner', 'auth:store_owner'],
            'prefix' => 'store-owner',
            'as' => 'store-owner.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/store-owner.php');
        });
    }

    /**
     * Define the "client" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapClientRoutes()
    {
        Route::group([
            'middleware' => ['web', 'client', 'auth:client'],
            'prefix' => 'client',
            'as' => 'client.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/client.php');
        });
    }

    /**
     * Define the "fieldagent" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapFieldagentRoutes()
    {
        Route::group([
            'middleware' => ['web', 'fieldagent', 'auth:fieldagent'],
            'prefix' => 'fieldagent',
            'as' => 'fieldagent.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/fieldagent.php');
        });
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
