<?php

namespace Controller;

use Core\Controller;

class User extends Controller
{
    public function index()
    {
        echo 'user index';
    }

    public function registration()
    {
       $this->render('user/register',[]);
    }

    public function login()
    {
        $this->render('user/login',[]);
    }
}