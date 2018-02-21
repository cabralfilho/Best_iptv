<?php

namespace App\Controllers\Admin;

use System\Controller;

class LoginController extends Controller
{
    
    /**
    * Display login form
    *
    * @return mixed
    */
    
    public function index()
    {
        return $this->view->render('admin/users/login');
        
    }
    
    
    /**
    * submit login form
    *
    * @return mixed
    */
    
    public function submit()
    {
        pre($this->request->post("email"));
        
    }
}