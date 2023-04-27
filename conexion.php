<?php
   $hostname='mysql:host=localhost; dbname=norma';            // indica la direccion del host
   $database="database_tennis";                    // indica la base de datos ala que se hace refrencia id18042303_database1
   $password="";                          //  indica la contraseña para entrar al servidor  %6uuXt|)W+az/]Ej
   $username='root';    
try{
    $base =new PDO($hostname,$username,$password);
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
echo $e->getMessage();
}



?>