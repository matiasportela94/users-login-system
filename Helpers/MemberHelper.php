<?php

namespace Helpers;

use Models\Users\Member as Member;

class MemberHelper
{

    public static function isObject($user)
    {
        return is_object($user);
    }

    public static function GetMemberAsArray($user)
    {
        $userArray = array();
        array_push($userArray, $user);
        
        return $userArray;
    }
}
