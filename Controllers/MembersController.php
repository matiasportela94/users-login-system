<?php

namespace Controllers;

use Database\UsersDb\MemberDb as MemberDb;
use Models\Users\Member as Member;
use Factory\UsersFactory\MemberFactory as MemberFactory;
use Helpers\EmailValidationHelper as EmailValidationHelper;
use Helpers\ResetPasswordHelper as ResetPasswordHelper;
use DateTime as DateTime;
use PDOException as PDOException;
use Helpers\SessionHelper as SessionHelper;
use Controllers\ViewsController as ViewsController;


class MembersController
{
    private $membersDb;
    private $memberFactory;

    public function __construct()
    {
        $this->membersDb = new MemberDb();
        $this->memberFactory = new MemberFactory();
    }

    public function add(int $dni, string $firstName, string $lastName, string $email, string $password): void
    {

        try{
            $member = $this->membersDb->getByDNI($dni);
    
            if (!$member) {
    
                $member = $this->membersDb->getByEmail($email);
    
                if (!$member) {
    
                    $isEmail = EmailValidationHelper::isEmail($email);
    
                    if ($isEmail) {
    
                        $password = ResetPasswordHelper::encryptPassword($password);
    
                        if (is_string($password)) {
                            $member = $this->memberFactory->create(0, $dni, $email, $password, $firstName, $lastName, false, 0);
    
                            $rows = $this->membersDb->add($member);
    
                            if ($rows > 0) {
                                ViewsController::showLogIn();
                            } else {
                                $message = "Tuvimos problemas al contactar nuestra base de datos. Intente nuevamente.";
                                ViewsController::showRegisterForm($message);
                            }
                        } else {
                            $message = "Tuvimos un problema al encriptar tu contraseña, intentalo nuevamente.";
                            ViewsController::showRegisterForm($message);
                        }
                    } else {
                        $message = "Debe ingresar un email válido.";
                        ViewsController::showRegisterForm($message);
                    }
                } else {
                    $message = "El email ingresado ya se encuentra registrado.";
                    ViewsController::showRegisterForm($message);
                }
            } else {
                $message = "El dni ingresado ya se encuentra registrado.";
                ViewsController::showRegisterForm($message);
            }
        }catch(PDOException $e){
            $message = "Tuvimos problemas al contactar nuestra base de datos. Intente nuevamente.";
            ViewsController::showRegisterForm($message);
        }
    }

    public function disableByDate() : void 
    {
        $oneMonthAgo = date("Y-m-d", strtotime("-1 month")); 
        try{
            $this->membersDb->disableByDate($oneMonthAgo);
        }catch (PDOException $e){
            ViewsController::showIndex();
        }
    }

}
