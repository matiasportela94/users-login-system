<?php

namespace Controllers;

use Models\Users\Admin as Admin;
use Database\UsersDb\AdminDb as AdminDb;
use Factory\UsersFactory\AdminFactory as AdminFactory;

use Helpers\SessionHelper as SessionHelper;
use Helpers\EmailValidationHelper as EmailValidationHelper;
use Helpers\ResetPasswordHelper as ResetPasswordHelper;
use Controllers\ViewsController as ViewsController;


class AdminController
{
    private $adminsDb;
    private $adminFactory;

    public function __construct()
    {
        $this->adminsDb = new AdminDb();
        $this->adminFactory = new AdminFactory();
    }

    public function add(int $dni, string $firstName, string $lastName, string $email, string $password): void
    {
        $admin = $this->adminsDb->getByDNI($dni);

        if (!$admin) {

            $admin = $this->adminsDb->getByEmail($email);

            if (!$admin) {

                $isEmail = EmailValidationHelper::isEmail($email);
                if ($isEmail) {


                    $password = ResetPasswordHelper::encryptPassword($password);

                    if (is_string($password)) {
                        $admin = $this->adminFactory->create(0, $dni, $email, $password, $firstName, $lastName, false);

                        $rows = $this->adminsDb->add($admin);

                        if ($rows) {
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
    }

    /**     FUNCTION CREATED SPECIFICALLY TO BE RUN ONCE, THE FIRST TIME THE PROGRAM WILL RUN AND NOT AGAIN **/
    /*
    public function createAdmins(){
        $password = "gymbox1870";
        $admin = $this->adminFactory->create(0,10000000, 'gymboxmoreno@gmail.com',password_hash($password, PASSWORD_DEFAULT), 'Adrian', 'Portela', true);

        $password2 = "admin123";
        $admin2 = $this->adminFactory->create(0, 10000001, 'admin@admin.com', password_hash($password2, PASSWORD_DEFAULT), 'Admin', 'Istrador', true);

        $this->adminsDb->Add($admin);
        $this->adminsDb->Add($admin2);

    }
    */
}
