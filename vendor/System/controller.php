<?php


namespace System;

abstract class Controller
{
    /**
    * Application object
    *
    * @var \System\Application
    */
    
    protected $app;
    
    /**
    * constuctor
    *
    * @param \System\Application $app
    */
    
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    
    
    
    /**
    * Call shared application object dynamically
    *
    * @param string $key
    * @return mixed
    */
    
    public function __get($key)
    {
        return $this->app->get($key);
    }
}