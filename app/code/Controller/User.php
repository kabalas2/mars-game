<?php

namespace Controller;

use Core\Controller;

class User extends Controller
{
    public function index()
    {
        echo 'userio page';
    }

    public function register()
    {
        $this->render('cia jau is renderio');
    }

    public function load($id)
    {
        echo $id;
    }

}