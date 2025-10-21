<?php
include_once 'Resumible.php';
abstract class Soporte implements Resumible
{
    private const IVA = 21;
    public function __construct(private $titulo, private $numero, private $precio) {}

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getPrecioConIVA() {
        return $this->precio + ($this->precio * self::IVA / 100);
    }

    function muestraResumen() {
        echo "<br>El " . $this->titulo . " es el numero " . $this->numero . " y tiene un precio de " . $this->precio . " euros\n";
    }
}
?>