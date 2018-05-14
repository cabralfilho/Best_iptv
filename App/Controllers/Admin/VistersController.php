<?php

namespace App\Controllers\Admin;

use System\Controller;

class VistersController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {
            
            
            $data['header'] = $this->load->controller('Admin/Common/Header')->index();
            $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
            $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();    
           
            $data['visters'] = $this->showVisters();
                
            return $this->view->render("admin/visters", $data);
        }
        else
        {
            $this->url->redircetTo('/hmzd');
        }
    }
    
    
    /*
    * show all vister data in vister Table
    *
    * return mix
    */
    
    public function showVisters()
    {
      return  $this->load->model('Vist')->fetchVist();
    }
}