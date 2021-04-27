<?php

namespace Core;

class Controller
{
    public function render($content)
    {
        echo '<h1>'.$content.'</h1>';
    }
}