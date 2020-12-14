<?php

    namespace Factory\UsersFactory;

    use Factory\UsersFactory\IUsersFactory as IUsersFactory;
    use Models\Users\Admin as Admin;

    class AdminFactory implements IUsersFactory{

        public function create(int $id = 0, int $dni=10000, string $email = "", string $password = "", string $firstName = "", string $lastName = "", bool $enabled = false){
            return new Admin($id, $dni, $email, $password, $firstName, $lastName, $enabled);
        }

    }


?>