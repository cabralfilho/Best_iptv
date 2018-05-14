<?php

namespace App\Controllers\Admin;

use System\Controller;

class CccamController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {
            
            $data['header'] = $this->load->controller('Admin/Common/Header')->index();
            $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
            $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();
            $data['cccam'] = $this->showCccam();
            
            return $this->view->render("admin/cccam", $data);
        }
        else
        {
            $this->url->redircetTo('/hmzd');
        }
    }
    
    /*
    * Update Seo controller 
    *
    * return mix
    */
    
    public function updateCccamCode()
    {
        $dscr = $this->request->post('up_dscr');

        $this->load->model('Cccam')->updateCccamCode($dscr);
        
        return $this->showCccam();
        
    }
    
    
    /*
    * show seo keyword and discrption
    *
    * return mix
    */
    
    public function showCccam()
    {
      return  $this->load->model('Cccam')->fetchCccam();
    }
}