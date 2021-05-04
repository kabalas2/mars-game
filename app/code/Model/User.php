<?php

namespace Model;

use Core\Db;

class User
{
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
            'name' => $this->userName,
            'password' => $this->password,
            'email' => $this->email
        ];
        $db->insert('user')->values($user)->exec();
    }

    public function update()
    {
        $db = new Db();
        $user = [
            'name' => $this->userName,
            'password' => $this->password,
            'email' => $this->email
        ];
        $db->update('user')->set($user)->where('id', $this->id)->exec();
    }

    public function load($id)
    {
        $db = new Db();
        $user = $db->select()->from('user')->where('id', $id)->getOne();
        $this->id = $user['id'];
        $this->userName = $user['name'];
        $this->email = $user['email'];
        $this->password = $user['password'];
        return $this;
    }

    public static function isValidLoginCredentionals($email, $password)
    {
        $db = new Db();
        $result = $db->select()
            ->from('user')
            ->where('email', $email)
            ->whereAnd('password', $password)
            ->get();
        if(!empty($result)){
            return true;
        }

        return false;
    }

    public static function isEmailUnic($email)
    {
        $db = new Db();
        $result = $db->select()->from('user')->where('email', $email)->get();
        if(empty($result)){
            return true;
        }

        return false;
    }

}