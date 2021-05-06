<?php

namespace Controller;

use Core\Controller;

class Map extends Controller
{
    public function index()
    {
        $this->render('game/map', $this->data);
    }
}