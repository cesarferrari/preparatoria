<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/style_SE.css">
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
           
               
             
               
               
                <li><a href="index.html">inicio</a></li>
               
                <li><a href="noticias.php">noticias</a></li>
                </ul>
                    </nav>
            <div class="container">
    
            <div class="lateral">
    <div class="option">
        <div class="logotipo">
            <a href="acceso_SE.php">
            <i class="fa-solid fa-house"></i>
                <h4>pricipal</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="incidencia.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  incidencias </h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="alumnos.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> alumnos</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="profesor.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>profesores</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="colegiatura.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> Colegiaturas</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="inscripcion.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> inscripciones</h4>
            </a>
        </div>
      
    </div>
            </div>
    
            <div class="cont">

<div class="boxt">
<img class="imagen1" src="imagen/prepa.jpg" alt="" width="100%">
<div class="imagen">
<p class="img-1">  En Educacion especial ABC, estamos comprometidos a brindar educación de calidad a niños de todas las capacidades.
Nuestro equipo de maestros experimentados y dedicados trabaja incansablemente para crear un entorno de aprendizaje inclusivo
y de apoyo que ayude a cada estudiante a alcanzar su máximo potencial. <br>
Nuestro personal está formado por profesionales altamente calificados apasionados por su trabajo y comprometidos a ayudar
a cada estudiante a alcanzar su máximo potencial.
</p>
</div>
</div>




        </div>
        
       
   
    
          
        </body>
</html>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <select name="titulo" id="titulo">
        <?php
        function comboBox(){
            foreach (select("select titulo from noticia") as $user) {
                ?>
                <option value="<?php echo $user['titulo']?>"><?php echo $user['titulo']?></option>


                <?php
                
                
            }
            ?>
            <input type="submit" name="combo">
              </form>
    

<?php
        }