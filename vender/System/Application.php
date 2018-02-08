<?php 

namespace system;

class Application {
    
    /**
    * Container
    *
    * @var array
    */
    
    private $container = [];
    
    /*
    * Constructor
    *
    * @param System/file $file
    */
    
    public function __construct (File $file)
    {
      
        $this-> share('file', $file);
        
        $this-> registerClases();
        
        $this->loadHelpers();
        
        pre($this->$file);
    }
    
    /*
    * share the given key through the Applicatoin
    *
    * @ param string key
    * @ param value mixed
    * @ return mixed
    */
    
    public function share ($key, $value) 
    {
        $this ->container[$key] = $value;
    }
    
    /*
    * Get shared value dynamically
    *
    * @param string $key
    * @return mixed
    */

    public function __get($key)
    {
        return $this->get($key);
    }
    
    /*
    * Register Clases in spl autolaod register
    *
    * @ return void
    */
    
    private function registerClases() 
    {
        spl_autoload_register([$this, 'laod']);
    }
    
        
    /*
    * load Class through autoloading
    *
    * @ param string $class
    * @ return void
    */

    public function laod($class)
    {

        if (strpos($class, 'App') === 0) {
            
            $file = $this->file->to($class . '.php');
           
        } else {
           
            // get the class from vendor
            
            $file = $this->file->toVender($class . '.php');
           
            if ($this ->file -> exists($file)) {
                $this ->file -> require($file);
            }
        }
    }
    
    /*
    * Get shared Value
    *
    * @param string $key
    * @return mixed
    */

    public function get($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null ;
    }
    
    /*
    * load helbers file
    *
    * @return void
    */
    
    private function loadHelpers() 
    {
        $this->file->require($this->file->toVender('helpers.php'));
    }
}