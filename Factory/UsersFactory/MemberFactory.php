<?php

    namespace Factory\UsersFactory;
    
    use Factory\UsersFactory\IUsersFactory as IUsersFactory;
    use Models\Users\Member as Member;

    class MemberFactory implements IUsersFactory{

        public function create(int $id = 0, int $dni=10000, string $email = "", string $password = "", string $firstName = "", string $lastName = "", bool $enabled = false, string $lastUpdate = ""){
            return new Member($id, $dni, $email, $password, $firstName, $lastName, $enabled, $lastUpdate);
        }

    }

?>