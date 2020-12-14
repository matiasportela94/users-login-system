<?php

    namespace Factory\ResetPasswordFactory;

    use Factory\ResetPasswordFactory\IResetPasswordFactory as IResetPasswordFactory;
    use Models\ResetPassword\ResetPassword as ResetPassword;

    class ResetPasswordFactory implements IResetPasswordFactory{

        public function create(int $id = 0, string $email = "", string $token = ""){
            return new ResetPassword($id, $email, $token);
        }

    }


?>