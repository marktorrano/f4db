<?php

/**
 * Erp User Provider
 *
 * @author Jurjen Beukenhorst <jurjen.beukenhorst@jfs.be>
 * @copyright Copyright (c) Janssens Field Services 2016
 */

namespace App\Library\Auth;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use App\Exceptions\Erp as ErpException;
use App\Library\ErpAuthModel;

/**
 * ErpUserProvider
 */
class ErpUserProvider implements UserProvider
{
    /**
     * Holds the Erp auth model
     * @access protected
     * @var \App\Library\ErpAuthModel
     */
    protected $model;

    /**
     * __construct()
     *
     * Create a new ERP user provider.
     * @param \App\Library\ErpAuthModel $model
     */
    public function __construct(ErpAuthModel $model)
    {
        $this->model = $model;
    }

    /**
     * retrieveById()
     *
     * Retrieve a user by their unique identifier.
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return $this->model->read((int) $identifier);
    }

    /**
     * retrieveByToken()
     *
     * Retrieve a user by their unique identifier and "remember me" token.
     * @param  mixed  $identifier
     * @param  string  $token
     */
    public function retrieveByToken($identifier, $token)
    {
        return
        dd('retrieveByToken');
        dump($identifier);
        dump($token);
    }

    /**
     * updateRememberToken()
     *
     * Update the "remember me" token for the given user in storage.
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     */
    public function updateRememberToken(UserContract $user, $token)
    {
        return;
        dd('updateRememberToken');
        dump($user);
        dump($token);
    }

    /**
     * retrieveByCredentials()
     *
     * Retrieve a user by the given credentials.
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials)) {
            return;
        }

        return $this->model->whereLogin($credentials['login']);
    }

    /**
     * validateCredentials()
     *
     * Validate a user against the given credentials.
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        try {
            $user->first();
        } catch (ErpException $e) {
            return false;
        }

        return $user->password === $credentials['password'];
    }
}
