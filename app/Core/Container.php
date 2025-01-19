<?php

namespace App\Core;

class Container
{
    protected static $instance;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new \League\Container\Container();
            // static::$instance->delegate(new \League\Container\ReflectionContainer());
        }

        return static::$instance;
    }
}