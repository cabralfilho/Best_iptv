<?php

namespace App\Controllers\Admin\Common;

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

        return $this->view->render('admin/common/header');
    }
    
  
}