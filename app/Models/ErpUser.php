<?php

/**
 * Erp User Model
 *
 * @author Jurjen Beukenhorst <jurjen.beukenhorst@jfs.be>
 * @copyright Copyright (c) Janssens Field Services 2016
 */

namespace App\Models;

use App\Library\ErpAuthModel;

/**
 * ErpUser
 */
class ErpUser extends ErpAuthModel
{
    /**
     * The aliased object name.
     * @access protected
     * @var string
     */
    protected $object = 'res.users';

    /**
     * canLogin()
     *
     * Checks if the user that wants to login may login.
     */
    public function canLogin()
    {
        $config = config("user.permission.{$this->id}");

        return is_array($config);
    }

    /**
     * isAdmin()
     *
     * Check if the logged in user is an admin.
     */
    public function isAdmin()
    {
        return in_array('admin', config("user.permission.{$this->id}.flags"));
    }

    /**
     * isAdminITUser()
     *
     * Check if the logged in user is an admin IT user.
     */
    public function isAdminITUser()
    {
        return in_array('adminIT', config("user.permission.{$this->id}.flags"));
    }

    /**
     * isInsideSurveyor()
     *
     * Check if the logged in user is an inside surveyor.
     */
    public function isInsideSurveyor()
    {
        return in_array('inside', config("user.permission.{$this->id}.flags"));
    }

    /**
     * isOutsideSurveyor()
     *
     * Check if the logged in user is an outside surveyor.
     */
    public function isOutsideSurveyor()
    {
        return in_array('outside', config("user.permission.{$this->id}.flags"));
    }
}
