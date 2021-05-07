<?php

namespace Service\Map;
use Model\MapField;
class Generator
{
    public const MAX_LENGHT = 20;
    public const MAX_HEIGHT = 20;

    public const SAND_FIELD = 2;
    public const METAL_FIELD = 3;
    public const CLAY_FIELD = 4;
    public const WATER_FIELD = 5;

    public function execute()
    {
        if(empty(MapField::getAllFields())){
            for ($y = 1; $y <= self::MAX_HEIGHT; $y++)
            {
                for ($x = 1; $x <= self::MAX_HEIGHT;)
                {
                    $x = $x + rand(0,10);
                    if($x > self::MAX_LENGHT){
                        continue;
                    }
                    $mapField = new MapField();
                    $mapField->setX($x);
                    $mapField->setY($y);
                    $mapField->setFieldTypeId(rand(2,5));
                    $mapField->setUserId('null');
                    $mapField->save();
                }
            }
        }else{
            echo 'Map allready exist;';
        }
    }


}