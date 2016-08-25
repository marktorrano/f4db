<?php

namespace App\Library\CouchDb;

class CouchdbServiceProvider extends \Illuminate\Support\ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Add a couchdb extension to the original database manager
        $this->app['db']->extend('couchdb', function($config)
        {
            return new CouchdbConnection($config);
        });
    }

}
