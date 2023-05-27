<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="estilando.css">
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
                <img src="imagen/demo.png" alt="" class="logo">
            </a>
            <ul>
               
              
                <li><a href="destroy.php">inicio</a></li>
               <li><a href="noticias.php">noticias</a></li>
                </ul>
                </nav>
        <div class="container">

        <div class="lateral">
<div class="option">
    <div class="logotipo">
        <a href="acceso_profesor.php">
        <i class="fa-solid fa-house"></i>
            <h4> principal</h4>
        </a>
    </div>
    <div class="logotipo">
        <a href="http://">
            <i class="fa-sharp fa-regular fa-calendar-days"></i>
            <h4>  incidencias profesore</h4>
        </a>
    </div>
    <div class="logotipo">
        <a href="alumnos.php">
            <i class="fa-sharp fa-regular fa-calendar-days"></i>
            <h4>alumnos</h4>
        </a>
    </div>
    <div class="logotipo">
        <a href="profesores.php">
            <i class="fa-sharp fa-regular fa-calendar-days"></i>
            <h4>profesores</h4>
        </a>
    </div>
    <div class="logotipo">
        <a href="http://">
            <i class="fa-sharp fa-regular fa-calendar-days"></i>
            <h4> incidencias alumnos</h4>
        </a>
    </div>
  
</div>
        </div>

        <div class="body">

        <?php
               require('conexion.php');
               session_start();
           
               $r=$_SESSION['user'];
               $name='';
               $consulta=$base->prepare("select* from profesor where matricula ='$r'");
               $consulta->execute(array());
               $usuario=$consulta->fetchAll(PDO::FETCH_ASSOC);
                foreach ($usuario as $key) {
                    $name=$key['nombre']." ".$key['apellidoP']." ".$key['apellidoP'];
                }
               ?>
           <div class="left">
            <h3>
            <?php echo $_SESSION['user']; ?></h3>
              <p>PAGINA PRINCIPAL PROFESOR EN CONSTRUCCION</p> 
               <br>
               <h3>             <?php echo $name;
?></h3>
  
            
           </div>
           <div class="right">
          <p></p>
           </div>
        </div>
    </div>
    
    <body>
    <?php

include('conexion.php');
//$base = new  PDO($hostname,$username,$password);
$base->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
$base->exec("SET CHARACTER SET utf8");



?>

      
    </body>
</html>