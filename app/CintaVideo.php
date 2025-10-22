<?php
namespace Dwes\ProyectoVideoclub;

include_once 'Soporte.php';
    class CintaVideo extends Soporte
    {
        private int $duracion;

        public function __construct(string $titulo, int $numero, float $precio, int $duracion)
        {
            parent::__construct($titulo, $numero, $precio);
            $this->duracion = $duracion;
        }

        public function muestraResumen(): void
        {
            parent::muestraResumen();
            echo " Duración: {$this->duracion} min <br>";
        }
    }
    
?>