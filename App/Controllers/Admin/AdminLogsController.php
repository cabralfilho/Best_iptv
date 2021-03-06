<?php

namespace App\Controllers\Admin;

use System\Controller;

class AdminLogsController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {
            
            $data['header'] = $this->load->controller('Admin/Common/Header')->index();
            $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
            $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();
            
           return $this->view->render("admin/adminLogs", $data);
        }
        else
        {
            $this->url->redircetTo('/hmzd');
        }
    }
}