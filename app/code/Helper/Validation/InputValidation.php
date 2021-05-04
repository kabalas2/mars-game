<?php

namespace Helper\Validation;

use Model\User;

class InputValidation
{
    public const MIN_PASSWORD_LENGHT = 6;

    public static function isEmailValid($email)
    {
        if (User::isEmailUnic($email) && self::isEmail($email)) {
            return true;
        }
        return false;
    }

    public static function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isPasswordValid($pass, $pass2)
    {
        if (self::passwordsMatch($pass, $pass2) && self::isStrong($pass)) {
            return true;
        }
        return false;
    }

    public static function passwordsMatch($pass, $pass2)
    {
        return $pass === $pass2;
    }

    public static function isStrong($pass)
    {
        return strlen($pass) >= self::MIN_PASSWORD_LENGHT;
    }
}