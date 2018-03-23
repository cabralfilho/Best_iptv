<?php

namespace App\Controllers\Admin\Common;

use System\Controller;
use System\view\ViewInterface;

class LayoutController extends Controller
{
    
    /**
    * Render the layout with the given view Object
    *
    * @param \System\View\ViewInterface $view
    */
    
    public function render(ViewInterface $view)
    {

        $data['content'] = $view;
        
        $data['header'] = $this->load->controller('admin/Common/Header')->index();
        $data['footer'] = $this->load->controller('admin/common/footer')->index();
        $data['sidnav'] = $this->load->controller('admin/common/sidnav')->index();
     
        return $this->view->render('admin/common/layout', $data);
    }
    
  
}