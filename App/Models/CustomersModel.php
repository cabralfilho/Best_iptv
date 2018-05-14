<?php

namespace App\Models;

use System\Model;

class CustomersModel extends Model
{

    /*
    * define table name 
    *
    * @var string    
    */
    
    protected $table = 'req';
    
    /*
    * fanction to fetch all offers from datebase
    *
    * return void
    */
    
    public function fetchReq()
    {
        $reqs = $this->select('*')->where("status = ?", "1")->fetchAll($this->table);
        
        $allReqs ="";
        
        foreach($reqs as $req)
        {
            $mal = $req->mal > 1 ? "( " . $req->mal . " )" : "1";

            $allReqs .= "<tr>
                              <th>" . $req->id . "</th>
                              <td class=' search-in'>" . $req->name . "</td>
                              <td class='cos-email search-in'>" . $req->email . "</td>
                              <td>" . $mal . "</td>
                              <td>" . $req->amount . "</td>
                              <td>" . $req->dur_num . " " . $req->dur_type . "</td>
                              <td>" . $req->time_paied . "<br>" . $req->ext_time . "</td>
                              <td>" . $req->time. " - " . $req->time_end ."</td>
                              <td>" . $req->country . "</td>
                              <td>" . $req->device . "</td>
                              <td class= 'action'><i class='fas fa-envelope fa-2x send-msg' data-take='.cos-email' data-input='#email' data-target='#send-msg' data-toggle='modal'></i></td>
                           </tr>";
        }
        
        return $allReqs;
    }
    
    
    
    /*
    * count the customers number
    *
    * return int
    */
    
    public function num()
    {
        $reqs = $this->select('*')->where("status = ?", "1")->fetchAll($this->table);
        
        $num = $this->rows();
        
        return $num;
    }
}