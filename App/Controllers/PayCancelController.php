<?php

namespace App\Controllers;

use System\Controller;

class PayCancelController extends Controller
{
    public function index()
    {
        
        $data['header'] = $this->load->controller('Common/Header')->index();
        $data['footer'] = $this->load->controller('Common/Footer')->index();
        
        return $this->view->render("payCancel", $data);
    }
    
}
?>