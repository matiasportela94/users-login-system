<?php

namespace Database\UsersDb;

use Database\Connection as Connection;
use Database\UsersDb\IMemberDb as IMemberDb;
use Models\Users\Member as Member;
use Factory\UsersFactory\MemberFactory as MemberFactory;
use DateTime as DateTime;
use PDOException as PDOException;

class MemberDb implements IMemberDb
{

    public function add(Member $member)
    {
        try {
            $con = Connection::getInstance();
            $query = 'INSERT INTO members(dni,email,password,firstName,lastName,enabled, membershipId, lastUpdate) VALUES(:dni, :email, :password, :firstName, :lastName, :enabled, :membershipId, :lastUpdate);';

            $params['dni'] = $member->GetDni();
            $params['email'] = $member->GetEmail();
            $params['password'] = $member->GetPassword();
            $params['firstName'] = $member->GetFirstName();
            $params['lastName'] = $member->GetLastName();
            $params['enabled'] = $member->isEnabled();
            $params['membershipId'] = $member->getMembership();
            $params['lastUpdate'] = $member->getLastUpdate();

            return $con->executeNonQuery($query, $params);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function delete(int $idMember)
    {
        try {
            $con = Connection::getInstance();

            $query = "UPDATE members SET enabled = 0 WHERE id=" . $idMember;

            $con->Execute($query);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function disableByDate(string $date)
    {
        try {
            $con = Connection::getInstance();

            $query = "UPDATE members SET enabled = 0 WHERE lastUpdate=" . $date;

            $con->Execute($query);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function update(Member $member)
    {
        try {
            $query = "UPDATE members SET dni = :dni, email = :email, password = :password, firstName = :firstName,lastName = :lastName, enabled = :enabled WHERE id = :id;";
            $con = Connection::getInstance();
            $params['id'] = $member->getId();
            $params['dni'] = $member->getDni();
            $params['email'] = $member->getEmail();
            $params['password'] = $member->getPassword();
            $params['firstName'] = $member->getFirstName();
            $params['lastName'] = $member->getLastName();
            $params['enabled'] = $member->isEnabled();

            $con->executeNonQuery($query, $params);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function updatePassword(string $email, string $newPassword)
    {
        try {
            $con = Connection::getInstance();

            $query = "UPDATE members SET password = '$newPassword' WHERE email='" . $email . "';";

            $con->executeNonQuery($query);

        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    

    public function getAll()
    {
        try {
            $query = 'SELECT * FROM members;';

            $con = Connection::getInstance();
            $array = $con->execute($query);

            return (!empty($array)) ? $this->mapping($array) : array();
        } catch (PDOException $e) {
            throw $e;
        }
    }


    public function getById(int $id)
    {
        try {
            $query = "SELECT * FROM members WHERE id =" . $id . ";";

            $con = Connection::getInstance();
            $array = $con->execute($query);

            return (!empty($array)) ? $this->mapping($array) : array();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getByDNI(int $dni)
    {
        try {

            $query = "SELECT * FROM members WHERE dni =" . $dni . ';';

            $con = Connection::getInstance();

            $resultSet = $con->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getByEmail(string $email)
    {
        try {

            $query = "SELECT * FROM members WHERE email ='" . $email . "';";

            $con = Connection::getInstance();

            $resultSet = $con->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }


    public function getActives()
    {
        try {
            $pendingMembers = array();

            $query = "SELECT * FROM members WHERE enabled = 1 ";

            $con = Connection::getInstance();

            $resultSet = $con->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getPendientes()
    {
        try {
            $pendingMembers = array();

            $query = "SELECT * FROM members WHERE enabled = 0 ";

            $con = Connection::getInstance();


            $resultSet = $con->Execute($query);

            return (!empty($resultSet)) ? $this->mapping($resultSet) : array();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function enableMember(int $idMember)
    {
        try {

            $query = "UPDATE members SET enabled = 1 WHERE id=" . $idMember;

            $con = Connection::getInstance();

            $con->Execute($query);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function mapping($value)
    {

        $value = is_array($value) ? $value : [];

        $resp = array_map(function ($p) {
            $memberFactory = new MemberFactory();
            return $memberFactory->create($p["id"], $p["dni"], $p["email"], $p["password"], $p["firstName"], $p["lastName"], $p["enabled"], $p["membershipId"], $p["lastUpdate"]);
        }, $value);

        return count($resp) > 1 ? $resp : $resp[0];
    }
}
