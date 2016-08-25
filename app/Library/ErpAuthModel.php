<?php

/**
 * Erp Auth Model
 *
 * @author Jurjen Beukenhorst <jurjen.beukenhorst@jfs.be>
 * @copyright Copyright (c) Janssens Field Services 2016
 */

namespace App\Library;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * ErpAuthModel
 */
class ErpAuthModel extends ErpModel implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * getAuthIdentifierName()
     *
     * Get the name of the unique identifier for the user.
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }

    /**
     * getAuthIdentifier()
     *
     * Get the unique identifier for the user.
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * getAuthPassword()
     *
     * Get the password for the user.
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * getRememberToken()
     *
     * Get the token value for the "remember me" session.
     * @return string
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * setRememberToken()
     *
     * Set the token value for the "remember me" session.
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    /**
     * getRememberTokenName()
     *
     * Get the column name for the "remember me" token.
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
