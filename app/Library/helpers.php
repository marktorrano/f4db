<?php

if (!function_exists('element')) {
    /**
     * element()
     *
     * @param \Illuminate\View\Factory $env
     * @param array $vars
     * @param string $file
     * @param array $params
     * @return string
     */
    function element($env, $vars = [], $file, $params = [])
    {
        return $env->make(
            "element.$file", $params, array_except($vars, ['__data', '__path'])
        )->render();
    }
}

if (!function_exists('user')) {
    /**
     * user()
     */
    function user()
    {
        return app('auth')->user();
    }
}

if (!function_exists('input')) {
    /**
     * input()
     */
    function input($key = null, $default = null)
    {
        if (is_null($key)) return request()->all();

        return request()->input($key, $default);
    }
}

