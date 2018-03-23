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
    * Errors container
    *
    * @var array
    */
    
    protected $errors = [];
    
    
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
    * Enconde the given value to json
    * 
    * @param mixed $data
    * @return string
    */
    
    public function json($data)
    {
        return json_encode($data);
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