
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/ins_noticia.css">
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
            <?php
                     
                     include('conexion.php');
                 
                
                     if(isset($_POST['btn_envia'])){
                      
                    $sel=$_POST['seleccion'];
                  $consulta=$base->prepare("delete from noticia where id_noticia=$sel");
                if(  $consulta->execute()){
                    ?>
                       <script>
                        alert("datos eliminados correctamente");
                       </script>
                    <?php
                }else{
                    ?>
                    <script>
                     alert("error al eliminar datos ");
                    </script>
                 <?php
                }
                }


               if(isset($_POST['btn_modifica'])){
                  $id=$_POST['ID'];
                $url=$_POST['url'];
                   $titulo=$_POST['titulo'];
                   $encabezado=$_POST['encabezado'];
                   $noticia=$_POST['noticia'];

                   if(empty($id)||empty($url)||empty($titulo)||empty($encabezado||empty($noticia))){
                     ?>
                       <script>
                        alert("debe llenar todos los campos ");
                       </script>
                     <?php
                }else{
                    $update=$base->prepare("update noticia set url=:url,titulo=:titulo,encabezado=:encabezado,
                    noticia=:noticia where id_noticia=:id_noticia");
 
                    $update->bindParam(':id_noticia',$id);
                    $update->bindParam(':titulo',$titulo);
                    $update->bindParam(':encabezado',$encabezado);
                    $update->bindParam(':url',$url);
                    $update->bindParam(':noticia',$noticia);
                     if($update->execute()){
                         ?>
                         <script>
                      alert("datos modificados  correctamente");
                         </script>
                       <?php
                     }else{
                         ?>
                         <script>
                      alert("error al modifcar");
                         </script>
                       <?php
                     }
                }

                    }

               
                      
                  ?>


            <div class="body">
                
           
           <div class="formulario">
           <div class="center"> <h5>Eliminar</h5></div>
           <div class="form_grupo">
            <form    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <select class="form_agrupa" name="seleccion" >
                <?php 
                require('conexion.php');
                $consulta=$base->prepare("select* from noticia");
                $consulta->execute(array());
                $usuario=$consulta->fetchAll(PDO::FETCH_ASSOC);
                foreach ($usuario as $user ) {
                    ?>
                    <option value="<?php echo $user['id_noticia']?>"><?php echo "tema: ".$user['id_noticia']." ".$user['encabezado']?></option>
                    
              <?php
                         }
                ?>
                        </select>
            </div>
                      <button class="btn_form" type="submit" name="btn_envia" value="Enviar">Enviar</button>
                          </div>
                        
                         
                          <div class="formularioX">
                          <div class="center"><h5>Modificar</h5></div>
           <div class="for_grupo">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
        
            <div class="for_grupo">
           <label class="form_label" for="url">ID</label>
                <input type="text" id="id" name="ID" placeholder="identificador #" > 
                </div>

            <div class="for_grupo">
           <label class="form_label" for="url">URL</label>
                <input type="text" id="nombre" name="url" placeholder="ingrese URL de la imagen" > 
                </div>
                <div class="for_grupo">
           <label class="form_label" for="tipo">titulo</label>
                <input type="text" id="nombre" name="titulo" placeholder="ingrese titulo de la noticia"   > 
                </div>
                <div class="for_grupo">
           <label class="form_label" for="tipo">encabezado</label>
                <input type="text" id="encabezado" name="encabezado" placeholder="encabezado de la nota"  > 
                </div>
             <div class="for_grupo">
           <label class="form_label" for="noticia">noticia</label>
            <textarea  autofocus maxleinght=200 name="noticia" id="" cols="30" rows="5"  ></textarea>
                </div>


            </div>
                      <button class="btn_form" type="submit" name="btn_modifica" value="Enviar">Enviar</button>
                          </div>

                        </div>
                         </div>
                         </div>
       
        
        <script href="javascript/profesor.js"></script>
  
          
        </body>
</html>