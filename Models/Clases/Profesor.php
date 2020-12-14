<?php

    namespace Models\Clases;

    class Profesor
    {
        private $id;
        private $nombre;
        private $apellido;

        public function __construct($nombre = "", $apellido = "")
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }        

        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setApellido($apellido){
            $this->apellido = $apellido;
        }

    }


?>