<?php

namespace App\Controllers;

use System\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if(!isset($_SERVER['HTTPS']))  header("Location:https://www.best-iptv4k.com");
        
        $langsValues = $this->lang->load("home");
               
        $data['header'] = $this->load->controller('Common/Header')->index();
        $data['footer'] = $this->load->controller('Common/Footer')->index();
        
        $data['offers'] = $this->load->model('Offers')->fetchOffersFront();
        $data['cccamCode'] = $this->load->model('Cccam')->fetchCccamCode();

        

        if ($this->cookie->has("trail4k")) 
        {
            $data["trialBtn"] = "disabled";
            
            $data["contentBtn"] = "You have received your experiment";
        }
        else
        {
            $data["trialBtn"] = "";
            $data["contentBtn"] = $this->lang->get("form_1");
        }
        
        $data = array_merge($langsValues, $data);
        
        return $this->view->render("home", $data);
    }
   
    /**
    * submit tail form
    *
    * @return mixing
    */
    
    public function submitTrail()
    {
        $json =[];
        
        if($this->isValidTrail())
        {
            $this->load->model('Trail')->saveTrail($this->request->post('name'), $this->request->post('email'), $this->request->post('country'), $this->request->post('Device-type'), $this->ip->getIp());
            
            $EmailBody = "Hi hussam i'm your website this Email Required IPTV Trail " . $this->request->post('email') . "<br>he has this device: " . $this->request->post('Device-type') . "<br><br> Please vist my Trail Page: http://www.best-iptv4k.com//hmzd/trails"; 
            
            $this->Email->sendE("hussamobeid4@gmail.com", 'Trail Request', $EmailBody);
            
            $json['success'] = "you will recive the trail in 12 Hours";
            $json['cookie'] = "trail4k";
            $json['cookieVal'] = "true";
            
        }
        else
        {
            $json['errors'] = implode("<br>", $this->errors);
        }
        
        return $this->json($json);
    }
    
    /**
    * submit contact form
    *
    * @return mixing
    */
       
    public function submitContact()
    {
        $json = [];
        
        if($this->isValidEmail())
        {
            $name    = $this->request->post('name');
            $email   = $this->request->post('email');
            $phone   = $this->request->post('phone');
            $subject = $this->request->post('subject');
            $msg     = strip_tags($this->request->post('msg'));
            
            $EmailBody   = "HI Hussam you have now message please Vist: https://best-iptv4k.com:2096/cpsess1455114106/webmail/paper_lantern/index.html?login=1&post_login=87161455459560";
            $EmailBody2  = "HI Zaid you have now message please Vist: https://best-iptv4k.com:2096/cpsess1455114106/webmail/paper_lantern/index.html?login=1&post_login=87161455459560";
            $EmailBody3  = "Name :" . $name . "<br> Email:" . $email . "<br> phone:" . $phone . "<br><br><br>" . $msg;
                
            $this->Email->sendE("hussamobeid4@gmail.com", 'Question Eamil', $EmailBody);
            $this->Email->sendE("zeidkaled44@gmail.com", 'Question Email', $EmailBody2);
            $this->Email->sendE("best@best-iptv4k.com", $subject, $EmailBody3);
            
            $json['success'] = 'Thank you, We will answer your email as soon as possible';
        }
        else
        {
            $json['errors'] = implode("<br>", $this->errors);
            
        }
        
         return $this->json($json);
    }
    
    /*
    * send ip and page width to datebase
    *
    * return void
    */
    
    public function load()
    {
        $pageWidth = $this->request->post('pageWidth');
        
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
        
        $id = $this->load->model('Vist')->load($pageWidth, $ip, $ipCountry, $ipCity);
        $json = [];
        $json{'id'} = $id;
        return json_encode($json);
    }
    
    
    /*
    * sent the last online time for the user 
    *
    * return void
    */
    
    public function online()
    {
      $id =  $pageWidth = $this->request->post('id');
      $this->load->model('Vist')->online($id);
      
    } 
    
    /**
    * Validate tail form
    *
    * @return bool
    */
    
    private function isValidTrail()
    {
        $name    = $this->request->post('name');
        $email   = $this->request->post('email');
        $country = $this->request->post('country');
        $Device_type = $this->request->post('Device-type');
        
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
        
        if (!$country)
        {
            $this->errors[] = 'please insert your country name';
        } 
        elseif(! filter_var($country, FILTER_SANITIZE_STRING))
        {
            $this->errors[] = 'please insert valid country';
        }
        
        if (!$Device_type)
        {
            $this->errors[] = 'please insert your country name';
        } 
        elseif(! filter_var($Device_type, FILTER_SANITIZE_STRING))
        {
            $this->errors[] = 'please insert valid country';
        }
        
        if (! $this->errors)
        {
            $loginModel = $this->load->model('Trail');

            if(! $loginModel->isValidreq($email))
            {
                $this->errors[] = 'Invalid login Data';
            }   
        }
        
        return empty($this->errors);        
    }
    
    /**
    * Validate contact form
    *
    * @return array
    */
    
    private function isValidEmail()
    {
        $name    = $this->request->post('name');
        $email   = $this->request->post('email');
        $phone   = $this->request->post('phone');
        $subject = $this->request->post('subject');
        $msg     = strip_tags($this->request->post('msg'));
        
        if (! $email)
        {
            $this->errors[] = 'please insert EMAIL ADRESS';
        }
        elseif (! filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->errors[] = 'Please insert valid EMAIL';
        }
        
        if (! $name)
        {
            $this->errors[] = 'please insert your name';
        }
        elseif(! filter_var($name, FILTER_SANITIZE_STRING))
        {
            $this->errors[] = 'please insert valid name';
        }
        
        if (! $phone)
        {
            $this->errors[] = 'please insert your phone';
        }
        else if(! filter_var($phone, FILTER_SANITIZE_NUMBER_INT))
        {
            $this->errors[] = 'please insert valid phone number';
        }
        
        if (! $subject)
        {
            $this->errors[] = 'please insert subject for your Email';
        }
        elseif (! filter_var($name, FILTER_SANITIZE_STRING))
        {
            $this->errors[] = 'please insert valid SUBJECT without numbers or CHARS';
        }
        if (! $msg)
        {
            $this->errors[] = 'please write your Message';
        }
        
        
        return empty($this->errors);        
    }
}