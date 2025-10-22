<?php
namespace Dwes\ProyectoVideoclub;

include_once 'Soporte.php';
class Juego extends Soporte
{
    private string $consola;
    private int $minNumJugadores;
    private int $maxNumJugadores;

    public function __construct(string $titulo, int $numero, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraResumen(): void
    {
        parent::muestraResumen();
        echo " Consola: {$this->consola} Jugadores: {$this->minNumJugadores}-{$this->maxNumJugadores}" . PHP_EOL;
    }
}
?>