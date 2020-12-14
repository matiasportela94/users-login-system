<?php

    namespace Factory\ResetPasswordFactory;

    use Models\ResetPassword\ResetPassword as ResetPassword;

    interface IResetPasswordFactory{
        
        function create(int $id = 0, string $email = "", string $token = "");
           
    }


?>