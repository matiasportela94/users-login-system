<?php

    namespace Models\Users;

    use Models\Users\User as User;

    final class Admin extends User
    {

        public function __construct(int $id = 0, int $dni=10000, string $email = "", string $password = "", string $firstName = "", string $lastName = "", bool $enabled = false){
            parent::__construct($id, $dni, $email, $password, $firstName, $lastName, $enabled);
        }

    }

?>
