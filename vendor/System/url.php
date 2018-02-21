<?php


namespace System;

class Url
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
    * Generate full link for the given path
    *
    * @param string $path
    * @return string
    */
    
    public function link($path)
    {
       return $this->app->request->baseUrl() . ltrim($path, '/');
    }
    
    
    
    /**
    * Redirect to the given path
    *
    * @param string $path
    * @return void
    */
    
    public function redirectTo($path)
    {
        header("location:" . $this->link($path));
        
        exit;
    }

}