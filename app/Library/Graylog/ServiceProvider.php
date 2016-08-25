<?php

namespace App\Library\Graylog;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * ServiceProvider
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     * @access protected
     * @var bool
     */
    protected $defer = false;

    /**
     * Indicates if the log listener is registered.
     * @access protected
     * @var bool
     */
    protected $listenerRegistered = false;

    /**
     * boot()
     *
     * Bootstrap the application events.
     */
    public function boot()
    {
        if (!$this->listenerRegistered) {
            $this->registerListener();
        }
    }

    /**
     * register()
     */
    public function register()
    {
        $this->app['graylog.client'] = $this->app->share(function($app) {
            $request = $app['request'];
            $config = $app['config']->get('services.graylog', []);

            return new Client($request, $config);
        });

        $this->app['graylog.handler'] = $this->app->share(function($app) {
            $builder = new ContextBuilder($app);
            return new Handler($this->app['graylog.client'], $builder);
        });

        if (isset($this->app['log'])) {
            $this->registerListener();
        }
    }

    /**
     * registerListener()
     *
     * @access protected
     */
    protected function registerListener()
    {
        if (method_exists($this->app['log'], 'listen')) {
            $this->app['log']->listen(function($level, $message, $context) {
                $this->app['graylog.handler']->log($level, $message, $context);
            });
        }

        $this->listenerRegistered = true;
    }
}
