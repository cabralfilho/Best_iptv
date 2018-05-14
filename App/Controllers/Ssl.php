<?php

namespace App\Controllers;

use System\Controller;

class Ssl extends Controller
{
    public function index1()
    {

        $this->file->call('.well-known/acme-challenge/ByRVNu-6dGSzB_HTiYRWlqq_5I5CEmM7nq1xtjMad_w');
    }
    
    public function index2()
    {

        $this->file->call('.well-known/acme-challenge/eJ70ymlaTkIP_HCHjTpFxN8FLiprnrFouHou6a1d_Zk');
    }
}