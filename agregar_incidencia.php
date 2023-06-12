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
            <h2>   <a href="incidencia.php">Consultar Incidencia</a></h2>
            </div>
            <label for="alumno">Alumnos</label>
                <input type="radio" name="opcion" value="alumno">
               <label for="prof">Profesores</label>
               <input type="radio" name="opcion" value="profesor" >
               <label for="se">General</label>
              <input type="radio" name="opcion" value="SE" ><br>
            <div class="form_grupo">
           <label class="form_label" for="nombre">matricula</label>
                <input type="text" id="nombre" name="matricula" placeholder="ingrese matricula" > 
                </div>
             <div class="form_grupo">
           <label class="form_label" for="incidence">Inidencia</label>
            <textarea  autofocus maxleinght=200 name="area" id="" cols="30" rows="5"></textarea>
                </div>
             <div class="inputa">
                    <button  class="button2" type="submit" name="btn_envia">guardar</button>
                    </div>
                </form>
            </div>

                <?php
                include('conexion.php');
                require('matricula.php');
                $r1=0;
                if(isset($_POST['btn_envia'])){
                  $matricula=$_POST['matricula'];
                  $area=$_POST['area'];
                   if(isset($_POST['opcion'])){
                     $rol=$_POST['opcion'];
                   }else{
                    $rol="";
                   }
                 if(empty($matricula)||empty($area)){
                  ?>
                    <script>
                 alert("debe llenar todos los campos");
                    </script>
                  <?php
                  }else if($rol=="alumno"){
                    $r1=select("select id from alumno where matricula='{$matricula}'");
               
                 
               
                   if( $r1==0){
                           
                      ?>
                      <script>alert(" la matricula aun no esta asignada a ningun alumno")</script>
                    <?php
                  }else{
                    $id=0;
                    foreach ($r1 as $key ) {
                      $id= $key;
                    }
                    
                        try{
                            $insert=$base->prepare("insert into incidencia_al(incidencia,id_alumno,fecha)values(:incidencia,:id_alumno,now())");
                             $insert->bindParam(':incidencia',$area);
                             $insert->bindParam(':id_alumno',$id);
                             if($insert->execute()){
                              ?>
                              <script>alert("datos ingresados correctamente")</script>
                            <?php
                             }else{
                              ?>
                              <script>alert("error al ingresar datos ")</script>
                            <?php
                             }
                          }catch(Exception $e){
                           $e->getMessage();
                        }
                    }


                    }else if($rol=="profesor"){
                      $r1=select("select id_profesor from profesor where matricula='{$matricula}'");
                 
                   
                 
                     if( $r1==0){
                             
                        ?>
                        <script>alert(" la matricula aun no esta asignada a ningun profesor")</script>
                      <?php
                    }else{
                      $id=0;
                      foreach ($r1 as $key ) {
                        $id= $key;
                      }
                      
                          try{
                              $insert=$base->prepare("insert into incidencia_prof(incidencia,id_profesor,fecha)values(:incidencia,:id_profesor,now())");
                               $insert->bindParam(':incidencia',$area);
                               $insert->bindParam(':id_profesor',$id);
                               if($insert->execute()){
                                ?>
                                <script>alert("datos ingresados correctamente")</script>
                              <?php
                               }else{
                                ?>
                                <script>alert("error al ingresar datos ")</script>
                              <?php
                               }
                            }catch(Exception $e){
                             $e->getMessage();
                          }
                      }
  
  
                      }else if($rol=="SE"){
                        $r1=select("select id_services from servicios_escolares where matricula='{$matricula}'");
                   if( $r1==0){
                               ?>
                          <script>alert(" la matricula aun no esta asignada ")</script>
                        <?php
                      }else{
                        $id=0;
                        foreach ($r1 as $key ) {
                          $id= $key;
                        }
                              
                            try{
                                $insert=$base->prepare("insert into incidencia(incidencia,id_alumno,fecha)values(:incidencia,:id_se,now())");
                                 $insert->bindParam(':incidencia',$area);
                                 $insert->bindParam(':id_se',$id);
                                 if($insert->execute()){
                                  ?>
                                  <script>alert("datos ingresados correctamente")</script>
                                <?php
                                 }else{
                                  ?>
                                  <script>alert("error al ingresar datos ")</script>
                                <?php
                                 }
                              }catch(Exception $e){
                               $e->getMessage();
                            }
                        }
    
    
                        }
                
                    }
                ?>
             </div>
             </div>
        
        </div>
       
        
        <script href="javascript/profesor.js"></script>
  
          
        </body>
</html>