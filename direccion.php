
<?php

if(isset($_GET['cerrar sesion'])){
session_unset();
session_destroy();
}
session_start();
$usuario=$_SESSION['code'];

include("conexion.php");
try{
    $consulta=$base->prepare("select * from usuario where matricula=".$usuario);
 $consulta->execute(array());
    $usuarios=$consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($usuarios as $user){
      $tipo_usuario=$user['tipoUsuario'];
     
    }
      }catch(Exception $err){
 echo $err->getMessage();
      }
        
   


echo $usuario;
if(strcmp($tipo_usuario,"SE")==0){
//echo "$usuario"."user";
header("location:consultar_inscripcion_admin.php");
}else{
    header("location:consultar_inscripcion.php");
}

?>