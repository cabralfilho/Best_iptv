<?php


namespace System;

abstract class Model
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
    
    
    /*
    * Table name
    *
    * @var string
    */
    
    protected $table;
    
    
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
    
    
    
    /**
    * Get all Model records
    *
    * @return array
    */
    
    public function all()
    {
        return $this->fetchAll($this->table);
    }
    
    
    /**
    * Get records by id
    *
    * @return mixed
    */
    
    public function get($id)
    {
        return $this->where("id = ?", $id)->fetch($this->table);
    }
    
    
    
    /**
    * Call database methods dynamically
    *
    * @param string $method
    * @param string $args
    * @return mixed
    */
    
    public function __call($method, $args)
    {
        return call_user_func_array([$this->app->db, $method], $args);
        
    }
}