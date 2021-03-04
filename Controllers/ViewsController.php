<?php

namespace Controllers;

use Database\UsersDb\MemberDb as MemberDb;
use Helpers\SessionHelper as SessionHelper;
use Helpers\MemberHelper as MemberHelper;
use Controllers\MembersController as MembersController;

use PDOException as PDOException;

class ViewsController
{

    public static function showIndex()
    {
        require_once(VIEWS_PATH . "main.php");
    }

    public static function showLogIn($sessionKey = "", $message = "")
    {
        $membersController = new MembersController();
        $isDefaultMember = $membersController->createDefaultUser();

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

    public static function showChangePassword($message = "")
    {
        require_once(VIEWS_PATH . 'changePassword.php');
    }

    public static function showProfile($sessionKey = "", $message = "")
    {
        try {
            $sessionKey = 'loggedMember';

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

    public static function ShowUsers($message = "")
    {
        try{
            if (SessionHelper::isSession('loggedMember')) {

                $memberDb = new MemberDB();
                $users = $memberDb->getActives();
                
                if(MemberHelper::isObject($users))
                    $users = MemberHelper::GetMemberAsArray($users);

                if(!is_array($users) || empty($users))
                    $message="No encontramos usuarios en la base de datos.";

                require_once(VIEWS_PATH . "usersList.php");
                
            } else {
                $message = "Inicia sesión primero.";
                ViewsController::ShowLogIn($message);
            }
        }catch(PDOException $e){
            $message = "Error al contactar la base de datos";
            ViewsController::showProfile($message);
        }
    }

    public static function ShowModifyUser($id){

        try{
            $memberDb = new MemberDb();
            $user = $memberDb->getById(intval($id));
            if($user)
                require_once(VIEWS_PATH . 'editUser.php');
            else{
                $message = "El DNI o Email ya se encuentra registrado en nuestra base de datos.";
                ViewsController::ShowUsers($message);
            }
        }catch(PDOException $e){
            $message = "Error al contactar la base de datos";
            ViewsController::ShowUsers($message);
        }

    }
}
