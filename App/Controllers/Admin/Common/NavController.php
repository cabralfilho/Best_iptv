<?php

namespace App\Controllers\Admin\Common;

use System\Controller;

class NavController extends Controller
{
    
    /**
    * Display login form
    *
    * @return mixed
    */
    
    public function index()
    {
        if (preg_match("/\bdashboard\b/i", $this->request->server('REQUEST_URI'))){
            
            $data['dash'] = "";
        }
        else
        {
            $data['dash'] = "<li class='nav-item'>
                            <a href='" . url('/hmzd/dashboard') . "'class='nav-link'>Dashboard</a>
                            </li>" ;  
        }
        

        
        return  $this->view->render('admin/common/nav', $data);
    }
    
  
}