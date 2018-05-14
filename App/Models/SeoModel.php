<?php

namespace App\Models;

use System\Model;

class SeoModel extends Model
{

    /*
    * define table name 
    *
    * @var string    
    */
    
    protected $table = 'seo';
    
    /*
    * fanction to fetch all offers from datebase
    *
    * return void
    */
    
    public function fetchSeo()
    {
         $seo = $this->select('*')->fetch($this->table);
        
         $seoDscr =   "<tr>
                          <th class='b-col1 col4 '>search Word</th>
                          <td class='words'>" . $seo->keywords . "</td>
                          <td><i class='fas fa-pen-square fa-2x update-Seo' data-input='#up_words' data-take='.words' data-toggle='modal' data-target='#update-Seo-words'></i></td>    
                        </tr>
                        <tr>
                          <th class='b-col1 col4'>website Discription</th>
                          <td class = 'seo-dscr'>" . $seo->dscr . "</td>
                          <td><i class='fas fa-pen-square fa-2x update-Seo' data-input='#up_dscr'  data-take='.seo-dscr' data-toggle='modal' data-target='#update-Seo-dscr'></i></td>
                       </tr>";
        return $seoDscr;
    }
    

    /*
    * fanction to fetch all offers from datebase
    *
    * return void
    */
    
    public function fetchSeoWords()
    {
         $seo = $this->select('*')->fetch($this->table);
             
        return $seo->keywords;
    }
      
    
    /*
    * fanction to fetch all offers from datebase
    *
    * return void
    */
    
    public function fetchSeoDscr()
    {
         $seo = $this->select('*')->fetch($this->table);
             
        return $seo->dscr;
    }
    
    
    
    
    /**
    * update Seo controller discription
    *
    * return void
    */
    
    public function updateSeoDscr($dscr)
    {
        $this->data([
            "dscr" => $dscr,
        ])->where("id = ?", "1")->update($this->table);
    }
    
    /**
    * update Seo controller keywords
    *
    * return void
    */
    
    public function updateSeoWords($words)
    {
        $this->data([
            "keywords" => $words,
        ])->where("id = ?", "1")->update($this->table);
    }
    
}