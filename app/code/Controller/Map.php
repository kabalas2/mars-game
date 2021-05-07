<?php

namespace Controller;

use Core\Controller;
use Helper\Url;
use Service\Map\Loader;

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
        $map = new Loader();

        $this->data['fields'] = $map->get();
        $this->render('game/map', $this->data);
    }
}