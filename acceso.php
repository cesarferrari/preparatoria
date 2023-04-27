<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://kit.fontawesome.com/6a4751c08d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
    
    </label>
    <a href="" class="enlace">
        <img src="imagen/demo.jpg" alt="" class="logo">
    </a>
    <ul>
    <li><a href="index.html">inicio</a></li>
                <li><a href="#">novedades</a></li>
            
                <li><a href="#">editar</a></li>
    </ul>
        </nav>
    <body>
    <?php

include('conexion.php');
//$base = new  PDO($hostname,$username,$password);
$base->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
$base->exec("SET CHARACTER SET utf8");

if(isset($_GET['user'])&&isset($_GET['pass'])){
$usuario=$_GET['user'];
$pass=$_GET['pass'];
try{
   $consulta=$base->query("select * from usuario where matricula='$usuario' and password='$pass'");
   $consulta->execute(array());
   $usuarios=$consulta->fetchAll(PDO::FETCH_ASSOC);
     
  if($usuarios){
   //print_r($usuarios);

foreach($usuarios as $user){
echo "bienvenido ".$user['nombre']." ".$user['apellidoP']." ".$user['apellidoM'];
}
session_start();
$_SESSION['code']=$usuario;
  
  }else{
   // $redirect='<script>  window.location.href=login.php</script>';
   header("location:login.php?error=usuario o contraseña no coinciden");
   exit();
  }
     
        
       
   

  /* $sql="select *from usuario  "; 
 $resultado=$base->prepare($sql);
 $resultado->execute([$usuario,$pass]);
foreach($resultado as $result){
echo $result;
}*/
}catch(Exception $e){
echo $e->getMessage();
}


/**/
}

?>

<?php
include('conexion.php');
       if(isset($_POST['matricula'])&&isset($_POST['user'])&&isset($_POST['apellido'])&&isset($_POST['apellido1'])&&isset($_POST['turno'])
       &&isset($_POST['tipo'])&&isset($_POST['pass'])&&isset($_POST['pass1'])){
        $matricula=$_POST['matricula'];
              $user=$_POST['user'];
        $apellidoP=$_POST['apellido'];
        $apellidoM=$_POST['apellido1'];
        $turno=$_POST['turno'];
        $tipo="AL";
        $pass=$_POST['pass'];
        $pass1=$_POST['pass1'];
        if(empty($user)||empty($apellidoP)||empty($apellidoM)||empty($turno)||empty($tipo)||
        empty($pass)||empty($pass1)||empty($matricula)){
           header("location:registrarse.php?error=llene todos los campos");
           
           exit();
           
        }else if (strcmp($pass, $pass1) !== 0){

         header("location:registrarse.php?error=contraseña no coincide");
         $redirect='<script>  window.location.href=registrarse.php?error=contraseña no coincide</script>';
         exit();
              
          }else if(!preg_match("/^[a-zA-Z0-9$%&|<>#]{8,20}$/",$pass)){ 
            header("location:registrarse.php?error=invalido tu contraseña debe contener minusculas
             mayusculas numeros  y  caracter especial como $%&|<># minimo 8");
            exit();
           
              }else{
               try{
   $consulta=$base->query("select * from usuario where matricula='$matricula' ");
   $matr=$consulta->fetchAll(PDO::FETCH_OBJ);
     
  if($matr){
    header("location:registrarse.php?error=la matricula ya existe en la bd");
    exit();
  }else{
    $sql="insert into usuario (nombre,apellidoP,apellidoM,turno,tipoUsuario,password,matricula)
    values(:nombre,:apellidoP,:apellidoM,:turno,:tipoUsuario,:password,:matricula);";
   $consulta= $base->prepare($sql);
    $consulta->bindParam(':nombre',$user);
    $consulta->bindParam(':apellidoP',$apellidoP);
    $consulta->bindParam('apellidoM',$apellidoM);
    $consulta->bindParam(':turno',$turno);
    $consulta->bindParam(':tipoUsuario',$tipo); 
    $consulta->bindParam(':password',$pass);
    $consulta->bindParam(':matricula',$matricula);

    if($consulta->execute()){
echo "bienvenido ".$user." ".$apellidoP;
    }else{
      echo "error al guardar datos ";
    }
  }
     
}catch(Exception $e){
echo $e->getMessage();
}
}
              }
         
        ?>

    
       
    
        
    <div class="contenedor">
        
    <i class="fa-thin fa-user"></i>
       
        </div>

        <div>
          <ol>
            <li><a href="incidencia_al.php">incidencias alumnos</a></li>
            <li><a href="incidencia_profesores.php">incidencias profesores</a></li>
            <li><a href="historial_colegiaturas.php">historial coelgiaturas</a></li>
            <li><a href="consultar_inscripcion_admin.php">asignaturas</a></li>
            <li><a href="crear_avisos.php">crear avisos</a></li>
           
          </ol>
        </div>
    </body>
</html>