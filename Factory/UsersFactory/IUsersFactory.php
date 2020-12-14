<?php

    namespace Factory\UsersFactory;

    use Models\Users\Admin as Admin;
    use Models\Users\Member as Member;

    interface IUsersFactory{
        
        function create(int $id = 0, int $dni=10000, string $email = "", string $password = "", string $firstName = "", string $lastName = "", bool $enabled = false);
           
    }


?>