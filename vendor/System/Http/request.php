<?php

namespace System\Http;

class Request
{
    /**
    * Url
    *
    * @var string
    */
    
    private $url;
    
    /*
    * base url
    *
    * @var string
    */
    private $baseUrl;
    
    /**
    * prepare url 
    *
    * @return void
    */
    
    public function prepareUrl()
    {
        $script = dirname($this->server('SCRIPT_NAME'));
         
        $requestUri = $this->server('REQUEST_URI');
        
        if (strpos($requestUri, '?') !== false)
        {
            list($requestUri, $queryString) = explode('?', $requestUri);
        }
        
        $this->url = preg_replace('#^' . $script . "#", "", $requestUri);
        
        $this->baseUrl = $this->server('REQUEST_SCHEME'). '://' . $this->server('HTTP_HOST') . $script . '/' ;
        
    }
    
    
    /**
    * Get the value from _POST by given key
    *
    * @param string $key
    * @param mixed $default
    * @return mixed
    */
    
    public function post($key, $default = null)
    {
        return array_get($_POST, $key, $default);
    }
    
    
    /**
    * Get the value from _GET by given key
    *
    * @param string $key
    * @param mixed $default
    * @return mixed
    */
    
    public function get($key, $default = null)
    {
        return array_get($_GET, $key, $default);
    }
    
    
    /**
    * Get the value from _GET by given key
    *
    * @param string $key
    * @param mixed $default
    * @return mixed
    */
    public function server($key, $default = null)
    {
        return array_get($_SERVER, $key, $default);
    }
    
  
    /*
    * Get current request method
    *
    * @return string
    */
    
    public function method()
    {
        return $this->server('REQUEST_METHOD');
    }
    
    
    
    /*
    * Get only relative url (claean url)
    *
    * @return string
    */
    
    public function baseUrl()
    {
        return $this->baseUrl;
    }
    
    
    
    /*
    * Get only relative url (claean url)
    *
    * @return string
    */
    
    public function url()
    {
        return $this->url; 
    }
}