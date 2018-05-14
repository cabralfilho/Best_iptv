<?php

namespace App\Controllers\Admin;

use System\Controller;

class SeoController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {
            
            $data['header'] = $this->load->controller('Admin/Common/Header')->index();
            $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
            $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();
            $data['seo'] = $this->showSeo();
            
            return $this->view->render("admin/seo", $data);
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
    
    public function updateSeoDscr()
    {
        $dscr = $this->request->post('up_dscr');

        $this->load->model('Seo')->updateSeoDscr($dscr);
        
        return $this->showSeo();
        
    }
    
    /*
    * Update Seo controller 
    *
    * return mix
    */
    
    public function updateSeoWords()
    {
        $keywords = $this->request->post('up_words');
 
        $this->load->model('Seo')->updateSeoWords($keywords);
        
        return $this->showSeo();
        
    }
    
    
    /*
    * show seo keyword and discrption
    *
    * return mix
    */
    
    public function showSeo()
    {
      return  $this->load->model('Seo')->fetchSeo();
    }
}