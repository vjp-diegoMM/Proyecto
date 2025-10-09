<?php
include "app/Soporte.php";

$soporte1 = new Soporte("Telnet",22,3); 
echo "<strong>" . $soporte1->getTitulo() . "</strong>"; 
echo "<br>Precio: " . $soporte1->getPrecio() . " euros"; 
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
$soporte1->muestraResumen();
?>