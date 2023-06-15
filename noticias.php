
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/ins_profesor.css">
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
            <?php  session_start();
                $sexion=$_SESSION['user'];
                if($sexion==null || $sexion=''){
                    header('location:login.php');
                }
                ?>
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
                <h4> Colegiatura</h4>
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
         
           <div class="formulario">
  <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
          
     
            <div class="inputa">
            <h2>   <a href="noticia_update.php">Noticias</a></h2>
            </div>
          
            <div class="form_grupo">
           <label class="form_label" for="url">URL</label>
                <input type="text" id="nombre" name="url" placeholder="ingrese URL de la imagen" > 
                </div>
                <div class="form_grupo">
           <label class="form_label" for="tipo">titulo</label>
                <input type="text" id="nombre" name="titulo" placeholder="ingrese titulo de la noticia"   > 
                </div>
                <div class="form_grupo">
           <label class="form_label" for="tipo">titulo</label>
                <input type="text" id="encabezado" name="encabezado" placeholder="encabezado de la nota"  > 
                </div>
             <div class="form_grupo">
           <label class="form_label" for="noticia">noticia</label>
            <textarea  autofocus maxleinght=200 name="noticia" id="" cols="30" rows="5"  ></textarea>
                </div>
             <div class="inputa">
           
             <button class="button" type="submit" name="btn_envia" value="Enviar">Enviar</button>
 <?php
             function muestraId(){
              
                echo "pribando este pinche metodo";

}
?>

                    </div>
                </form>


            </div>

                <?php
                
                include('conexion.php');
                require('matricula.php');
                $r1=0;
                if(isset($_POST['btn_envia'])){
                  $url=$_POST['url'];
                  $titulo=$_POST['titulo'];
                  $noticia=$_POST['noticia'];
                  $encabezado=$_POST['encabezado'];
              
                }
                 if(empty($titulo)||empty($noticia)){
                  ?>
               
                  <?php
              }else{

              
                 $inserta=$base->prepare("insert into noticia(titulo,noticia,url,fecha,encabezado)values(:titulo,:noticia,:url,now(),:encabezado)");
                 $inserta->bindParam(':noticia',$noticia);
                 $inserta->bindParam(':titulo',$titulo);
                 $inserta->bindParam(':url',$url);
                 $inserta->bindParam(':encabezado',$encabezado);
                if( $inserta->execute()){
                  ?>
                  <script>
               alert("datos insertados correctamente");
                  </script>
                <?php
                }else{

                }
                }
              
                
            
                  
                ?>

             </div>
             </div>
        
        </div>
       
        
        <script href="javascript/profesor.js"></script>
  
          
        </body>
</html>