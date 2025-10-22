<?php
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

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getNumSoportesAlquilados(): int
    {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen(): void
    {
        echo "Cliente: " . $this->nombre . " - Alquileres realizados: " . $this->numSoportesAlquilados . "<br>";
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte->getNumero() === $s->getNumero()) {
                return true;
            }
        }
        return false;
    }

     public function alquilar(Soporte $s): bool
    {
        if ($this->tieneAlquilado($s)) {
            echo "<br>El cliente ya tiene alquilado el soporte " . $s->getTitulo() . "<br><br>";
            return false;
        }

        if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            echo "<br>Este cliente tiene " . $this->maxAlquilerConcurrente . " elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo<br><br>";
            return false;
        }

        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;

        $s->alquilado = true;

        echo "<br>Alquilado soporte a: " . $this->nombre . "<br><br>";
        $s->muestraResumen();
        echo "<br>";

        return true;
    }

    public function devolver(int $numSoporte): bool
    {
        foreach ($this->soportesAlquilados as $index => $soporte) {
            if ($soporte->getNumero() === $numSoporte) {
                $soporte->alquilado = false;

                unset($this->soportesAlquilados[$index]);
                $this->soportesAlquilados = array_values($this->soportesAlquilados);
                $this->numSoportesAlquilados--;
                echo "Soporte '" . $soporte->getTitulo() . "' devuelto con éxito.<br>";
                return true;
            }
        }

        echo "<br>No se ha podido encontrar el soporte en los alquileres de este cliente<br><br>";
        return false;
    }

    public function listarAlquileres(): void
    {
        if ($this->numSoportesAlquilados === 0) {
            echo "<br>Este cliente no tiene alquilado ningún elemento<br>";
            return;
        }

        echo "<br>El cliente tiene " . $this->numSoportesAlquilados . " soportes alquilados<br><br>";

        foreach ($this->soportesAlquilados as $soporte) {
            $soporte->muestraResumen();
            echo "<br>";
        }
    }
}
?>