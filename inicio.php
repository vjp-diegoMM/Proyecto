<?php
include "app/Soporte.php";

// $soporte1 = new Soporte("Telnet",22,3); 
// echo "<strong>" . $soporte1->getTitulo() . "</strong>"; 
// echo "<br>Precio: " . $soporte1->getPrecio() . " euros"; 
// echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
// $soporte1->muestraResumen();

// include "app/Dvd.php";

// $miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9"); 
// echo "<strong>" . $miDvd->getTitulo() . "</strong>"; 
// echo "<br>Precio: " . $miDvd->getPrecio() . " euros"; 
// echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " euros";
// $miDvd->muestraResumen();

include "app/Juego.php";

$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1); 
echo "<strong>" . $miJuego->getTitulo() . "</strong>"; 
echo "<br>Precio: " . $miJuego->getPrecio() . " euros"; 
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
$miJuego->muestraResumen();

?>