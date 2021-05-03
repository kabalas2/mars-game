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
            'user' => $this->userName,
            'password' => $this->password,
            'email' => $this->email
        ];
        $db->update('user')->set($user)->where('id', $this->id)->exec();
    }

}