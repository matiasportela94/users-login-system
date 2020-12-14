<?php

    namespace Models\Clases;

    class Horario
    {
        private $id;
        private $dia;
        private $horaInicio;
        private $horaFin;
        private $idProfesor;

        public function __construct($id ="", $dia = "", $horaInicio = "", $horaFin = "", $idProfesor = "")
        {
            $this->id = $id;
            $this->dia = $dia;
            $this->horaInicio = $horaInicio;
            $this->horaFin = $horaFin;
            $this->idProfesor = $idProfesor;
        }        

        public function getId() {
            return $this->id;
        }

        public function getDia() {
            return $this->dia;
        }

        public function getHoraInicio() {
            return $this->horaInicio;
        }

        public function getHoraFin() {
            return $this->horaFin;
        }

        public function getIdProfesor() {
            return $this->idProfesor;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setDia($dia){
            $this->dia= $dia;
        }

        public function setHoraInicio($horaInicio){
            $this->horaInicio= $horaInicio;
        }

        public function setHoraFin($horaFin){
            $this->horaFin= $horaFin;
        }

        public function setIdProfesor($idProfesor){
            $this->idProfesor = $idProfesor;
        }

    }


?>