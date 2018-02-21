<?php
     
namespace System;
     
class Route
{
    
    /**
    * Application object
    *
    * @var \System\Application
    */
    
    private $app;
    
    /**
    * Routes Container
    *
    *
    * @var array
    */
    
    private $routes = [];

    /** 
    * Not found url
    *
    * @param \System\Application
    */
    
    private $notFound;
    
    
    /** 
    * Constructor
    *
    * @var string
    */
    
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    
    /*
    * Add new Route
    *
    * @param string $url
    * @param string $action
    * @param string $requestMethod
    * @return void
    */
    
    public function add($url, $action, $requestMethod = 'GET')
    {
        $routes =[
            'url'       =>$url,
            'pattern'   =>$this->generatePattern($url),
            'action'    =>$this->getAction($action),
            'method'    =>strtoupper($requestMethod),
        ];
        
        $this->routes[] = $routes;
    }
    
    
    
    /*
    * Set not found url
    *
    * @param string $url
    * @return void
    */
    
    public function notFound($url)
    {
        $this->notFound = $url;
    }
    
    
    /*
    * Get proper Route
    *
    * @return array
    */ 
    
    public function getProperRoute()
    {
        foreach ($this->routes as $route)
        {
            if($this->isMatching($route['pattern']))
            {
                $arguments = $this->getArgumentsFrom($route['pattern']);
                
                // controller@method
                
                list($controller, $method) = explode('@', $route['action']);
               
                return [$controller, $method, $arguments];
                
            }
        }
    }
    
    
    /*
    * Detemine if the given pattern matches the current request url
    *
    * @param string $pattern
    * @return bool
    */
    
    private function isMatching($pattern)
    {
        return preg_match($pattern, $this->app->request->url());
    }
    
    /*
    * Get Arguments from the current request url
    * based on the given pattern
    *
    * @param string $pattern
    * @return array
    */
    
    private function getArgumentsFrom($pattern)
    {
         preg_match($pattern, $this->app->request->url(), $matches);
         
         array_shift($matches);
        
         return $matches;
    }
    
    /*
    * Generate a regex pattern for the given url
    *
    * @param string $url
    * @return string
    */
    
    private function generatePattern($url)
    {
        $pattern = str_replace([':text', ':id'] , ['([a-zA-Z0-9-]+)', '(\d+)'] , $url);
        
        return '#^'. $pattern . '$#';
    }
    
    /*
    * Get the proper Action
    *
    * @param string $action
    * @return string
    */
    
    private function getAction($action)
    {
        $action = str_replace('/', '\\', $action);
        
        return strpos($action, '@') !== false ? $action : $action . '@index';
    }
}