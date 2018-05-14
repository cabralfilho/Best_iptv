<?php

namespace App\Controllers\Admin;

use System\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {            
           $data['header'] = $this->load->controller('Admin/Common/Header')->index();
           $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
           $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();
            
            // datebase facts
            
            $data['cos']        = $this->load->model('Customers')->num();
            $data['reqs']       = $this->load->model('Req')->num();
            $data['trails']     = $this->load->model('Trail')->num();
            $data['TrailsPlus'] = $this->load->model('Trail')->numPlus();
            $data['visters']    = $this->load->model('Vist')->num();
            $data['prof']    = $this->load->model('Req')->Profits();
            
            // show the new trails request
            
            $data['trailsTable'] = $this->showTrails();
            
            // show the new trails request
            
            $data['reqsTable'] = $this->showReqs();
            
           return $this->view->render("admin/dashboard", $data);
        }
        else
        {
            $this->url->redirectTo('/hmzd');
        }
    }
    
    /*
    * show all req in requeirment Table
    *
    * return mix
    */
    
    public function showTrails()
    {
      return  $this->load->model('Trail')->fetchDashTrails();
    }
    
    
    /*
    * show all req in requeirment Table
    *
    * return mix
    */
    
    public function showReqs()
    {
      return  $this->load->model('Req')->fetchDashReq();
    }
    
    /*
    * send message to the costumers
    *
    * return mix
    */
    
    public function sendReqMsg()
    {
        $msg = $this->request->post('msg');
        $email = $this->request->post('email2');
        
        $this->load->model('Req')->sendMsg($msg, $email);
        
        return $this->showReqs();
    }
    
    
    /*
    * send message to the costumers
    *
    * return mix
    */
    
    public function sendTrailMsg()
    {
        $msg = $this->request->post('msg');
        $email = $this->request->post('email');
        
        $this->load->model('Trail')->sendMsg($msg, $email);
        
        return $this->showTrails();
    }
    
}