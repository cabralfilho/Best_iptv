<?php

namespace App\Models;

use System\Model;

class VistModel extends Model
{

    /*
    * define table name 
    *
    * @var string    
    */
    
    protected $table = 'vister';
    
    
    /*
    * last id inserted
    *
    * @var in    
    */
    
    private $lastID;
    
    /*
    * fanction to fetch all vist data from datebase
    *
    * return mix
    */
    
    public function fetchVist()
    {
        $visters = $this->select('*')->orderBy('id', 'DESC')->fetchAll($this->table);
        
        $allvisters ="";
        
        foreach($visters as $vister)
        {
            $device_size = filter_var($vister->device , FILTER_SANITIZE_NUMBER_INT);
            
            if ($device_size <= 500)
            {
                $device = "Mobil";
            }
            elseif ($device_size >= 500 && $device_size < 800)
            {
                $device = "Ipad";
            }
            elseif ($device_size > 800)
            {
                $device = "Cumputer";
            }
            
            
            if (empty($vister->time_end))
            {
                $dur = "0.333 minute";
            }
            else
            {
                $dur =  round(abs(strtotime($vister->time_start)  - strtotime($vister->time_end)) / 60,2). " minute";
            }
            
            $allvisters .= "<tr>
                              <th>" . $vister->id . "</th>
                              <td >" . $vister->land . "</td>
                              <td >" . $vister->city . "</td>
                              <td>" . $device . "</td>
                              <td>" . $vister->vist_time . "</td>
                              <td>" . $dur . "</td>
                           </tr>";
        }
        
        return $allvisters;
    }
    
    
    /*
    * count the page vister
    *
    * return int
    */
    
    public function num()
    {
        $reqs = $this->select('*')->fetchAll($this->table);
        
        $num = $this->rows();
        
        return $num;
    }
    
    
    /*
    * inset the vist data to databasa
    *
    * return void
    */
    
    public function load($pageWidth, $ip, $country, $city)
    {  
       $lastId = $this->data([
            "device" => $pageWidth,
            "ip" => $ip,
            "land" => $country,
            "city" => $city,
            "vist_time" => date("Y/m/d"),
            "time_start" => date("g:i:s a"),
        ])->insert($this->table)->lastId();
        
        $this->lastID = $lastId;
        
       if(isset($this->lastID) && !empty($this->lastID))
       {
           $id = $this->lastID;
       }else
       {
           $id ="false";
       }
        return $id;
    } 
    
    /*
    * function to add last time, that user is in the website 
    *
    * return void
    */
    
    public function online($id)
    {
        $this->data([
            "time_end" => date("g:i:s a"),
        ])->where('id = ?', $id)->update($this->table);
        
        if(isset($this->lastID) && !empty($this->lastID))
                   {
           $id = $this->lastID;
       }else
       {
           $id =" false";
       }
        return $id;
        
    }
    
}