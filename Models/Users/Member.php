<?php

    namespace Models\Users;

    use Models\Users\User as User;
    use DateTime as DateTime;

    final class Member extends User{

        /** @var string */
        private $membership;
        /** @var date */
        private $lastUpdate;

        public function __construct(int $id = 0, int $dni=10000, string $email = "", string $password = "", string $firstName = "", string $lastName = "", bool $enabled = false, string $membership = "", string $lastUpdate = ""){
            parent::__construct($id, $dni, $email, $password, $firstName, $lastName, $enabled);
            $this->membership = $membership;
            $this->lastUpdate = $lastUpdate;
        }

        public function getMembership(){
            return $this->membership;
        }

        public function getLastUpdate(){
            return $this->lastUpdate;
        }

    }
