<?php

namespace Controllers;

use Database\UsersDb\AdminDb as AdminDB;
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
        $this->adminDb = new AdminDb();
    }

    public function memberLogIn($email, $password)
    {
        $isLogged = $this->ValidateLogIn(Member::class, $email, $password);
        $this->RedirectLogIn($isLogged, 'loggedMember');
    }

    public function adminLogIn($email, $password)
    {
        $isLogged = $this->ValidateLogIn(Admin::class, $email, $password);
        $this->RedirectLogIn($isLogged, 'loggedAdmin');
    }

    public function ValidateLogIn($userClass, string $email, string $password)
    {
        switch ($userClass) {
            case Member::class:
                $member = $this->VerifyEmailOrDni($email, $userClass);
                if (!empty($member)) {
                    $isLogged = $this->VerifyPassword($password, $member);
                    return $isLogged;
                }
                break;

            case Admin::class:
                $admin = $this->VerifyEmailOrDni($email, $userClass);
                if (!empty($admin)) {
                    $isLogged = $this->VerifyPassword($password, $admin);
                    return $isLogged;

                }
                break;
        }

    }

    public function VerifyEmailOrDni(string $email, $userClass)
    {
        $user = false;
        $dni = intval($email);
        switch ($userClass) {
            case Member::class:
                if ($dni == 0) {
                    $user = $this->memberDb->GetByEmail($email);
                } else {
                    $user = $this->memberDb->GetByDNI($dni);
                }
                break;

            case Admin::class:
                if ($dni == 0) {
                    $user = $this->adminDb->GetByEmail($email);
                } else {
                    $user = $this->adminDb->GetByDNI($dni);
                }
                break;
        }

        return $user;
    }

    public function VerifyPassword(string $password, $user)
    {
        $verify = password_verify($password, $user->getPassword());
        
        if($verify){
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
            if($this->isEnabled(SessionHelper::getValue($sessionKey))){
                ViewsController::showProfile($sessionKey);
            }else{
                $message = "La validacion de tu cuenta tarda 24/48hs.<br>Si el problema persiste comunicate con nosotros.";
                ViewsController::showLogIn("", $message);
            }
        } else {
            $message = "Usuario incorrecto. Intente nuevamente.";
            ViewsController::showLogIn("", $message);
        }
    }

    public function logOut() {
        SessionHelper::destroySession();
        ViewsController::showIndex();
    }
}
