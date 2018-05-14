<?php

namespace App\Models;

use System\Model;

class SucsModel extends Model
{
    /*
    * Table name
    *
    * @var string
    */
    
    protected $table = 'req';
    
    
    
    /**
    * Determine if the given login data is valid
    *
    * @param string $email
    * @param string $pass
    * @return bool
    */
    
    public function isValidreq($email) 	
    {        
        $RTime = date('Y-m-d', strtotime("-1 month"));
        $now = date('Y-m-d');

        $email = $this->where("email=? AND time_paied >?" , $email, $RTime)->fetch($this->table);
        
        if ($email) return false;
        
        return true;
        
    }
    
    
    /**
    * Determine if the given login data is valid
    *
    * @param string $email
    * @param string $pass
    * @return bool
    */
    
    public function saveReq($name, $email, $match, $device, $match_type, $time_paied, $ext_time, $ip, $ipCountry, $ipCity)	
    {
        $this->data([

            'name'    => $name,
            'email'   => $email,
            'country' => $ipCountry,
            'city'    => $ipCity,
            'device' => $device,
            'amount' => $match.$match_type,
            'time_paied' => $time_paied,
            'ext_time' => $ext_time,
            'ip'      => $ip,
            'status'  => "0",

        ])->insert($this->table);
        
    }
}

?>