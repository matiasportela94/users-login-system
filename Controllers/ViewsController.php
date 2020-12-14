<?php

namespace Controllers;

use Database\MemberDB as MemberDB;
use Database\AdminDB as AdminDB;

use Helpers\SessionHelper as SessionHelper;
use Helpers\PasswordResetHelper as PasswordResetHelper;

use PDOException as PDOException;

class ViewsController
{

    public static function showIndex()
    {
        require_once(VIEWS_PATH . "main.php");
    }

    public static function showLogIn($sessionKey = "", $message = "")
    {
        if (SessionHelper::isSession($sessionKey)) {
            $loggedUser = SessionHelper::GetValue($sessionKey);
            require_once(VIEWS_PATH . "profilePage.php");
        } else {
            require_once(VIEWS_PATH . "loginForm.php");
        }
    }

    public static function showRegisterForm($message = "")
    {
        require_once(VIEWS_PATH . "registerForm.php");
    }

    public static function showResetPassword($message = "")
    {
        require_once(VIEWS_PATH . 'passwordReset.php');
    }

    public static function showChangePassword($message = "")
    {
        require_once(VIEWS_PATH . 'changePassword.php');
    }

    public static function showProfile($sessionKey = "", $message = "")
    {
        try {
            if (SessionHelper::isSession($sessionKey)) {

                $loggedUser = SessionHelper::GetValue($sessionKey);
                require_once(VIEWS_PATH . "profilePage.php");

            } else {
                $message = "Inicia sesión primero.";
                ViewsController::ShowLogIn($message);
            }
        } catch (PDOException $ex) {
            $message = "Error al contactar la base de datos, intente nuevament";
            ViewsController::ShowLogIn($message);
        }
    }

    
}
