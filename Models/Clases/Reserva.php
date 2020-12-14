<?php

    namespace Models\Clases;

    class Reserva
    {
        private $id;
        private $idMember;
        private $idClase;
        private $fecha;
        private $enabled;
        private $aNombreDe;
      

        public function getId() {
            return $this->id;
        }

        public function getIdMember() {
            return $this->idMember;
        }

        public function getIdClase() {
            return $this->idClase;
        }


        public function getFecha(){
            return $this->fecha;
        }

        public function getEnabled(){
            return $this->enabled;
        }

        public function getANombreDe(){
            return $this->aNombreDe;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setIdMember($idMember){
            $this->idMember = $idMember;
        }

        public function setIdClase($idClase){
            $this->idClase = $idClase;
        }


        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function setEnabled($enabled){
            $this->enabled = $enabled;
        }

        public function setANombreDe($aNombreDe){
            $this->aNombreDe = $aNombreDe;
        }

    }


?>