<?php 

namespace system;

class File 
{
    
    /**
    * Directory sepArator
    *
    * @const string
    */
    
    const DS = DIRECTORY_SEPARATOR;
    
    /**
    * Root path
    *
    * @var string
    */
    
    private $root;
    
    /**
    * Constractor
    *
    * @param string $root
    */
    
    public function __construct($root) 
    {
        $this-> root = $root;
    }
    
    /*
    * Determine wether the given file path exists
    *
    * @param sting $file
    * @return bool
    */
    
    public function exists($file)
    {
        return file_exists($file);
    }
    
    /*
    * require the given file 
    *
    * @param sting $file
    * @return void
    */
    
    public function require($file)
    {
        return $file;
    }

    /**
    * Generate full path to the given path in vendor folder
    *
    * @param string $path
    * @return string
    */

    public function toVender($path)
    {
    return $this->to("vender" . $path);
    }

    /*
    * Generate full path to the given path in vendor folder
    *
    * @param string path 
    * @return string
    */
    
    public function to($path) 
    {
        $this->root . static::DS . str_replace(['/', '\\'], static::DS, $path);
    }
}