<?php

namespace Model;
use Core\Db;

class MapField
{
    private $id;

    private $x;

    private $y;

    private $fieldTypeId;

    private $userId;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param integer $x
     */
    public function setX($x): void
    {
        $this->x = $x;
    }

    /**
     * @return integer
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param integer $y
     */
    public function setY($y): void
    {
        $this->y = $y;
    }

    /**
     * @return integer
     */
    public function getFieldTypeId()
    {
        return $this->fieldTypeId;
    }

    /**
     * @param integer $fieldTypeId
     */
    public function setFieldTypeId($fieldTypeId): void
    {
        $this->fieldTypeId = $fieldTypeId;
    }

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param integer $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    public static function getAllFields()
    {
        $db = new Db();
        return $db->select()->from(DB::MAP_FIELD_TABLE)->get();
    }


}