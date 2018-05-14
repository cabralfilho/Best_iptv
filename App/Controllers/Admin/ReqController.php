<?php

namespace App\Controllers\Admin;

use System\Controller;

class ReqController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {
            
            $data['header'] = $this->load->controller('Admin/Common/Header')->index();
            $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
            $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();
            $data['req'] = $this->showReq();
            
            return $this->view->render("admin/req", $data);
        }
        else
        {
            $this->url->redircetTo('/hmzd');
        }
    }
    
    /*
    * send message to the costumers
    *
    * return mix
    */
    
    public function sendMsg()
    {
        $msg = $this->request->post('msg');
        $email = $this->request->post('email');
        
        $emailbody = $this->EmailFunc->msg("Code: " .$msg, "Your Connection Code");
        
        $this->Email->sendE($email, 'Connention From IPTV', $emailbody);
        
        $this->load->model('Req')->sendMsg($msg, $email);
        
        return $this->showReq();
    }
    
    /*
    * show all req in requeirment Table
    *
    * return mix
    */
    
    public function showReq()
    {
      return  $this->load->model('Req')->fetchReq();
    }
    

}