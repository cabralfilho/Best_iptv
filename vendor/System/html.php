<?php

namespace System;

class Html
{

    /**
    * Application object
    *
    * @var \System\Application
    */
    
    protected $app;
    
    
    /**
    * Html Title
    *
    * @var string
    */
    
    private $title;
    
    
    /**
    * Html description
    *
    * @var string
    */
    
    private $description;
    
    
    /**
    * Html KeyWord
    *
    * @var string
    */
    
    private $keywords;
    
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
    * set Title
    *
    * @param string $title
    * @return void
    */
    
    public function setTite($title)
    {
        $this->title = $title;
    }
    
    
    /**
    * get Title
    *
    * @return string
    */
    
    public function getTite($title)
    {
       return  $this->title;
    }
    
    
    
    /**
    * set Description
    *
    * @param string $title
    * @return void
    */
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    
    /**
    * get description
    *
    * @return string
    */
    
    public function getdescription($description)
    {
       return  $this->description;
    }
    
    
    
    /**
    * set keywords
    *
    * @param string $title
    * @return void
    */
    
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }
    
    
    /**
    * get keywords
    *
    * @return string
    */
    
    public function getKeywords($keywords)
    {
       return  $this->keywords;
    }
    
    
}
