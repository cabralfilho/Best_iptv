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
        $loginModel = $this->load->model('login');
        
        if ($loginModel->isLogged())
        {
//            return $this->url->redirectTo('/admin');
        }
        
        return $this->view->render('admin/users/login');
        
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
            $loginModel  = $this->load->model('login');
            $logInUser = $loginModel->user();
            
            if ($this->request->post('remb'))
            {
                // save login data in cookie
                $this->cookie->set('login', $logInUser->code);
            }
            else
            {
                // save login data in session
                $this->session->set('login', $logInUser->code);
            }
            
            $json['success'] = 'Welcome Back ' . $logInUser->first_name;
            
            $json['redirect'] = $this->url->link('/admin');
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
        $email = $this->request->post('email');
        $pass = $this->request->post('pass');
        
        if (! $email)
        {
            $this->errors[] = 'please insert EMAIL ADRESS';
        }
        elseif (! filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->errors[] = 'Please insert valid EMAIL';
        }
        
        if (!$pass)
        {
            $this->errors[] = 'please insert PASSWORD';
        }
        
        if (! $this->errors)
        {
            $loginModel = $this->load->model('login');

            if(! $loginModel->isValidLogin($email, $pass))
            {
                $this->errors[] = 'Invalid login Data';
            }   
        }
        
        return empty($this->errors);        
    }
}