<?php

namespace Controllers;

use Helpers\ResetPasswordHelper as ResetPasswordHelper;
use Database\UsersDb\AdminDb as AdminDb;
use Database\UsersDb\MemberDb as MemberDb;
use Database\ResetPasswordDb\ResetPasswordDb as ResetPasswordDb;

use PDOException as PDOException;

class ResetPasswordController
{

    private $memberDb;
    private $adminDb;
    private $resetPasswordDb;

    public function __construct()
    {
        $this->memberDb = new MemberDb();
        $this->adminDb = new AdminDb();
        $this->resetPasswordDb = new ResetPasswordDb();
    }

    public function resetPassword(string $email) : void
    {
        $user = $this->adminDb->getByEmail($email);
        if (!$user) {
            $user = $this->memberDb->getByEmail($email);
        } else {
            $message = "No encontramos el email ingresado en nuestra base de datos.";
            ViewsController::showResetPassword($message);
        }

        if ($user) {
            $isEmail = ResetPasswordHelper::emailResetLinkTo($user->GetEmail());

            if($isEmail) {
                $message = "Enviamos un email a tu casilla de correo con un link para actualizar tu contraseña";
            } else {
                $message = "No pudimos enviar el email a tu casilla de correo. Intente nuevamente.";
            }
            ViewsController::showResetPassword($message);
        } else {
            $message = "No encontramos el email ingresado en nuestra base de datos.";
            ViewsController::showResetPassword($message);
        }
    }

    public function changePassword(string $newPassword, string $token) : void
    {
        try {
            if ($token) {
                $resetPassword = $this->resetPasswordDb->getByToken($token);

                if ($resetPassword) {

                    $member = $this->memberDb->getByEmail($resetPassword->getEmail());

                    if ($member && $member->getPassword() != $newPassword) {

                        $encryptedPassword = ResetPasswordHelper::encryptPassword($newPassword);

                        $isUpdated = $this->memberDb->updatePassword($resetPassword->getEmail(), $encryptedPassword);
                        $isDeleted = $this->resetPasswordDb->Delete($resetPassword->getToken());


                        $message = "Actualizaste tu contraseña correctamente!";
                        ViewsController::showLogIn($message);
                    } else {
                        $message = "La contraseña no puede ser igual a tu contraseña anterior.";
                        ViewsController::showResetPassword($message);
                    }
                } else {
                    $message = "El token no es correcto. Intente generar uno nuevo ingresando su email nuevamente.";
                    ViewsController::showResetPassword($message);
                }
            } else {
                $message = "Ingrese un email para poder cambiar su contraseña.";
                var_dump($message);
                ViewsController::showResetPassword($message);
            }
        } catch (PDOException $e) {
            $message = "Actualizaste tu contraseña correctamente!";
            ViewsController::showLogIn($message);
        }
    }
}
