<?php

namespace Service\Map;
use Model\MapField;

class Generator
{
    public const MAX_LENGHT = 400;
    public const MAX_HEIGHT = 400;

    public function execute()
    {
        if(empty(MapField::getAllFields())){

        }else{
            echo 'Map allready exist;';
        }
    }
}