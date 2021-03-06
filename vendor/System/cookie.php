<?php 

namespace System ;
    
class Cookie
{
    
    /*
    * Application Object
    *
    * @var /System/ Application
    */
    
    private $app;

    
    
    /*
    * constructor
    *
    * @param /System/Application $app
    */
    
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    
    
    
    /*
    * set new value to Cookie 
    *
    * @param string $key
    * @param mixed $value
    * @param time $hours
    * @return void
    */
    
    public function set($key, $value, $hours = 1800)
    {
        setcookie($key, $value, time() + $hours * 3600, '', '', false, true);
    }
    
    /*
    * Get Value from Cookie by the given key
    *
    * @param string $key
    * @param mixed $default
    * @return mixed
    */
    
    public function get($key)
    {
        
        return array_get($_COOKIE, $key);
    }
    
    
    
    /*
    * Determine if the Cookie has the given key
    *
    * @param string $key
    * @return bool
    */
    
    public function has($has)
    {
        return array_key_exists($has, $_COOKIE);
    }
    
    /*
    * Remove the given key from Cookie
    *
    * @param string $key
    * @return void
    */
    
    public function remove($key)
    {
        setcookie($key, null, -1);
        
        unset($_COOKIE[$key]);
    }
    
    
    
    /*
    * Get all Cookie data
    *
    * @return array
    */
    
    public function all()
    {
        return $_COOKIE;
    }
    
    
    /*
    * Destroy Cookie
    *
    * @return void
    */
    
    public function destroy()
    {
        foreach (array_keys($this->all()) as $key)
        {
            $this->remove($key);
        }
        
        unset($_COOKIE);
    }
}
?>