<?php
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\Cliente;
use Dwes\ProyectoVideoclub\Soporte;
use Dwes\ProyectoVideoclub\Videoclub;

echo "Pruebas de carga de clases:\n";
echo class_exists(Cliente::class) ? "Cliente cargado\n" : "Cliente NO cargado\n";
echo class_exists(Soporte::class) ? "Soporte cargado\n" : "Soporte NO cargado\n";
echo class_exists(Videoclub::class) ? "Videoclub cargado\n" : "Videoclub NO cargado\n";

// Resto de las pruebas originales adaptadas aquí...