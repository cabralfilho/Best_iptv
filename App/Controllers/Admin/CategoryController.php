<?php

namespace App\Controllers\Admin;

use System\Controller;

class CategoryController extends Controller
{
    
    /**
    * Display login form
    *
    * @return mixed
    */
    
    public function index()
    {
        $this->html->setTitle("cate");
        
        echo $this->adminLayout->render($this->view->render('admin/categories/list'));
        
    }
    
  
}