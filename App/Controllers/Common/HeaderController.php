<?php

namespace App\Controllers\Common;

use System\Controller;

class HeaderController extends Controller
{
    
    /**
    * Display login form
    *
    * @return mixed
    */
    
    public function index()
    {
         $data['seoWords'] = $this->load->model('Seo')->fetchSeoWords();
         $data['seoDscr'] =  $this->load->model('Seo')->fetchSeoDscr();

         return $this->view->render('common/header', $data);
    }
    
  
}