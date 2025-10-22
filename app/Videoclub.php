<?php
include_once 'Juego.php';
include_once 'Soporte.php';
include_once 'Cliente.php';
include_once 'Dvd.php';
include_once 'CintaVideo.php';

class Videoclub
{
    public array $productos = [];
    public array $socios = [];

    public int $numProductosAlquilados = 0;
    public int $numTotalAlquileres = 0;

    public function getNumProductosAlquilados(): int {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres(): int {
        return $this->numTotalAlquileres;
    }
    
    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $numero = count($this->productos) + 1;
        $cintaVideo = new CintaVideo($titulo, $numero, $precio, $duracion);
        $this->productos[] = $cintaVideo;
    }

    public function incluirJuego($titulo, $precio, $consola, $minNumeroJugadores, $maxNumeroJugadores)
    {
        $numero = count($this->productos) + 1;
        $juego = new Juego($titulo, $numero, $precio, $consola, $minNumeroJugadores, $maxNumeroJugadores);
        $this->productos[] = $juego;
    }

    public function incluirDvd($titulo, $precio, $idiomas, $formatoPantalla)
    {
        $numero = count($this->productos) + 1;
        $dvd = new Dvd($titulo, $numero, $precio, $idiomas, $formatoPantalla);
        $this->productos[] = $dvd;
    }

    public function incluirSocio($nombre, $numero, $maxAlquileres = 3)
    {
        $cliente = new Cliente($nombre, $numero, $maxAlquileres);
        $this->socios[] = $cliente;
    }

    public function listarProductos()
    {
        foreach ($this->productos as $producto) {
            echo "<br>" . $producto->getTitulo();
        }
    }

    public function listarSocios()
    {
        foreach ($this->socios as $socio) {
            echo "<br>";
            if (method_exists($socio, 'getNumero')) {
                echo "Socio #" . $socio->getNumero() . ": ";
            }
            if (method_exists($socio, 'getNombre')) {
                echo $socio->getNombre();
            } else {
                echo "Nombre no disponible";
            }
        }
    }

    public function alquilaSocioProducto(int $numSocio, $numerosProductos): bool
    {
        if (is_int($numerosProductos)) {
            $numerosProductos = [$numerosProductos];
        } elseif (!is_array($numerosProductos)) {
            echo "Parámetros inválidos para alquiler.<br>";
            return false;
        }

        // buscar cliente
        $cliente = null;
        foreach ($this->socios as $s) {
            if (method_exists($s, 'getNumero') && $s->getNumero() === $numSocio) {
                $cliente = $s;
                break;
            }
        }
        if (!$cliente) {
            echo "Cliente no encontrado.<br>";
            return false;
        }
        $soportesAAlquilar = [];
        foreach ($numerosProductos as $numProd) {
            $encontrado = null;
            foreach ($this->productos as $p) {
                if ($p->getNumero() === $numProd) {
                    $encontrado = $p;
                    break;
                }
            }
            if (!$encontrado) {
                echo "Soporte #$numProd no encontrado. No se realiza ningún alquiler.<br>";
                return false;
            }
            if (isset($encontrado->alquilado) && $encontrado->alquilado) {
                echo "Soporte #$numProd ya está alquilado. No se realiza ningún alquiler.<br>";
                return false;
            }
            $soportesAAlquilar[] = $encontrado;
        }

        foreach ($soportesAAlquilar as $soporte) {
            $ok = $cliente->alquilar($soporte);
            if ($ok) {
                $this->numProductosAlquilados++;
                $this->numTotalAlquileres++;
            } else {
                echo "No se pudo alquilar el soporte " . $soporte->getNumero() . " al cliente " . $cliente->getNombre() . "<br>";
            }
        }

        return true;
    }
}
?>