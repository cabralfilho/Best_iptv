<?php

namespace App\Models;

use System\Model;

class LoginModel extends Model
{
    /*
    * Table name
    *
    * @var string
    */
    
    protected $table = 'admins';
    
    
    /*
    * loged user
    *
    * @var stClass
    */
    
    private $users;
    
    /**
    * Determine if the given login data is valid
    *
    * @param string $email
    * @param string $pass
    * @return bool
    */
    
    public function isValidLogin($name ,$pass)
    {
        $user = $this->where('name=?', $name)->fetch($this->table);
        
        if (! $user) return false;
        
        $this->user = $user;
        
        return password_verify($pass, $user->pass);
    }
    
    /**
    * Get logged in user data
    *
    * @return \stdClass
    */
    
    public function user()
    {
        return $this->user; 
    }
    
    
    /**
    * Determine whether the user is logged in 
    *
    *
    * @return bool
    */
    
    public function isLogged()
    {
        if($this->cookie->has('login'))
        {
            $code = $this->cookie->get('login');
        }
        elseif ($this->session->has('login'))
        {
            $code = $this->session->get('login');
        }
        else
        {
            $code = '';
        }
        
        $user = $this->where('code=?' , $code)->fetch($this->table);
        
        if (! $user) return false;
        
        $this->user = $user;
        
        return true;
    }

 
}