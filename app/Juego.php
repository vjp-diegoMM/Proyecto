<?php
    class Juego extends Soporte
    {
        public function __construct($titulo, $numero, $precio, private $consola, private $minNumJugadores, private $maxNumJugadores) {
            parent::__construct($titulo, $numero, $precio);
        }

        function setConsola($consola) {
            $this->consola = $consola;
        }

        function setMinNumJugadores($minNumJugadores) {
            $this->minNumJugadores = $minNumJugadores;
        }

        function setMaxNumJugadores($maxNumJugadores) {
            $this->maxNumJugadores = $maxNumJugadores;
        }

        function getConsola() {
            return $this->consola;
        }

        function getMinNumJugadores() {
            return $this->minNumJugadores;
        }

        function getMaxNumJugadores() {
            return $this->minNumJugadores;
        }

        function muestraJugadoresPosibles() {
            echo "<br>Numeros minimos de jugadores es: ".$this->minNumJugadores.", el maximo es: ".$this->maxNumJugadores;
        }

        function muestraResumen()
        {
            parent::muestraResumen();
            self::muestraJugadoresPosibles();
            echo "<br>De la consola: ".$this->consola;   
        }
    }
    
?>