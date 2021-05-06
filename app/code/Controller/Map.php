<?php

namespace Controller;

use Core\Controller;
use Helper\Url;

class Map extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->isLogedIn()){
            Url::redirect(Url::make('/user/login'));
        }
    }

    public function index()
    {
        $this->render('game/map', $this->data);
    }
}