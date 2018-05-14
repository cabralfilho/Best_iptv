<?php

namespace System; 

class Lang
{
    /**
    * DIRECTORY_SEPARATOR
    */
    
    private $DS = DIRECTORY_SEPARATOR;
    
    
    /*
    * call Application class
    *
    * @var object
    */
    
    private $app;
    
    
    /*
    *
    *
    *
    */
    private $langs = "langs" . DIRECTORY_SEPARATOR; 
    /*
    * path the lang file
    *
    * @var string
    */
    
    private $directory;
    
    /*
    * defult lang
    *
    * @var string
    */
    
    private $defult = "en";
    
    /*
    *
    *
    *
    */
    
    private $data = array();
    
    
    /*
    * Constructor 
    *
    * @param App object
    */
    
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    
    
    /*
    *
    *
    *
    */
    
    public function load($filename)
    {
        if($this->app->cookie->has("curt_lang"))
        {
            $this->directory = $this->app->coolie->get("curt_lang");
        }
        elseif ($this->app->session->has("curt_lang"))
        {
            $this->directory = $this->app->session->get("curt_lang");
        }
        else
        {
            $this->directory = "en";
        }
        
        $file = $this->app->file->exists($this->langs . $this->directory . $this->DS . $filename . '.php') ? $this->app->file->to($this->langs . $this->directory . $this->DS . $filename . '.php') : $this->app->file->to($this->langs . $this->defult . $this->DS . $filename . '.php');
        
        if(file_exists($file))
        {
            $lang = array();
            require_once $file;
            $this->data = array_merge($lang, $this->data);
            return $this->data;
        }
        else
        {
            echo $file . "<br>";
            
            die($filename. " file not found in " . $this->directory . " file directory");
        }
    }
    
    
    /*
    * get spcial word
    *
    * return string
    */
    
    public function get($key)
    {
        return (isset($this->data[$key]) ? $this->data[$key] : $key); 
    }
}