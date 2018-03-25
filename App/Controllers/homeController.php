<?php

namespace App\Controllers;

use System\Controller;

class HomeController extends Controller
{
    public function index()
    {

       $this->validator->required('name')->isEmail('email');
       pre($this->validator->getMsg()); 
       return $this->view->render("home");
        
        
    }
}