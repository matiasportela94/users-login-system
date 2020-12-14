<?php

namespace Helpers;

class EmailValidationHelper
{

    public static function isEmail(string $email)
    {

        $isEmail = EmailValidationHelper::validateEmail($email);

        return $isEmail;
    }

    private static function validateEmail(string $email)
    {
        $result = file_get_contents("https://apilayer.net/api/check?access_key=" . EMAIL_VERIFICATION_APIKEY . "&email=$email&format=1");
        if ($result) {
            $result = json_decode($result, true);
            
            return $result["smtp_check"];
        }

        return false;
    }
}
