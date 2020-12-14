<?php

    namespace Models\Users;

    class User{

        /** @var int */
        protected $id;
        /** @var int */
        protected $dni;
        /** @var string */
        protected $email;
        /** @var string */
        protected $password;
        /** @var string */
        protected $firstName;
        /** @var string */
        protected $lastName;
        /** @var bool */
        protected $isEnabled;

        public function __construct(int $id = 0, int $dni=10000, string $email = "", string $password = "", string $firstName = "", string $lastName = "", bool $isEnabled = false){
            $this->id = $id;
            $this->dni = $dni;
            $this->email = $email;
            $this->password = $password;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->isEnabled = $isEnabled;
        }

        public function getId(){
            return $this->id;
        }

        public function getDni(){
            return $this->dni;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getFirstName(){
            return $this->firstName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function isEnabled(){
            return $this->isEnabled;
        }

    }
