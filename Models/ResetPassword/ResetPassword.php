<?php

    namespace Models\ResetPassword;

    final class ResetPassword
    {

        private $id;
        private $email;
        private $token;

        public function __construct(int $id = 0, string $email = "", string $token = ""){
            $this->id = $id;
            $this->email = $email;
            $this->token = $token;
        }

        public function getId(){
            return $this->id;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getToken(){
            return $this->token;
        }


    }

?>
