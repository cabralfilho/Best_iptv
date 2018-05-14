<?php

namespace App\Models;

use System\Model;

class ReqModel extends Model
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
    * return mix
    */
    
    public function fetchReq()
    {
        $reqs = $this->select('*')->where("status = ?", "0")->fetchAll($this->table);
        
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
                              <td>" . $req->device . "</td>
                              <td>" . $req->country . "</td>
                              <td>" . $req->time_paied . "<br>" . $req->ext_time . "</td>
                              <td class= 'action'><i class='fas fa-envelope fa-2x send-msg' data-take='.cos-email' data-input='#email' data-target='#send-msg' data-toggle='modal'></i></td>
                           </tr>";

        }
        
        return $allReqs;
    }


    /*
    *  send message to the custumer 
    *
    *  return bool
    */
    
    public function sendMsg($msg, $email)
    {
        
        $req = $this->select(' *')->where("email = ? AND status = ? ", $email, '0')->fetch($this->table);
        
        $amount = filter_var($req->amount, FILTER_SANITIZE_NUMBER_FLOAT);
        
        $offer = $this->select(' *')->where("price=?", $amount)->fetch('offers');

        if(!isset($offer->duration_num) || empty(($offer->duration_num)))
        {
            $dur_num = "0";
            $dur_end = "0";
            $dur_type = "0";
        }
        else
        {
            $dur_num = $offer->duration_num;
            $dur_end = $this->endTime($offer->duration_num, $offer->duration_type);
            $dur_type = $offer->duration_type;
        }
         
        $this->data([
            "status" => "1",
            "dur_num" => $dur_num,
            "dur_type" => $offer->duration_type,
            "time" => $this->timeNow(),
            "time_end" => $dur_end,
        ])->where("email = ? AND status = ?", $email, "0")->update($this->table);
        
        return $msg;
    }
    
    /*
    *  return dete now
    *
    *  return time
    */
    
    public function timeNow()
    {
        return date("Y/m/d");
    }
    
    /*
    *  calculate the end time for the request
    *
    *  return time
    */
    
    public function endTime($dur_num, $dur_type)
    {        
        return date('Y/m/d', strtotime("+" . $dur_num . " " . $dur_type));
    }
    
    
    
    /*
    * count the request number
    *
    * return int
    */
    
    public function num()
    {
        $reqs = $this->select('*')->where("status = ?", "0")->fetchAll($this->table);
        
        $num = $this->rows();
        
        return $num;
    }
    
    /*
    * count website profits
    *
    * return int
    */
    
    public function Profits()
    {
        $reqs = $this->select('amount')->fetchAll($this->table);
        
        $profits = 0;
        
        
        
        foreach ($reqs as $value)
        {
            $value = filter_var($value->amount , FILTER_SANITIZE_NUMBER_INT);
            
            $profits = $profits + $value;
        }
        
        return $profits;
    }
    
    
    /*
    * fanction to fetch all req data from datebase
    *
    * return mix
    */
    
    public function fetchDashReq()
    {
        $reqs = $this->select('email, amount')->where('status = ?', "0")->orderBy("time","DESC")->limit('5')->fetchAll($this->table);
        
        $allreqs ="";
        
        foreach($reqs as $req)
        {            
            $allreqs .= "<tr>
                              <td class='cos-email'>" . $req->email . "</td>
                              <td >" . $req->amount . "</td>
                              <td class= ''><i class='fas fa-envelope fa-2x send-msg' data-take='.cos-email' data-input='#email2' data-target='#send-req-msg' data-toggle='modal'></i></td>
                           </tr>";
        }
        
        return $allreqs;
    }

}
    
    