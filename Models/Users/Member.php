<?php

    namespace Models\Users;

    use Models\Users\User as User;
    final class Member extends User{

        private $lastUpdate;

        public function __construct(int $id = 0, int $dni=10000, string $email = "", string $password = "", string $firstName = "", string $lastName = "", bool $enabled = false, string $lastUpdate = ""){
            parent::__construct($id, $dni, $email, $password, $firstName, $lastName, $enabled);
            $this->lastUpdate = $lastUpdate;
        }

        public function getLastUpdate(){
            return $this->lastUpdate;
        }

    }
