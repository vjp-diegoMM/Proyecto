<?php
    class CintaVideo extends Soporte
    {
        public function __construct(private $duracion) {
            parent::__construct();
        }

        function setDuracion($duracion) {
            $this->duracion = $duracion;
        }
        
        function getDuracion() {
            return $this->duracion;
        }

        function muestraResumen(){
            parent::muestraResumen();
            echo"<br>Tiene una duracion de : ".$this->duracion;
        }
    }
?>