<?php

    namespace Models\Clases;

    class Clase
    {
        private $id;
        private $tipoDeClase;
        private $cupoTotal;
        private $horario;

        public function __construct(int $id = 0, string $tipoDeClase = "", int $cupoTotal = 0, string $horario = "")
        {
            $this->id = $id;
            $this->tipoDeClase = $tipoDeClase;
            $this->cupoTotal = $cupoTotal;
            $this->horario = $horario;
        }        

        public function getId() {
            return $this->id;
        }

        public function getTipoDeClase() {
            return $this->tipoDeClase;
        }

        public function getCupoTotal() {
            return $this->cupoTotal;
        }

        public function getIdHorario() {
            return $this->idHorario;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setTipoDeClase($tipoDeClase){
            $this->tipoDeClase = $tipoDeClase;
        }

        public function setCupoTotal($cupoTotal){
            $this->cupoTotal = $cupoTotal;
        }

        public function setIdHorario($idHorario){
            $this->idHorario = $idHorario;
        }
    }


?>