<?php

include("conexion.php");
include('matricula.php');
$nombre='';
$apellido1='';
$apellido2='';
if(isset($_GET["user"])&&isset($_GET["pass"])){
$usuario=$_GET["user"];
$pass=$_GET["pass"];
$query[0]="select * from alumno where matricula='$usuario' ";
$query[1]="select * from profesor where matricula='$usuario' ";
$query[2]="select * from servicios_escolares where matricula='$usuario' ";
$count=0;
$contador=0;



}

?>