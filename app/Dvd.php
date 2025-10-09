<?php
    class Dvd extends Soporte
    {
        public function __construct(private $idiomas, private $formatoPantalla) {
            parent::__construct();
        }

        function setIdiomas($idiomas) {
            $this->idiomas = $idiomas;
        }

        function setFormatoPantalla($formatoPantalla) {
            $this->formatoPantalla = $formatoPantalla;
        }

        function getIdiomas() {
            return $this->idiomas;
        }

        function getFormatoPantalla() {
            return $this->formatoPantalla;
        }

        function mostrarResumen() {
            parent::muestraResumen();
            echo"Con los idiomas ".$this->idiomas." con un formato de pantalla ".$this->formatoPantalla;
        }
    }
    
?>