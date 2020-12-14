<?php

namespace Database\ResetPasswordDb;

use Database\Connection as Connection;
use Database\ResetPasswordDb\IResetPasswordDb as IResetPasswordDb;
use Models\ResetPassword\ResetPassword as ResetPassword;
use Factory\ResetPasswordFactory\ResetPasswordFactory as ResetPasswordFactory;
use PDOException as PDOException;

class ResetPasswordDb implements IResetPasswordDb
{

    public function add(ResetPassword $resetPassword)
    {
        try {
            $con = Connection::getInstance();
            
            $query = "INSERT INTO resetPassword (id, email, token) VALUES (:id, :email, :token);";

            $parameters["id"] = $resetPassword->getId();
            $parameters["email"] = $resetPassword->getEmail();
            $parameters["token"] = $resetPassword->getToken();


            return $con->ExecuteNonQuery($query, $parameters);

        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getByToken(string $token)
    {
        try {

            $con = Connection::getInstance();
            
            $query = "SELECT * FROM resetPassword WHERE token='" . $token . "';";

            $array = $con->execute($query);

            return (!empty($array)) ? $this->mapping($array) : array();
        } catch (PDOException $e) {
            throw $e;

        }
    }

    public function getByEmail(string $email)
    {
        try {

            $con = Connection::getInstance();
            
            $query = "SELECT * FROM resetPassword WHERE email='" . $email . "';";

            $array = $con->execute($query);

            return (!empty($array)) ? $this->mapping($array) : array();
        } catch (PDOException $e) {
            throw $e;

        }
    }


    public function delete(string $token){
        try {

            $con = Connection::getInstance();

            $query = "DELETE FROM resetPassword WHERE token='" . $token . "';";

            $con->Execute($query);

        } catch (PDOException $e) {
            throw $e;

        }
    }

    public function mapping($value)
    {

        $value = is_array($value) ? $value : [];

        $resp = array_map(function ($p) {
            $resetPasswordFactory = new ResetPasswordFactory();
            return $resetPasswordFactory->create($p["id"], $p["email"], $p["token"]);
        }, $value);

        return count($resp) > 1 ? $resp : $resp[0];
    }

}