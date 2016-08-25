<?php

namespace App\Providers;

use Illuminate\Routing\Router;
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
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        /*
        |--------------------------------------------------------------------------
        | Route Model Binding
        |--------------------------------------------------------------------------
        */
        $this->binds($router);

        /*
        |--------------------------------------------------------------------------
        | Other route stuff
        |--------------------------------------------------------------------------
        */
        $router->pattern('id', '[0-9]+');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $host = request()->getHttpHost();

        $blackListedHosts = explode(',', env('BLACK_LISTED_HOSTS'));

        if (in_array($host, $blackListedHosts)) {
            die();
        }

        switch ($host) {
            case 'survinator.fiber4belgium.be':
            case 'survinator.jfs.be':
            case 'survinator.local':
                $environment = 'live';
                break;

            case 'survinatorstage.fiber4belgium.be':
            case 'survinatorstage.jfs.be':
            case 'survinatorstage.local':
                $environment = 'stage';
                break;

            default:
                $environment = 'stage';
                break;
        }

        define('ENVIRONMENT', $environment);

        $router->group([
            'namespace' => $this->namespace,
            'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

    /**
     * binds()
     *
     * Route Model Binding
     * @param \Illuminate\Routing\Router $router
     */
    private function binds(Router $router)
    {
        $router->model('ticket', \App\Models\Ticket::class);
    }
}
