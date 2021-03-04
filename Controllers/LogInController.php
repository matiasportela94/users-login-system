<?php

namespace Controllers;

use Database\UsersDb\MemberDb as MemberDb;
use Models\Users\Member as Member;
use Models\Users\Admin as Admin;
use Helpers\SessionHelper as SessionHelper;

class LogInController
{
    private $memberDb;
    private $adminDb;

    public function __construct()
    {
        $this->memberDb = new MemberDb();
    }

    public function memberLogIn($email, $password)
    {
        $isLogged = $this->ValidateLogIn(Member::class, $email, $password);
        $this->RedirectLogIn($isLogged, 'loggedMember');
    }


    public function ValidateLogIn($userClass, string $email, string $password)
    {
        $isLogged = false;
        $member = $this->VerifyEmailOrDni($email, $userClass);
        if (!empty($member)) {
            $isLogged = $this->VerifyPassword($password, $member);
        }
        return $isLogged;
    }

    public function VerifyEmailOrDni(string $email)
    {
        $user = false;
        $dni = intval($email);

        if ($dni == 0) {
            $user = $this->memberDb->GetByEmail($email);
        } else {
            $user = $this->memberDb->GetByDNI($dni);
        }

        return $user;
    }

    public function VerifyPassword(string $password, $user)
    {
        $verify = password_verify($password, $user->getPassword());

        if ($verify) {
            return (SessionHelper::setSessionByUserClass($user));
        }

        return false;
    }

    public function isEnabled($user)
    {
        //enabled is false
        if ($user->isEnabled()) {
            return true;
        }

        return false;
    }

    public function redirectLogIn($isLogged, $sessionKey)
    {
        if ($isLogged) {
            if ($this->isEnabled(SessionHelper::getValue($sessionKey))) {
                ViewsController::showProfile($sessionKey);
            } else {
                $message = "La validacion de tu cuenta tarda 24/48hs.<br>Si el problema persiste comunicate con nosotros.";
                ViewsController::showLogIn("", $message);
            }
        } else {
            $message = "Usuario incorrecto. Intente nuevamente.";
            ViewsController::showLogIn("", $message);
        }
    }

    public function logOut()
    {
        SessionHelper::destroySession();
        ViewsController::showIndex();
    }
}
