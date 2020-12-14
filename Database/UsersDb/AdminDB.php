<?php

namespace Database\UsersDb;

use Database\Connection as Connection;
use Database\UsersDb\IAdminDb as IAdminDb;
use Models\Users\Admin as Admin;
use Factory\UsersFactory\AdminFactory as AdminFactory;
use PDOException as PDOException;

class AdminDb implements IAdminDb
{
    private $connection;

    public function add(Admin $admin)
    {
        try {
            $this->connection = Connection::GetInstance();
            
            $query = "INSERT INTO admins (id, dni, email, password, firstName, lastName, enabled) VALUES (:id, :dni, :email, :password, :firstName, :lastName, :enabled);";

            $parameters["id"] = $admin->getId();
            $parameters["dni"] = $admin->getDni();
            $parameters["email"] = $admin->getEmail();
            $parameters["password"] = $admin->getPassword();
            $parameters["firstName"] = $admin->getFirstName();
            $parameters["lastName"] = $admin->getLastName();
            $parameters["enabled"] = $admin->isEnabled();


            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function delete(int $idAdmin)
    {
        try {

            $query = "UPDATE admins SET enabled = 0 WHERE id=" . $idAdmin;

            $this->connection = Connection::GetInstance();
            $this->connection->Execute($query);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function update(Admin $admin)
    {
        try {
            $query = "UPDATE admins SET dni = :dni, email = :email, password = :password, firstName = :firstName,lastName = :lastName, enabled = :enabled WHERE id = :id;";
            $con = Connection::getInstance();
            $params['id'] = $admin->getId();
            $params['dni'] = $admin->getDni();
            $params['email'] = $admin->getEmail();
            $params['password'] = $admin->getPassword();
            $params['firstName'] = $admin->getFirstName();
            $params['lastName'] = $admin->getLastName();
            $params['enabled'] = $admin->isEnabled();

            $con->executeNonQuery($query, $params);
        } catch (PDOException $e) {
            echo 'Exception en Update=' . $e->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $admins = array();

            $query = "SELECT * FROM admins";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();

        } catch (PDOException $ex) {
            throw $ex;
        }
    }


    public function getById(int $id)
    {
        try {
            $query = "SELECT * FROM admins WHERE id =" . $id . ";";

            $con = Connection::getInstance();
            $array = $con->execute($query);

            return (!empty($array)) ? $this->mapping($array) : array();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getByDNI(int $dni)
    {
        try {

            $query = "SELECT * FROM admins WHERE dni =" . $dni . ';';

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();

        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getByEmail(string $email)
    {
        try {

            $query = "SELECT * FROM admins WHERE email ='" . $email . "';";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();

        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getActives()
    {
        try {
            $pendingAdmins = array();

            $query = "SELECT * FROM admins WHERE enabled = 1 ";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getPendientes()
    {
        try {
            $pendingAdmins = array();

            $query = "SELECT * FROM admins WHERE enabled = 0 ";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();

        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function updateEnable(int $idAdmin)
    {
        try {

            $query = "UPDATE admins SET enabled = 1 WHERE id=" . $idAdmin;

            $this->connection = Connection::GetInstance();
            $this->connection->Execute($query);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function mapping($value)
    {

        $value = is_array($value) ? $value : [];

        $resp = array_map(function ($p) {
            $adminFactory = new AdminFactory();
            return $adminFactory->create($p["id"], $p["dni"], $p["email"], $p["password"], $p["firstName"], $p["lastName"], $p["enabled"]);
        }, $value);

        return count($resp) > 1 ? $resp : $resp[0];
    }
}
