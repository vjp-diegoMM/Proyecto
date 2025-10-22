<?php
namespace Dwes\ProyectoVideoclub;

include_once 'Soporte.php';
    class CintaVideo extends Soporte
    {
        public function __construct($titulo, $numero, $precio, private $duracion) {
            parent::__construct($titulo, $numero, $precio);
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