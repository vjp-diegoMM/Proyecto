<?php
namespace Dwes\ProyectoVideoclub;

abstract class Soporte implements Resumible
{
    private static float $IVA = 0.21;
    public bool $alquilado = false;

    public function __construct(
        protected string $titulo,
        protected int $numero,
        protected float $precio
    ) {}

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getPrecioConIVA(): float
    {
        return $this->precio * (1 + self::$IVA);
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function muestraResumen(): void
    {
        echo $this->titulo."<br>";
    }
}
?>