<?php

namespace Service\Map;

use Model\MapField;
use Service\Map\Generator;

class Loader
{
    private $fieldClasses = [];

    public function __construct()
    {
        $this->setFieldClasses();
    }

    public function get()
    {
        $fields = MapField::getAllFields();
        return $this->sort($fields);
    }

    public function sort($fields)
    {
        $sortedFields = [];
        foreach($fields as $field){
            $sortedFields[$field['y']][$field['x']] = $field;
            $sortedFields[$field['y']][$field['x']]['class'] = $this->fieldClasses[$field[MapField::FIELD_TYPE_COLUMN]];
        }

        return $sortedFields;
    }

    public function setFieldClasses()
    {
        $this->fieldClasses = [
            Generator::CITY_FIELD => 'city',
            Generator::SAND_FIELD => 'sand',
            Generator::METAL_FIELD => 'metal',
            Generator::CLAY_FIELD => 'clay',
            Generator::WATER_FIELD => 'water',
        ];
    }
}