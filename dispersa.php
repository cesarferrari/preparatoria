<?php

include("conexion.php");
$nombre='';
$apellido1='';
$apellido2='';
if(isset($_GET["user"])&&isset($_GET["pass"])){
$usuario=$_GET["user"];
$pass=$_GET["pass"];
$query[0]="select * from alumno where matricula='$usuario' and password='$pass'";
$query[1]="select * from profesor where matricula='$usuario' and password='$pass'";
$query[2]="select * from servicios_escolares where matricula='$usuario' and password='$pass'";
$count=0;
try{

  for ($i=0; $i <3; $i++) { 
    $consulta=$base->query($query[$i]);
    $consulta->execute(array());
    $usuarios=$consulta->fetchAll(PDO::FETCH_ASSOC);
    $count++;
    if($usuarios){
      break;
    }
  }
   echo 'the counter was='.$count;

   
   if($count==1&&$usuarios){
   
      
echo "nombre ".$nombre." apellido ".$apellido1." apellido materno".$apellido2;
 session_start();
 $_SESSION['code']=$usuario;
 
header("location:acceso.php");
$count=0;
   }else if($count==2&&$usuarios){
    session_start();
 $_SESSION['code']=$usuario;
 
header("location:acceso_profesor.php");
   }else if($count&&$usuarios){
    session_start();
    $_SESSION['code']=$usuario;
    
   header("location:acceso_SE.php");
   $count=0;
   }else{
    $redirect='<script>  window.location.href=login.php</script>';
    header("location:login.php?error=usuario o contraseña no coinciden");
    $count=0;
    exit();
   }
}catch(Exception $e){
echo "error";
}

}

?>