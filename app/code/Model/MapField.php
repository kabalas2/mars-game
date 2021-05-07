<?php

namespace Model;
use Core\Db;

class MapField
{
    public const ID_COLUMN = 'id';
    public const X_COLUMN = 'x';
    public const Y_COLUMN = 'y';
    public const FIELD_TYPE_COLUMN = 'field_type_id';
    public const USER_ID_COLUMN = 'user_id';
    public const MAP_FIELD_TABLE = 'map_field';

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

    public function save()
    {
        if($this->id !== null){
            $this->update();
        }else{
            $this->create();
        }

        return $this;
    }

    public function create()
    {
        $db = new Db();
        $mapField = [
            self::X_COLUMN => $this->x,
            self::Y_COLUMN => $this->y,
            self::FIELD_TYPE_COLUMN => $this->fieldTypeId,
            self::USER_ID_COLUMN => $this->userId,
        ];
        $db->insert(DB::MAP_FIELD_TABLE)->values($mapField)->exec();
    }

    public function update()
    {
        $db = new Db();
        $mapField = [
            self::X_COLUMN => $this->x,
            self::Y_COLUMN => $this->y,
            self::FIELD_TYPE_COLUMN => $this->fieldTypeId,
            self::USER_ID_COLUMN => $this->userId
        ];
        $db->update(DB::MAP_FIELD_TABLE)->set($mapField)->where(self::ID_COLUMN, $this->id)->exec();
    }


}