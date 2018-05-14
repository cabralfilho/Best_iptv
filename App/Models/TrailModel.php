<?php

namespace App\Models;

use System\Model;

class TrailModel extends Model
{
    /*
    * Table name
    *
    * @var string
    */
    
    protected $table = 'trails';
    
    
    
    /**
    * Determine if the given login data is valid
    *
    * @param string $email
    * @param string $pass
    * @return bool
    */
    
    public function isValidreq($email)
    {
        $email = $this->where('email=?' , $email)->fetch($this->table);
        
        if ($email) return false;
        
        return true;
        
    }
    
    
    /**
    * Determine whether the user is logged in 
    *
    *
    * @return bool
    */
    
    public function saveTrail($name, $email, $country, $device, $ip)
    {
        
        $this->data([

            'name'    => $name,
            'email'   => $email,
            'country' => $country,
            'Device_type' => $device,
            'time' => date('Y/m/d'),
            'ip'      => $ip,
            'status'  => "0",

        ])->insert('trails');
            
    }
    
    /*
    * fanction to fetch all tarails data from datebase
    *
    * return mix
    */
    
    public function fetchTrails()
    {
        $trails = $this->select('*')->orderBy("id", "DESC")->fetchAll($this->table);
        
        $allTrials ="";
        
        foreach($trails as $trail)
        {            
            $class = $trail->status == "0" ? "b-col3" : "";
            $allTrials .= "<tr class='" . $class . "'>
                              <th>" . $trail->id . "</th>
                              <th class='search-in'>" . $trail->name . "</th>
                              <td class='cos-email search-in'>" . $trail->email . "</td>
                              <td class='cos-email search-in'>" . $trail->Device_type . "</td>
                              <td>" . $trail->time . "</td>
                              <td>" . $trail->country . "</td>
                              <td class= 'action'><i class='fas fa-envelope fa-2x send-msg' data-take='.cos-email' data-input='#email' data-target='#send-msg' data-toggle='modal'></i></td>
                           </tr>";
        }
        
        return $allTrials;
    } 
    
    
    /*
    * fanction to fetch all tarails data from datebase
    *
    * return mix
    */
    
    public function fetchDashTrails()
    {
        $trails = $this->select('*')->where('status = ?', "0")->orderBy("time","DESC")->limit('5')->fetchAll($this->table);
        
        $allTrials ="";
        
        foreach($trails as $trail)
        {            
            $allTrials .= "<tr>
                              <td class='cos-email'>" . $trail->email . "</td>
                              <td class= 'action'><i class='fas fa-envelope fa-2x send-msg' data-take='.cos-email' data-input='#email' data-target='#send-trail-msg' data-toggle='modal'></i></td>
                           </tr>";
        }
        
        return $allTrials;
    }

        
    
    /*
    *  send trail message to the custumer 
    *
    *  return bool
    */
    
    public function sendMsg($msg, $email)
    {
        
        $req = $this->select(' *')->where("email = ?", $email)->fetch($this->table);
            
        $this->data([
            "status" => "1",
        ])->where("email = ?", $email)->update($this->table);
        
        return $msg;
    }
    
    
    
    
    /*
    * count the trail number
    *
    * return int
    */
    
    public function num()
    {
        $reqs = $this->select('*')->where("status = ?", "1")->fetchAll($this->table);
        
        $num = $this->rows();
        
        return $num;
    } 
    
    /*
    * count the new trail number 
    *
    * return int
    */
    
    public function numPlus()
    {
        $reqs = $this->select('*')->where("status = ?", '0')->fetchAll($this->table);
        
        $num = $this->rows();
        
        return $num;
    }
    
}