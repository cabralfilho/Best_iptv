<?php

namespace App\Controllers\Admin;

use System\Controller;

class TrailsController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {
            $data['header'] = $this->load->controller('Admin/Common/Header')->index();
            $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
            $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();
            
            $data['trails'] = $this->showTrails();
            
            return $this->view->render("admin/trails", $data);
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
        
        $emailbody = $this->EmailFunc->msg("Code: " .$msg, "Your Trail Code");
        
        $this->Email->sendE($email, 'Trail From IPTV', $emailbody);
        
        $this->load->model('Trail')->sendMsg($msg, $email);
        
        return $this->showTrails();
    }
    
    
    /*
    * show all trails in trails Table
    *
    * return mix
    */
    
    public function showTrails()
    {
      return  $this->load->model('Trail')->fetchTrails();
    }
}