<?php

/**
 * Erp Auth Provider
 *
 * @author Jurjen Beukenhorst <jurjen.beukenhorst@jfs.be>
 * @copyright Copyright (c) Janssens Field Services 2016
 */

namespace App\Library\Auth;

use Auth;
use App\Models\ErpUser;
use Illuminate\Support\ServiceProvider;

/**
 * ErpAuthProvider
 */
class ErpAuthProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('erpAuth', function() {
            return new ErpUserProvider(new ErpUser);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
