<?php

namespace Session;

class User
{

    public function createUserSession($user)
    {
        $_SESSION['loged'] = true;
        $_SESSION['user'] = $user;
    }

    public function isLoged()
    {
        if(isset($_SESSION['loged']) && $_SESSION['loged'])
        {
            return true;
        }

        return false;
    }

    public function getAuthUser()
    {
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }

        return false;
    }

    public function getAuthUserId()
    {
        if(isset($_SESSION['user']))
        {
            $user = $_SESSION['user'];
            return $user->getId();
        }

        return false;
    }
}