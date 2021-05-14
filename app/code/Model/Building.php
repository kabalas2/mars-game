<?php

namespace Model;

use Core\Db;
/**
 * Class Building
 * @package Model
 */
class Building extends ModelAbstract
{
    /**
     *
     */
    public const TABLE_NAME = 'building';

    /**
     *
     */
    public const BUILDING_TYPE_ID_COLUMN = 'building_type_id';

    /**
     *
     */
    public const CITY_ID_COLUMN = 'city_id';

    /**
     *
     */
    public const LEVEL_COLUMN = 'level';

    /**
     *
     */
    public const POSITION_COLUMN = 'position';


    /**
     * @var int
     */
    private $buildinTypeId;

    /**
     * @var int
     */
    private $cityId;

    /**
     * @var int
     */
    private $level;

    /**
     * @var int
     */
    private $position;

    /**
     * @return int
     */
    public function getBuildinTypeId(): int
    {
        return $this->buildinTypeId;
    }

    /**
     * @param int $buildinTypeId
     */
    public function setBuildinTypeId(int $buildinTypeId): void
    {
        $this->buildinTypeId = $buildinTypeId;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * @param int $cityId
     */
    public function setCityId(int $cityId): void
    {
        $this->cityId = $cityId;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function load($id)
    {
        $db = new Db();

        $result = $db->select()->from(self::TABLE_NAME)->where(self::ID_COLUMN, $id)->getOne();

        $this->id = $result[self::ID_COLUMN];
        $this->buildinTypeId = $result[self::BUILDING_TYPE_ID_COLUMN];
        $this->cityId = $result[self::CITY_ID_COLUMN];
        $this->level = $result[self::LEVEL_COLUMN];
        $this->position = $result[self::POSITION_COLUMN];
        return $this;
    }

    public function prepeareArray()
    {
        return [
          self::BUILDING_TYPE_ID_COLUMN => $this->buildinTypeId,
          self::CITY_ID_COLUMN => $this->cityId,
          self::LEVEL_COLUMN => $this->level,
          self::POSITION_COLUMN => $this->position
        ];
    }


}