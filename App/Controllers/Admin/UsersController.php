<?php

namespace App\Controllers\Admin;

use System\Controller;

class UsersController extends Controller
{
    
    /**
    * Display login form
    *
    * @return mixed
    */
    
    public function index()
    {

        echo "users";
        pre($this->adminLayout);
        
    }
    
    
}