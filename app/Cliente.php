<?php
namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;

class Cliente
{
    private array $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;

    public function __construct(
        private string $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente = 3
    ) {}

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $al) {
            if ($al->getNumero() === $s->getNumero()) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s): self
    {
        if ($s->alquilado) {
            throw new SoporteYaAlquiladoException('El soporte ya está alquilado');
        }
        if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            throw new CupoSuperadoException('Se ha superado el cupo de alquileres del cliente');
        }

        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        $s->alquilado = true;
        return $this;
    }

    public function devolver(int $numSoporte): self
    {
        foreach ($this->soportesAlquilados as $k => $al) {
            if ($al->getNumero() === $numSoporte) {
                $al->alquilado = false;
                unset($this->soportesAlquilados[$k]);
                $this->numSoportesAlquilados--;
                return $this;
            }
        }
        throw new SoporteNoEncontradoException('El soporte no está alquilado por este cliente');
    }

    public function listarAlquileres(): void
    {
        echo "Cliente: {$this->nombre}" . PHP_EOL;
        echo "Alquileres: {$this->numSoportesAlquilados}" . PHP_EOL;
        foreach ($this->soportesAlquilados as $al) {
            $al->muestraResumen();
        }
    }

    public function muestraResumen(): void
    {
        echo "{$this->nombre} ({$this->numero}) - Alquileres: {$this->numSoportesAlquilados}" . PHP_EOL;
    }
}
    
?>