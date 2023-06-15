<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumno</title>
        <link rel="stylesheet" href="styles/estile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://kit.fontawesome.com/6a4751c08d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <script src="alumno.js"></script>
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
    <?php  session_start();
                $sexion=$_SESSION['user'];
                if($sexion==null || $sexion=''){
                    header('location:login.php');
                }
                ?>
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
            <a href="colegiaturas.php">
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
            <div class="left">
            
            <div class="form_grupo">

          <?php
  require('conexion.php');
   
        
     


        
        
          
         if(isset($_GET['txtID_se'])){
            $id=$_GET['txtID_se'];
         
              $edita=$base->prepare('select* from incidencia where id_incidencia ='.$id);
              $edita->execute(array());
              $usuario=$edita->fetchAll(PDO::FETCH_ASSOC);
              foreach ($usuario as $user) {
                
         ?>
           <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="GET">
                <div class="form_box">
                <label for="matricula">Matricula</label>
                <input type="text" name="id_incidencia"  value="<?php echo $user['id_incidencia']?>" >
                </div>

                <div class="form_box">
                <label class="form_label" for="incidence">Incidencia</label>
            <textarea  autofocus maxlenght=200 name="incidencia" id="" cols="30" rows="5"><?php echo $user['incidencia']?></textarea>
                </div>

           <div class="form_boz">
           <button class="b2"  name="btn_edicion_se" id="grupo">EDITAR</button>
           </div>
                 </form>
                 <a href="incidencia.php">regresar</a>
                </div>
                <?php
            }
         }else  if(isset($_GET['txtID_prof'])){
            $id=$_GET['txtID_prof'];
         
              $edita=$base->prepare('select* from incidencia_prof where id_incidencia ='.$id);
              $edita->execute(array());
              $usuario=$edita->fetchAll(PDO::FETCH_ASSOC);
              foreach ($usuario as $user) {
                
         ?>
           <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="GET">
                <div class="form_box">
                <label for="matricula">Matricula</label>
                <input type="text" name="id_incidencia"  value="<?php echo $user['id_incidencia']?>" >
                </div>

                <div class="form_box">
                <label class="form_label" for="incidence">Incidencia</label>
            <textarea  autofocus maxlenght=200 name="incidencia" id="" cols="30" rows="5"><?php echo $user['incidencia']?></textarea>
                </div>

           <div class="form_boz">
           <button class="b2"  name="btn_edicion_prof" id="grupo">EDITAR</button>
           </div>
                 </form>
                 <a href="incidencia.php">regresar</a>
                </div>
                <?php
            }
         }else  if(isset($_GET['txtID_al'])){
            $id=$_GET['txtID_al'];
         
              $edita=$base->prepare('select* from incidencia_al where id_incidencia ='.$id);
              $edita->execute(array());
              $usuario=$edita->fetchAll(PDO::FETCH_ASSOC);
              foreach ($usuario as $user) {
                
         ?>
           <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="GET">
                <div class="form_box">
                <label for="matricula">Matricula</label>
                <input type="text" name="id_incidencia"  value="<?php echo $user['id_incidencia']?>" >
                </div>

                <div class="form_box">
                <label class="form_label" for="incidence">Incidencia</label>
            <textarea  autofocus maxlenght=200 name="incidencia" id="" cols="30" rows="5"><?php echo $user['incidencia']?></textarea>
                </div>

           <div class="form_boz">
           <button class="b2"  name="btn_edicion_al" id="grupo">EDITAR</button>
           </div>
                 </form>
                 <a href="incidencia.php">regresar</a>
                </div>
                <?php
            }
         }

        if(isset($_GET['btn_edicion_se'])){
         
            $incidencia=$_GET['incidencia'];
            $id_incidencia=$_GET['id_incidencia'];
          
            $edicion=$base->prepare("update incidencia set incidencia=:incidencia
             where id_incidencia=:id_incidencia");
             
            $edicion->bindParam(':id_incidencia',$id_incidencia);
               $edicion->bindParam(':incidencia',$incidencia);
          
            
                     if($edicion->execute()){
                       ?>
                     <script>alert('datos editados correctamente')
                        window.location.href="incidencia.php";
                    </script>
                       <?php
                     }else{
                        ?>
                        <script>alert('error al editar')</script>
                          <?php
                     }
         }else  if(isset($_GET['btn_edicion_prof'])){
         
            $incidencia=$_GET['incidencia'];
            $id_incidencia=$_GET['id_incidencia'];
          
            $edicion=$base->prepare("update incidencia_prof set incidencia=:incidencia
             where id_incidencia=:id_incidencia");
             
            $edicion->bindParam(':id_incidencia',$id_incidencia);
               $edicion->bindParam(':incidencia',$incidencia);
          
            
                     if($edicion->execute()){
                       ?>
                     <script>alert('datos editados correctamente')
                        window.location.href="incidencia.php";
                    </script>
                       <?php
                     }else{
                        ?>
                        <script>alert('error al editar')</script>
                          <?php
                     }
         }else if(isset($_GET['btn_edicion_al'])){
         
            $incidencia=$_GET['incidencia'];
            $id_incidencia=$_GET['id_incidencia'];
          
            $edicion=$base->prepare("update incidencia_al set incidencia=:incidencia
             where id_incidencia=:id_incidencia");
             
            $edicion->bindParam(':id_incidencia',$id_incidencia);
               $edicion->bindParam(':incidencia',$incidencia);
          
            
                     if($edicion->execute()){
                       ?>
                     <script>alert('datos editados correctamente')
                        window.location.href="incidencia.php";
                    </script>
                       <?php
                     }else{
                        ?>
                        <script>alert('error al editar')</script>
                          <?php
                     }
         }
         ?>            
       
            
      
           </div>
       
        </div>
    </div>
    
</html>
