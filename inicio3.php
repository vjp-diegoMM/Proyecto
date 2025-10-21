<?php
include_once "app/Videoclub.php"; 

$vc = new Videoclub("Severo 8A"); 

$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1) 
   ->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1)
   ->incluirDvd("Torrente", 4.5, "es","16:9") 
   ->incluirDvd("Origen", 4.5, "es,en,fr", "16:9") 
   ->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9") 
   ->incluirCintaVideo("Los cazafantasmas", 3.5, 107) 
   ->incluirCintaVideo("El nombre de la Rosa", 1.5, 140); 

$vc->listarProductos(); 

$vc->incluirSocio("Amancio Ortega",1) 
   ->incluirSocio("Pablo Picasso", 2); 

$vc->alquilaSocioProducto(1,2)
   ->alquilaSocioProducto(1,3)
   ->alquilaSocioProducto(1,2)
   ->alquilaSocioProducto(1,6); 

$vc->listarSocios();