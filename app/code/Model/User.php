<?php

namespace Model;

use Core\Db;

class User
{
    public const ID_COLUMN = 'id';
    public const NAME_COLUMN = 'name';
    public const EMAIL_COLUMN = 'email';
    public const PASSWORD_COLUMN = 'password';


    private $id = null;
    private $userName;
    private $password;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($name)
    {
        $this->userName = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
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
        $user = [
            self::NAME_COLUMN => $this->userName,
            self::PASSWORD_COLUMN => $this->password,
            self::EMAIL_COLUMN => $this->email
        ];
        $db->insert(DB::USER_TABLE)->values($user)->exec();
        $this->loadByEmail($this->email);
    }

    public function update()
    {
        $db = new Db();
        $user = [
            self::NAME_COLUMN => $this->userName,
            self::PASSWORD_COLUMN => $this->password,
            self::EMAIL_COLUMN => $this->email
        ];
        $db->update(DB::USER_TABLE)->set($user)->where(self::ID_COLUMN, $this->id)->exec();
    }

    public function load($id)
    {
        $db = new Db();
        $user = $db->select()->from(DB::USER_TABLE)->where(self::ID_COLUMN, $id)->getOne();
        $this->id = $user[self::ID_COLUMN];
        $this->userName = $user[self::NAME_COLUMN];
        $this->email = $user[self::EMAIL_COLUMN];
        $this->password = $user[self::PASSWORD_COLUMN];
        return $this;
    }

    public function loadByEmail($email)
    {
        $db = new Db();
        $user = $db->select()->from(DB::USER_TABLE)->where(self::EMAIL_COLUMN, $email)->getOne();
        $this->id = $user[self::ID_COLUMN];
        $this->userName = $user[self::NAME_COLUMN];
        $this->email = $user[self::EMAIL_COLUMN];
        $this->password = $user[self::PASSWORD_COLUMN];
        return $this;
    }


    public static function isValidLoginCredentionals($email, $password)
    {
        $db = new Db();
        $result = $db->select()
            ->from(DB::USER_TABLE)
            ->where(self::EMAIL_COLUMN, $email)
            ->whereAnd(self::PASSWORD_COLUMN, $password)
            ->get();
        if(!empty($result)){
            return true;
        }

        return false;
    }

    public static function isEmailUnic($email)
    {
        $db = new Db();
        $result = $db->select()->from(DB::USER_TABLE)->where(self::EMAIL_COLUMN, $email)->get();
        if(empty($result)){
            return true;
        }

        return false;
    }

}