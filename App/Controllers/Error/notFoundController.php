<?php

namespace App\Controllers\Error;

use System\Controller;

class NotFoundController extends Controller
{
    public function index()
    {
        return $this->view->render('not-found');
    }
}