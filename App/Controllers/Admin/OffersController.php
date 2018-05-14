<?php

namespace App\Controllers\Admin;

use System\Controller;

class OffersController extends Controller
{
    public function index()
    {
        if ($this->load->model('Login')->isLogged())
        {
            
            $data['header'] = $this->load->controller('Admin/Common/Header')->index();
            $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
            $data['nav'] = $this->load->controller('Admin/Common/Nav')->index();
            $data['offers'] = $this->showOffers();
            
            return $this->view->render("admin/offers", $data);
        }
        else
        {
            $this->url->redircetTo('/hmzd');
        }
    }
    
    /*
    * add new offers to database
    *
    * return mix
    */
    
    public function Addoffer()
    {
        $price = $this->request->post('price');
        $money_type = $this->request->post('price-type');
        $duration_type = $this->request->post('duration_type');
        $duration_num = $this->request->post('duration_num');

        $this->load->model('Offers')->insertOffer($price, $money_type, $duration_type, $duration_num);
        
        return $this->showOffers();
        
    }
    
    /*
    * Update offers 
    *
    * return mix
    */
    
    public function updateOffers()
    {
        $id = $this->request->post('id');
        $price = $this->request->post('price');
        $money_type = $this->request->post('price-type');
        $duration_type = $this->request->post('duration_type');
        $duration_num = $this->request->post('duration_num');

        $this->load->model('Offers')->updateOffer($id, $price, $money_type, $duration_type, $duration_num);
        
        return $this->showOffers();
        
    }
    
    
    
    /*
    * delete offers 
    *
    * return mix
    */
    
    public function deleteOffer()
    {
        $id = $this->request->post('id');

        $this->load->model('Offers')->deleteOffer($id);
        
        return $this->showOffers();
        
    }
    
    
    /*
    * show all offers in offers Table
    *
    * return mix
    */
    
    public function showOffers()
    {
      return  $this->load->model('Offers')->fetchOffers();
    }
}