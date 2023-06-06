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
  // echo 'the counter was='.$count;

   
   if($count==1 and $usuarios){
    session_start();
      
 

 $_SESSION['user']=$usuario;?>
<script>
  window.location.href="acceso.php";
</script>
 <?php
 
//header("location:acceso.php");
$count=0;
   }else if($count==2 and $usuarios){

    session_start();
 $_SESSION['user']=$usuario;?>

<script>
 window.location.href="acceso_profesor.php";
</script>
<?php
    
 //header("location:acceso_profesor.php");

   }else if($count and $usuarios){
    session_start();
    $_SESSION['user']=$usuario;?>
<script>
 window.location.href="acceso_SE.php";
</script>

<?php

    //header("location:acceso_SE.php");
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
</body>
</html>

