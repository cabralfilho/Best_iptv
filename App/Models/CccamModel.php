<?php

namespace App\Models;

use System\Model;

class CccamModel extends Model
{

    /*
    * define table name 
    *
    * @var string    
    */
    
    protected $table = 'cccam';
    
    /*
    * fanction to fetch all offers from datebase
    *
    * return void
    */
    
    public function fetchCccam()
    {
         $seo = $this->select('*')->fetch($this->table);
        
         $seoDscr =   "<tr>
                          <th class='b-col1 col4'>CCCAM LINK</th>
                          <td class = 'seo-dscr'>" . $seo->code . "</td>
                          <td><i class='fas fa-pen-square fa-2x update-Seo' data-input='#up_dscr'  data-take='.seo-dscr' data-toggle='modal' data-target='#update-Seo-dscr'></i></td>
                       </tr>";
        return $seoDscr;
    }
    

    /*
    * fanction to fetch all offers from datebase
    *
    * return void
    */
    
    public function fetchCccamCode()
    {
         $seo = $this->select('*')->fetch($this->table);
             
        return $seo->code;
    }
    
    
    
    /**
    * update Seo controller discription
    *
    * return void
    */
    
    public function updateCccamCode($dscr)
    {
        $this->data([
            "code" => $dscr,
        ])->where("id = ?", "1")->update($this->table);
    }
    
}