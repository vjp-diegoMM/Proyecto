<?php
// Autoloader PSR-4 mínimo para Dwes\ProyectoVideoclub\
spl_autoload_register(function (string $class) {
    $prefix = 'Dwes\\ProyectoVideoclub\\';
    $base_dir = __DIR__ . '/app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // no pertenece a nuestro espacio de nombres
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});