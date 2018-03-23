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
    * Table name
    *
    * @var string
    */
    
    private $table;
    

    /**
    * Data Container
    *
    * @var array
    */
    
    private $data = [];
    
    
    /**
    * Bindings container
    *
    * @var array
    */
    
    private $bindings = [];
    
    
    
    /**
    * Wheres
    *
    * @var array
    */
    
    private $wheres = [];
    
    
    /**
    * select
    *
    * @var array
    */
    
    private $selects = [];
    
    
    /**
    * Joins
    *
    * @var array
    */
    
    private $joins = [];
    
    
    /**
    * Limit
    *
    * @var int
    */
    
    private $limit;
    
    
    /**
    * Offset
    *
    * @var int
    */
    
    private $offset;
    
    
    /**
    * Total rows
    *
    * @var int
    */
    
    private $rows = 0;
    
    
    /**
    * Order By
    *
    * @var array
    */
    
    private $order = [];
    
    
    /**
    * Last inserted id
    *
    * @var int
    */
    
    private $lastId;
    
    
    
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
            
            static::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            
            static::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            static::$connection->exec('SET NAMES utf8');    
            
            
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
    
    
    
    /**
    * Set select clause
    *
    * @param string $select
    * @return $this
    */
    
    public function select($select)
    {
        $this->selects[] = $select;
        
        return $this;
    }
    
    
    
    /**
    * Set join clause
    *
    * @param string $join
    * @return $this
    */
    
    public function join($join)
    {
        $this->joins[] = $join;
        
        return $this;
    }
    
    
    
    /**
    * Set order By clause
    *
    * @param string $column
    * @param string $sort
    * @return $this
    */
    
    public function orderBy($order, $sort = "ASC")
    {
        $this->order = [$order, $sort];
        
        return $this;
    }
    
   
    /**
    * Set Limit and offset
    *
    * @param string $limit
    * @param string $offset
    * @return $this
    */
    
    public function limit($limit, $offset = null)
    {
        $this->limit = $limit;
            
        $this->offset = $offset;
        
        return $this;
    }
    
    
    
    /**
    * Fetch table
    * This will return only one record
    *
    * @param string
    * @return \stdClass | null
    */
    
    public function fetch($table = null)
    {
        if($table)
        {
            $this->table($table);
        }
        
        $sql = $this->fetchStatement();
        
        $result = $this->query($sql, $this->bindings)->fetch();
       
        $this->reset();
        
        return $result; 
    }
    
    
    
    /**
    * Delete data in database
    *
    * @param string $table
    * @return $this
    */
    
    public function delete($table = null)
    {
        if($table)
        {
            $this->table($table);
        }
        
        $sql = 'DELETE  FROM ' . $this->table . ' ' ;
        
        $sql = rtrim($sql, ', ');
        
        if ($this->wheres)
        {
            $sql .= ' WHERE ' . implode(' ', $this->wheres);
        }
        
        $this->query($sql, $this->bindings);
        
        $this->reset();
        
        return $this;
    }
    
    
    
    /**
    * Fetch All data from table
    *
    * @param string
    * @return \stdClass | null
    */
    
    public function fetchAll($table = null)
    {
        if($table)
        {
            $this->table($table);
        }
        
        $sql = $this->fetchStatement();
        
        $query = $this->query($sql, $this->bindings);
        
        $results = $query->fetchAll();
        
        $this->rows = $query->rowCount();
        
         $this->reset();
        
        return $results; 
    }
    
    
    /**
    * Get total rows from last fetch all statement
    *
    * @return int
    */
    
    public function rows()
    {
        return $this->rows;
    }
    
    
    
    /**
    * Prepare select statment
    *
    * @return string
    */
    
    private function fetchStatement()
    {
        $sql = 'SELECT ';
        
        if ($this->selects)
        {
            $sql .= implode(',', $this->selects);
        }
        else
        {
            $sql .= '* ';
        }
        
        $sql .= ' FROM ' . $this->table;
        
        if($this->joins)
        {
            $sql .= implode(' ', $this->joins);
        }
        
        if($this->wheres)
        {
            $sql .= ' WHERE ' . implode(" ", $this->wheres);
        }
        
        if($this->offset)
        {
            $sql .= " OFFSET " . $this->offset;
        }
        
        if($this->order)
        {
            $sql .= " ORDER BY " . implode(' ', $this->order);
        }
        
        return $sql;
    }
    
    
    
    /**
    * Set the table name
    *
    * @param string $table
    * @return $this
    */
    
    public function table($table)
    {
        $this->table = $table;
        
        return $this;
    }
    
    
    /**
    * Set the table name
    *
    * @param string $table
    * @return $this
    */
    
    public function from($table)
    {
        return $this->table($table);
    }
    
    
    /**
    * Set the Data that will be stored in database table
    *
    * @param mixed $key
    * @param mixed $value
    * @return $this
    */
    
    public function data($key, $value = null)
    {
        if(is_array($key))
        {
            $this->data = array_merge($this->data, $key);
            
            $this->addToBindings($key);
        }
        else
        {
            $this->data[$key] = $value;
            
            $this->addToBindings($value);
            
        }
        
        return $this;
    }
    
    
    
    /**
    * Insert data to database
    *
    * @param string $table
    * @return $this
    */
    
    public function insert($table = null)
    {
        if($table)
        {
            $this->table($table);
        }
        
        $sql = 'INSERT INTO ' . $this->table . ' SET ' ;
        
        $sql .= $this->setFields();
        
        $this->query($sql, $this->bindings);
        
        $this->lastId = $this->connection()->lastInsertId();  
        
         $this->reset();
        
        return $this;
    }
    
    
    
    /**
    * Update data in database
    *
    * @param string $table
    * @return $this
    */
    
    public function update($table = null)
    {
        if($table)
        {
            $this->table($table);
        }
        
        $sql = 'UPDATE ' . $this->table . ' SET ' ;
        
        $sql .= $this->setFields();
        
        $sql = rtrim($sql, ', ');
        
        if ($this->wheres)
        {
            $sql .= ' WHERE ' . implode(' ', $this->wheres);
        }
        
        $this->query($sql, $this->bindings);
        
        $this->reset();
        
        return $this;
    }
    
    
    
    /**
    * Execute the given sql statment
    *
    * @return \PDOStatement
    */

    public function query()
    {
        $bindings = func_get_args();
        
        $sql = array_shift($bindings);
        
        if(count($bindings) == 1 AND is_array($bindings[0]))
        {
            $bindings = $bindings[0];
        }
        
        // 2 way to make execute 
        
        // $query = static::$connection->query($sql);
        
        $query = $this->connection()->prepare($sql);
        
        foreach ($bindings as $key => $value)
        {
            $query->bindValue($key + 1, _e($value));
        }
        
        
        try
        {            
            $query->execute();
        }
        catch (PDOException $e)
        {
            echo "<br>" . $sql . "<br>";
            
            pre($this->bindings);
            
            die(" Error " . $e->getMessage());
        }
        
        
        return $query;
    }
    
    
    
    /**
    * Add new where clause
    *
    * @return $this
    */
    
    public function where()
    {
        $bindings = func_get_args();
        
        $sql = array_shift($bindings);
        
        $this->addToBindings($bindings);
        
        $this->wheres[] = $sql;
        
        return $this;
    }
    
    
    
    /**
    * Set fields for insert and update query
    *
    * @return string
    */
    
    private function setFields()
    {
        $sql = "";

        foreach (array_keys($this->data) as $key)
        {
            $sql .= ' `' . $key . '` = ? , ';
        }
        
        $sql = rtrim($sql, ', ');
        
        return $sql;
    }
    
    
    
    /**
    * Add the given value to bindings
    *
    * @param mixed $value
    * @return void
    */

    private function addToBindings($value)
    {
        if(is_array($value))
        {
            $this->bindings = array_merge($this->bindings, array_values($value));
        }
        else
        {
            $this->bindings[] = $value;
        }
    }
    
    
    
    /**
    * Get the last insert id
    *
    * @return int
    */
    
    public function lastId()
    {
        return $this->lastId;
    }
    
    
    
    /**
    * reset the values after database query
    *
    * @return void
    */
    
    private function reset()
    { 
        $this->limit = null;
        $this->table = null;
        $this->offset = null;
        $this->data = [];
        $this->joins = [];
        $this->wheres = []; 
        $this->order = [];
        $this->selects = [];
        $this->bindings = [];
    }
    
} 