<?php 

namespace System;

class validation
{

    /**
    * application Object
    *
    * @var \System\Application
    */
    
    private $app;
    
    /**
    * Errors container
    *
    * @var array
    */
    private $errors = [];
    
    /**
    * constructor
    *
    * @param \System\Application $app
    */
    public function __construct(Application $app)
    {
       $this->app = $app; 
    }
    
    /**
    * determine if the given input is not empty
    *
    * @param string $inputName
    * @param string $customErrorMessage
    * @param $this
    */
    public function required($inputName, $customErrorMessage = null)
    {
        if ($this->hasError($inputName))
        {
            return;
        }
        
        $inputValue = $this->value($inputName);
        
        if (! $inputValue)
        {
            $errMsg = $customErrorMessage ?: sprintf("%s Is Required", ucfirst($inputName));
            
            $this->addError($inputName, $errMsg);
        }
        
        return $this;
    }
    
    /**
    * determine if the given input is Email
    *
    * @param string $inputName
    * @param string $customErrorMessage
    * @param $this
    */
    public function isEmail($inputName, $customErrorMessage = null)
    {
        if ($this->hasError($inputName))
        {
            return;
        }
        
        $inputValue = $this->value($inputName);
        
        if (! filter_var($inputValue, FILTER_VALIDATE_EMAIL))
        {
            $errMsg = $customErrorMessage?: sprintf('%s is Not valid Email', ucfirst($inputValue));
             
            $this->addError($inputName, $errMsg);
        }
        
        return $this;
    }
    
    
    /**
    * Detemine if the given input has float value
    *
    * @param string $inputName
    * @param string $customErrorMessage
    * @param $this
    */
    public function float($inputName, $customErrorMessage)
    {
        if ($this->hasError($inputName))
        {
            return;
        }
        
        $inputValue = $this->value($inputName);
        
        if(! is_float($inputValue))
        {
            $errMsg = $customErrorMessage?: sprintf('%s acccept only Numbers', ucfirst($inputValue));
             
            $this->addError($inputName, $errMsg);   
        }
        
        return $this;
       
    }
    
    /**
    * Detemine if the given input value should be at least the given length
    *
    * @param string $inputName
    * @param string $customErrorMessage
    * @param $this
    */
    public function minLen($inputName, $length, $customErrorMessage)
    {
        if ($this->hasError($inputName))
        {
            return;
        }
        
        $inputValue = $this->value($inputName);
        
        if (strlen($inputValue) < $length)
        {
            $errMsg = $customErrorMessage?: sprintf('%s this file is too small %d', ucfirst($inputValue), $lengtn);
             
            $this->addError($inputName, $errMsg);
        }
        
        return $this;
    }
    
    /**
    * Detemine if the given input value should be at most the given length
    *
    * @param string $inputName
    * @param string $customErrorMessage
    * @param $this
    */
    public function maxLen($inputName, $length, $customErrorMessage)
    {
        if ($this->hasError($inputName))
        {
            return;
        } 
          
        $inputValue = $this->value($inputName);
        
        if (strlen($inputValue) > $length)
        {
            $errMsg = $customErrorMessage?: sprintf('%s this file is too big %d', ucfirst($inputValue), $lengtn);
             
            $this->addError($inputName, $errMsg);
        }
        
        return $this;

    }
    
    /**
    * Detemine if the given first input mathes the second input
    *
    * @param string firstInput
    * @param string secondInput
    * @param string $customErrorMessage
    * @param $this
    */
    public function match($firstInput, $secondInput, $customErrorMessage, $types = "passwords")
    {
       
        $firstInputValue = $this->value($firstInput);
        $secondInputValue = $this->value($secondInput);
        
        if ($firstInputValue != $secondInput)
        {
            $errMsg = $customErrorMessage?: sprintf('%s the passwords is not matches', ucfirst($firstInput));
             
            $this->addError($types, $errMsg);  
        }
        
        return $this;
    }
    
    
    /**
    * Detemine if the given input is unique in datebase
    *
    * @param string $inputName
    * @param string $datebaseDate
    * @param string $customErrorMessage
    * @param $this
    */
    public function unique($inputName, array $databaseDate, $customErrorMessage) // -try
    {
        if ($this->hasError($inputName))
        {
            return;
        } 
          
        $inputValue = $this->value($inputName);
        
        $table = null;
        $column = null;
        $exceptionColumn = null;
        $exceptionColumnValue = null;
        
        if (count($databaseDate) == 2)
        {
            list($table, $column) = $databaseData;
        }
        elseif(count($databaseDate) == 4)
        {
            list($table, $column, $exceptionColumn, $exceptionColumnValue) = $databaseData;
        }
        
        if ($exceptionColumn AND $exceptionColumnValue)
        {
              $result = $this->app->db->select($column)->from($table)->where($column . ' = ? AND ' . $exceptionColumn . ' != ?', $inputValue, $exceptionColumnValue)->fetch();
        }
        else
        {
              $result = $this->app->db->select($column)->from($table)->where($column . ' = ? ', $inputValue)->fetch();
        }
        
        
        if ($result)
        {
            $errMsg = $customErrorMessage?: sprintf('%s is not Unique', ucfirst($inputName));
             
            $this->addError($inputName, $errMsg);
        }
    }
    
    /**
    * Add string $message
    * 
    * @param string $message
    * @return $this
    */
    
    public function message($message)
    {
        
    }
    
    /**
    * validate all inputs
    * 
    * @return $this
    */
    
    public function validate()
    {
        
    }
    
    /**
    * Determine if there any invalied inputs
    * 
    * @return bool
    */
    
    public function fails()
    {
        return ! empty($this->errors);
    }
    
    
    /**
    * Determine if all inputs are valid
    * 
    * @return bool
    */
    
    public function passes()
    {
        return empty($this->errors);
    }
    
    /**
    * Get all errors
    * 
    * @return array
    */
    
    public function getMsg()
    {
        return $this->errors;
    }
    
    /**
    * Get the Value from given input
    * 
    * @param string $input
    * @return mixed
    */
    
    private function value($input)
    {
        return $this->app->request->post($input);
    }
    
    /**
    * orginaize errors from Form
    * 
    * @param input name
    * @param msg
    * @return array
    */
    
    private function addError($inputName, $msg)
    {
        if (! array_key_exists($inputName, $this->errors))
        {
            $this->errors[$inputName] = $msg;
        }
    }
    
    
    /**
    * Determine if the given input has all readey error
    * 
    * @param input name
    * @return boo;
    */
    
    private function hasError($inputName)
    {
        return array_key_exists($inputName, $this->errors);
    }
    
}