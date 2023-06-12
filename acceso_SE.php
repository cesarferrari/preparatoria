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
           
               
             
               
               
                <li><a href="destroy.php">inicio</a></li>
               
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
    
            <div class="body">
              
              <div class="form_group">
            <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="GET">
             <select name="combo" id="combo">
                <?php
                $title;
                require('conexion.php');
                try{
                $consult=$base->prepare("select distinct titulo from noticia");
                $consult->execute(array());
                $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);
                foreach ($usuario as $user) {
                    ?>
                    <option value="<?php echo $user['titulo']?>"><?php echo $user['titulo']?></option>
                    <?php
                }
            }catch(Exception $e){
               $e->getMessage();
            }
          

                ?>
              
             </select>
         <button type="submit" name="btn_combo">buscar</button>
    </form>
    </div>
      <div class="boxt">
      <?php
         if(isset($_GET['btn_combo'])){
        $titulo=$_GET['combo'];
     
        llama_url($titulo);
         }

llamados();

function llama_url($tit){
    require("conexion.php");

    $sql="select * from noticia where titulo='$tit' ";
    $urlImage;
try{
    $consult=$base->prepare($sql);
    $consult->execute(array());
    $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuario as $user) {
        $texto=$user['noticia'];

        $codificacion=mb_detect_encoding($texto,"UTF-8,ISO-8859-1");
        $text=iconv($codificacion,'UTF-8',$texto);
        ?>
        <h2 class="encabezado"><?php echo $user['encabezado']?></h2>
 <p class="img-1"><?php 
  echo $texto;
  ?></p>
  <img class="imagen1" src="<?php  echo $user['url']?>" alt="no disponible ">
  <?php
      }
}catch(Exception $e){
  $e->getMessage();
}
}
function llamados(){
    require("conexion.php");
    

    $sql="select * from noticia order by id_noticia desc limit 5; ";
    $urlImage;
try{
    $consult=$base->prepare($sql);
    $consult->execute(array());
    $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuario as $user) {
        $texto=$user['noticia'];

        
        ?>
        
 <p class="img-1"><?php 
  echo $texto;
  ?></p>
  <img class="imagen1" src="<?php  echo $user['url']?>" alt="no disponible ">
  <h2 class="encabezado"><?php echo $user['encabezado']?></h2>
  <?php
      }
}catch(Exception $e){
  $e->getMessage();
}
}

?>
  </div>
    </div>
                </body>
</html>