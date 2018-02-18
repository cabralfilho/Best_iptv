<?php 

namespace System;

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
        $this->root = $root;
    }
    
    /*
    * Determine wether the given file path exists
    *
    * @param sting $file
    * @return bool
    */
    
    public function exists($file)
    {
        return file_exists($this->to($file));
    }
    
    /*
    * require the given file 
    *
    * @param sting $file
    * @return mixed
    */
    
    public function call($file)
    {
        return require $this->to($file);
        
    }

    /**
    * Generate full path to the given path in vendor folder
    *
    * @param string $path
    * @return string
    */

    public function toVendor($path)
    {
        return $this->to("vendor/" . $path);
    }

    /*
    * Generate full path to the given path in vendor folder
    *
    * @param string path 
    * @return string
    */
    
    public function to($path) // ??????
    {
       return  $this->root . static::DS . str_replace(['/', '\\'], static::DS, $path);
    }

}