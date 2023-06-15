<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/estilando.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://kit.fontawesome.com/6a4751c08d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
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
            <?php  session_start();
                $sexion=$_SESSION['userAlumno'];
                if($sexion==null || $sexion=''){
                    header('location:login.php');
                }
                ?>
            <div class="lateral">
    <div class="option">
        <div class="logotipo">
            <a href="acceso.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>principal</h4>
            </a>
        </div>

        <div class="logotipo">
            <a href="#">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>   alumnos</h4>
            </a>
        </div>

        <div class="logotipo">
            <a href="#">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  alumnos</h4>
            </a>
        </div>

        <div class="logotipo">
            <a href="#">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  alumnos</h4>
            </a>
        </div>

        <div class="logotipo">
            <a href="#">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  alumnos</h4>
            </a>
        </div>
      
            </div>
            </div>
            
    
            <div class="body">
               <?php
               require('conexion.php');
            
               $name='';
               $consulta=$base->prepare("select* from alumno ");
               $consulta->execute(array());
               $usuario=$consulta->fetchAll(PDO::FETCH_ASSOC);
                foreach ($usuario as $key) {
                    $name=$key['nombre']." ".$key['apellidoP']." ".$key['apellidoP'];
                }
               ?>
              <br>
                <p>PAGINA PRICIPAL ALUMNOS EN CONSTRUCCION</p><br><br>
                <h3><?php echo $name?></h3>

                <?php
                 
                ?>
</div>
</div>
              
            
        </div>
        
      
  
    </body>
</html>