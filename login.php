<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
   


    <div id="login">
<div class="llave"> 
   
</div>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="GET">
            <h1>Inicio de sesion</h1>
              <label for="user">usuario</label>
            <input type="text" id="user" name="user" placeholder="ingrese su usuario"> <br><br>
            <label for="pass">contraseña</label>
            <input type="password" id="pass" name="pass" placeholder="ingrese su contraseña"> <br><br>
            <input type="submit"><br><br>
            <?php
            ?>
             <a href="registrarse.php">nuevo usuario</a>
             <?php
if(isset($_GET['error'])){?>
<p class="error"><?php echo $_GET['error'];?></p>
                <?php } ?>
            </form>
 
   </div>
   <?php

include("conexion.php");
include('matricula.php');
$nombre='';
$apellido1='';
$apellido2='';
$contador=0;
if(isset($_GET["user"])&&isset($_GET["pass"])){
$usuario=$_GET["user"];
$pass=$_GET["pass"];
$query[0]="select * from alumno where matricula='$usuario' ";
$query[1]="select * from profesor where matricula='$usuario' ";
$query[2]="select * from servicios_escolares where matricula='$usuario' ";
$count=0;
$contador;
try{

  $consult=$base->prepare($query[0]);
  $consult->execute();
  $usuario1=$consult->fetchAll(PDO::FETCH_ASSOC);
  
  foreach ($usuario1 as $user) {
    $count++;
    if(password_verify($pass,$user['password'])){
     
     $contador++;
    }
  }
   
  

}catch(Exception $e){
echo "error";
}
try{

  $consult=$base->prepare($query[1]);
  $consult->execute();
  $usuario2=$consult->fetchAll(PDO::FETCH_ASSOC);
  
  foreach ($usuario2 as $user) {
    $count++;
    if(password_verify($pass,$user['password'])){
     
     $contador++;
    }
  }
   
  

}catch(Exception $e){
echo "error";
}
try{

  $consult=$base->prepare($query[2]);
  $consult->execute();
  $usuario3=$consult->fetchAll(PDO::FETCH_ASSOC);
  
  foreach ($usuario3 as $user) {
    $count++;
    if(password_verify($pass,$user['password'])){
     
     $contador++;
    }
  }
   
  

}catch(Exception $e){
echo "error";
}
if($usuario1 and $contador>0){

header('location:acceso.php');
}else if($usuario2 and $contador>0){
  header('location:acceso_profesor.php');
}else if($usuario3 and $contador>0){
   header('location:acceso_SE.php');
}


}

?>
</body>
</html>

