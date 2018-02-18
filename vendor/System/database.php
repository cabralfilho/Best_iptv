<?php


namespace System;

use PDO;
use PDOException;

class Database
{
    /**
    * Application object
    *
    * @var \System\Application
    */
    
    private $app;
    
    
    /**
    * PDO Connection
    *
    * @var \PDO
    */
    
    private static $connection;
    /**
    * constuctor
    *
    * @param \System\Application $app
    */
    
    public function __construct(Application $app)
    {
        $this->app = $app;
        
        if (! $this->isConnected())
        {
            $this->connect();
        }
    }
    
    
    /**
    * Determine if there is any connection to database
    *
    * @return bool
    */
    
    private function isConnected()
    {
        return static::$connection instanceof PDO;
    }
    
     
    
    /**
    * Connection to database
    *
    * @return void
    */
    
    private function connect()
    {
        $connectionData = $this->app->file->call('config.php');
        
        
        extract($connectionData);
        
        try
        {
            static::$connection = new PDO('mysql:host='. $server . ';dbname=' . $dbname, $dbuser, $dbpass);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
        
    }
    
    
    
    /**
    * Get database Connection object PDO Object
    *
    * @return \PDO
    */
    
    public function connection()
    {
        return static::$connection;
    }

}