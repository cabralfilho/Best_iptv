<?php

namespace App\Controllers;

use System\Controller;

class PaySucsController extends Controller
{
    
    protected $errors = [];
    
    public function index()
    {
        if($this->session->has('payidHmZd') || $this->session->has('payidHmZd'))
        {
            $this->url->redirectTo('/');  
        }
        else
        {
            $this->cookie->set('payidHmZd', true, 8000);
            $this->session->set('payidHmZd', true);

            $data['header'] = $this->load->controller('Common/Header')->index();
            $data['footer'] = $this->load->controller('Common/Footer')->index();

            $data['time_paied'] = date('Y/m/d');
            $data['ext_time_paied'] = date('H:i:s'); 

            return $this->view->render("paySucs", $data);
        }
    }
    
    
    public function sucs()
    {
        $json =[];
        
        if($this->isVail())
        {
            $ip = $this->ip->getIp();
            
            $ipInfo = $this->ip->ipInfo($ip);
        
            if($ip)
            {
                $ipCountry = $ipInfo->country_name;
                $ipCity = $ipInfo->city;
            }
            else
            {
                $ipCountry = 0;
                $ipCity = 0;
            }
            
            $name  = $this->request->post('full_name');
            $email = $this->request->post('email');
            $match = $this->request->post('many-match');
            $device = $this->request->post('device');
            $match_type = $this->request->post('many_type');
            $time_paied = $this->request->post('time_paied');
            $ext_time = $this->request->post('ext_time_paied');
            
            $this->load->model('Sucs')->saveReq($name, $email, $match, $device, $match_type, $time_paied, $ext_time, $ip, $ipCountry, $ipCity);
            
            $EmailBody = "Hi hussam i'm your website this Email Required IPTV Connection " . $this->request->post('email') . "<br>he has this device: " . $this->request->post('Device-type') . "<br><br> Please vist my Trail Page: http://www.best-iptv4k.com//hmzd/req"; 
            $EmailBody2 = "Hi zaid i'm your website this Email Required IPTV Connection " . $this->request->post('email') . "<br>he has this device: " . $this->request->post('Device-type') . "<br><br> Please vist my Trail Page: http://www.best-iptv4k.com//hmzd/req"; 
            
            $this->Email->sendE("hussamobeid4@gmail.com", 'Paied ' .$match . $match_type, $EmailBody);
            $this->Email->sendE("zeidkaled44@gmail.com", 'Paied ' .$match . $match_type, $EmailBody2);
            
            $json['success'] = "you will recive the your IPTV connection in 12 Hours";
            $json['do'] = "true";
            
            
        }
        else
        {
            $json['errors'] = implode("<br>", $this->errors);
        }
        
        return $this->json($json);
        
    }
    
    
    
    public function isVail()
    {
        $email      = $this->request->post('email');
        $name       = $this->request->post('full_name');
        $many_match = $this->request->post('many-match');
        $device     = $this->request->post('device');
        
        if (! $email)
        {
            $this->errors[] = 'please insert EMAIL ADRESS';
        }
        elseif (! filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->errors[] = 'Please insert valid EMAIL';
        }
        
        if (!$name)
        {
            $this->errors[] = 'please insert your name';
        }
        elseif(! filter_var($name, FILTER_SANITIZE_STRING))
        {
            $this->errors[] = 'please insert valid name';
        }
        
        if (!$device)
        {
            $this->errors[] = 'please insert your device name';
        }
        elseif(! filter_var($device, FILTER_SANITIZE_STRING))
        {
            $this->errors[] = 'please insert valid device name';
        }
        
        if (!$many_match)
        {
            $this->errors[] = 'please insert Hwo match your paied';
        } 
        elseif(! filter_var($many_match, FILTER_SANITIZE_NUMBER_FLOAT))
        {
            $this->errors[] = 'please insert valid Number';
        }
        
        if (! $this->errors)
        {
            $loginModel = $this->load->model('Sucs');

            if(! $loginModel->isValidreq($email))
            {
                $this->errors[] = 'Invalid request Data, This Email have paied his IPTV Connection';
            }   
        }
        
        return empty($this->errors); 
        
    }
    
}