<?php

namespace Controllers;

use Database\UsersDb\MemberDb as MemberDb;
use Factory\UsersFactory\MemberFactory as MemberFactory;
use Helpers\ResetPasswordHelper as ResetPasswordHelper;
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
    
                    // if MAILBOXLAYER API KEY is defined uncomment line 40 and comment line 41
                    //$isEmail = EmailValidationHelper::isEmail($email);
                    $isEmail = $email;

                    if ($isEmail) {
    
                        $password = ResetPasswordHelper::encryptPassword($password);
    
                        if (is_string($password)) {
                            $member = $this->memberFactory->create(0, $dni, $email, $password, $firstName, $lastName, true, date("Y-m-d"));
    
                            $rows = $this->membersDb->add($member);
    
                            if(SessionHelper::isSession('loggedMember')){
                                ViewsController::ShowUsers();
                            }else{
                                if ($rows > 0) {
                                    ViewsController::showLogIn();
                                } else {
                                    $message = "Tuvimos problemas al contactar nuestra base de datos. Intente nuevamente.";
                                    ViewsController::showRegisterForm($message);
                                }
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

    public function delete(int $id) : void 
    {
        try{
            $this->membersDb->delete($id);

            ViewsController::ShowUsers();
            
        }catch(PDOException $ex){
            ViewsController::ShowUsers();

        }
    }

    public function ShowModify($id)
    {
        if (SessionHelper::isSession('loggedMember')) {
            ViewsController::ShowModifyUser($id);
        } else {
            ViewsController::ShowLogIn();
        }
    }

    public function update($id, $dni, $firstName, $lastName, $email)
    {   
        try{
            $oldMember = $this->membersDb->getById($id);
            $newMember = $this->memberFactory->create($id, $dni, $email, $oldMember->getPassword(), $firstName, $lastName, true, date("Y-m-d"));

            $this->membersDb->update($newMember);
            ViewsController::ShowUsers();

        }catch(PDOException $ex){
            $message = "No pudimos actualizar tus datos. Intenta nuevamente mas tarde.";
            ViewsController::ShowModifyUser($message);
        }
    }

    public function addFromProfile(int $dni, string $firstName, string $lastName, string $email, string $password): void
    {

        try{
            $member = $this->membersDb->getByDNI($dni);
    
            if (!$member) {
    
                $member = $this->membersDb->getByEmail($email);
    
                if (!$member) {
    
                    // if MAILBOXLAYER API KEY is defined uncomment line 40 and comment line 41
                    //$isEmail = EmailValidationHelper::isEmail($email);
                    $isEmail = $email;

                    if ($isEmail) {
    
                        $password = ResetPasswordHelper::encryptPassword($password);
    
                        if (is_string($password)) {
                            $member = $this->memberFactory->create(0, $dni, $email, $password, $firstName, $lastName, true, date("Y-m-d"));
    
                            $rows = $this->membersDb->add($member);
    
                                if ($rows > 0) {
                                    ViewsController::ShowUsers();
                                } else {
                                    $message = "Tuvimos problemas al contactar nuestra base de datos. Intente nuevamente.";
                                    ViewsController::ShowUsers($message);
                                }
                        } else {
                            $message = "Tuvimos un problema al encriptar tu contraseña, intentalo nuevamente.";
                            ViewsController::ShowUsers($message);
                        }
                    } else {
                        $message = "Debe ingresar un email válido.";
                        ViewsController::ShowUsers($message);
                    }
                } else {
                    $message = "El email ingresado ya se encuentra registrado.";
                    ViewsController::ShowUsers($message);
                }
            } else {
                $message = "El dni ingresado ya se encuentra registrado.";
                ViewsController::ShowUsers($message);
            }
        }catch(PDOException $e){
            $message = "Tuvimos problemas al contactar nuestra base de datos. Intente nuevamente.";
            ViewsController::ShowUsers($message);
        }
    }


    public function createDefaultUser(){
        try{

            $defaultPassword = ResetPasswordHelper::encryptPassword("Admin1234");
            $defaultMember = $this->memberFactory->create(0, 10000000, "admin@admin.com", $defaultPassword, "Admin", "Istrador", true, date("Y-m-d"));

            $this->membersDb->add($defaultMember);

            return true;

        }catch(PDOException $ex){
            return false;
        }
    }

    
}
