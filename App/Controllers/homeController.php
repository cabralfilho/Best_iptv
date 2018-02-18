<?php

namespace App\Controllers;

use System\Controller;
use System\database;

class HomeController extends Controller
{
    public function index()
    {
     

        $db = new Database($this->app);    
    }
}