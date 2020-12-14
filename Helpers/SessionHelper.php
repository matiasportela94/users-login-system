<?php

namespace Helpers;

use Models\Users\Member as Member;
use Models\Users\Admin as Admin;
class SessionHelper
{

    public static function isSession($key = "")
    {
        if (isset($_SESSION[$key])) {
            return true;
        }
        return false;
    }

    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function setSessionByUserClass($user)
    {
        $userClass = get_class($user);

        switch ($userClass) {
            case Member::class:
                SessionHelper::setSession('loggedMember', $user);
                break;

            case Admin::class:
                SessionHelper::setSession('loggedAdmin', $user);
                break;
        }

        if(SessionHelper::isSession('loggedMember') || SessionHelper::isSession('loggedAdmin')){
            return true;
        }else{
            return false;
        }
    }

    public static function setOnIndex($key, $index, $value)
    {
        $_SESSION[$key][$index] = $value;
    }

    public static function lengthOfKey($key)
    {
        return count($_SESSION[$key]);
    }

    public static function getValue($key)
    {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
    }

    public static function destroySession()
    {
        session_destroy();
    }

    public static function unsetValue($key, $index)
    {
        unset($_SESSION[$key][$index]);
    }
}
