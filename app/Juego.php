<?php
include_once 'Soporte.php';
class Juego extends Soporte
{
    public function __construct($titulo, $numero, $precio, private $consola, private $minNumeroJugadores, private $maxNumeroJugadores) {
        parent::__construct($titulo, $numero, $precio);
    }

    function setConsola($consola) {
        $this->consola = $consola;
    }

    function getConsola() {
        return $this->consola;
    }

    function muestraJugadoresPosibles() {
        if ($this->minNumeroJugadores == $this->maxNumeroJugadores) {
            return $this->minNumeroJugadores." jugador(es)";
        } else {
            return $this->minNumeroJugadores." - ".$this->maxNumeroJugadores." jugadores";
        }
    }

    function muestraResumen() {
        parent::muestraResumen();
        echo"Para la consola ".$this->consola." con un numero de jugadores de ".$this->muestraJugadoresPosibles();
    }
}
?>