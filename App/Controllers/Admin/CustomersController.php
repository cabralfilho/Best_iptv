<?php

namespace App\Controllers\Admin;

use System\Controller;

class CustomersController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {
            
            $data['header'] = $this->load->controller('Admin/Common/Header')->index();
            $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
            $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();
            $data['cos'] = $this->showCosm();
            
            return $this->view->render("admin/customers", $data);
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
        $subject = $this->request->post('subject');
        
        $emailbody = $this->EmailFunc->msg($msg, $subject);
        
        $this->Email->sendE($email, $subject, $emailbody);
        
        return $this->showCosm();
    }
    
    
    /*
    * show all req in requeirment Table
    *
    * return mix
    */
    
    public function showCosm()
    {
      return  $this->load->model('Customers')->fetchReq();
    }
}

