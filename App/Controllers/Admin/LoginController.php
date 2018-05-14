<?php

namespace App\Controllers\Admin;

use System\Controller;

class LoginController extends Controller
{
    
    /**
    * Display login form
    *
    * @return mixed
    */
    
    public function index()
    {
        $loginModel = $this->load->model('Login');
        
        if ($loginModel->isLogged())
        {
            return $this->url->redirectTo('/hmzd/dashboard');
        }
        
        $data['header'] = $this->load->controller('Admin/Common/Header')->index();
        $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();

        return $this->view->render('admin/users/login', $data);
    }
    
    
    /**
    * submit login form
    *
    * @return mixed
    */
    
    public function submit()
    {
        $json = [];
        
        if($this->isValid())
        {
            $loginModel  = $this->load->model('Login');
            
            $logInUser = $loginModel->user();
            
            if ($this->request->post('remb'))
            {
                // save login data in cookie
               $json['cookie'] = "login";
               $json['cookieVal'] = $logInUser->code;
            }
            else
            {
                // save login data in session
                $this->session->set('login', $logInUser->code);
            }
            
            $json['success'] = 'Welcome Back ' . $logInUser->name;
            
            $json['redirect'] = $this->url->link('/hmzd/dashboard');
        }
        else
        {
            $json['errors'] = implode("<br>", $this->errors);
            
        }
         return $this->json($json);
    }
    
    /**
    * Validate login from
    *
    * @return bool
    */
    
    private function isValid()
    {
        $name = $this->request->post('name');
        $pass  = $this->request->post('password');
        
        if (! $name)
        {
            $this->errors[] = 'please insert EMAIL ADRESS';
        }
        
        if (!$pass)
        {
            $this->errors[] = 'please insert PASSWORD';
        }
        
        if (! $this->errors)
        {
            $loginModel = $this->load->model('Login');

            if(! $loginModel->isValidLogin($name, $pass))
            {
                $this->errors[] = 'Invalid login Data';
            }   
        }
        
        return empty($this->errors);        
    }
}