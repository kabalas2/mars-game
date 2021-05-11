<?php

namespace Model;


use Model\ModelAbstract;
use Core\Db;

class City extends ModelAbstract
{
    public const TABLE_NAME = 'city';
    public const NAME_COLUMN = 'name';
    public const MAP_FIELD_ID_COLUMN = 'map_field_id';

    private $name;
    private $mapFieldId;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMapFieldId()
    {
        return $this->mapFieldId;
    }

    /**
     * @param mixed $mapFieldId
     */
    public function setMapFieldId($mapFieldId): void
    {
        $this->mapFieldId = $mapFieldId;
    }

    public function load($id)
    {
        $db = new Db;
        $result = $db->select()->from(self::TABLE_NAME)->where(self::ID_COLUMN, $id)->getOne();
        $this->id = $result[self::ID_COLUMN];
        $this->name = $result[self::NAME_COLUMN];
        $this->mapFieldId = $result[self::MAP_FIELD_ID_COLUMN];
        return $this;
    }


    public function prepeareArray()
    {
        return [
            self::NAME_COLUMN => $this->name,
            self::MAP_FIELD_ID_COLUMN => $this->mapFieldId
        ];
    }

}