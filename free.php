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
   
        
     


        
        
          
         if(isset($_GET['txtID'])){
            $id=$_GET['txtID'];
         
              $edita=$base->prepare('select* from alumno where matricula ='.$id);
              $edita->execute(array());
              $usuario=$edita->fetchAll(PDO::FETCH_ASSOC);
              foreach ($usuario as $user) {
                
         ?>
          
             
                <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="GET">
                <div class="form_box">
                <label for="matricula">Matricula</label>
                <input type="text" name="matricula"  value="<?php echo $user['matricula']?>" >
                </div>

                <div class="form_box">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $user['nombre']?>" >
                </div>

                <div class="form_box">
             <label for="apellido">ApellidoP</label>
                <input type="text" name="apellidoP" value="<?php echo $user['apellidoP']?>">
             </div>

             <div class="form_box">
             <label for="apellidoM">ApellidoM</label>
                <input type="text" name="apellidoM" value="<?php echo $user['apellidoM']?>">
             </div>

              <div class="form_box">
              <label for="turno">turno</label>
                <select name="turno" id="turno">
                    <option value="<?php echo $user['turno']?>"><?php echo $user['turno']?></option>
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                    <option value="Vespertino">Nocturno</option>
                    </select>
              </div>

             <div class="form_box">
             <label for="tipo_usuario">tipo de usuario</label>
                <select name="tipo_usuario" id="tipo_usuario">
                    <option value="<?php echo $user['tipo_usuario']?>"><?php echo $user['tipo_usuario']?></option>
                    <option value="Alumno">Alumno</option>
                    <option value="padre/tutor">padre o tutor</option>
                 
                    </select>
             </div>

                <div class="form_box">
                <label for="tipo_usuario">nivel educativo</label>
                <select name="nivel_educativo" id="nivel_educativo">
                    <option value="<?php echo $user['nivel_educativo']?>"><?php echo $user['nivel_educativo']?></option>
                    <option value="preescolar">preescolar</option>
                    <option value="primaria">primaria</option>
                    <option value="secundaria">secundaria</option>
                    <option value="preparatoria">preparatoria</option>
                    </select>
              
              
                </div>

               <div class="form_box">
               <label class="form_label" for="grupo">grupo</label> 
                <select name="grupo" id="grupo">
                <option value="<?php echo $user['grupo']?>"><?php echo $user['grupo']?></option>
                    <option value="1-A">1-A</option>
                    <option value="1-B">1-B</option>
                    <option value="1-C">1-C</option>
                    <option value="2-A">2-A</option>
                    <option value="2-B">2-B</option>
                    <option value="2-C">2-C</option>
                    <option value="3-A">3-A</option>
                    <option value="3-B">3-B</option>
                    <option value="3-C">3-C</option>
                    <option value="4-A">4-A</option>
                    <option value="4-B">4-B</option>
                    <option value="4-C">4-C</option>
                    <option value="5-A">5-A</option>
                    <option value="5-B">5-B</option>
                    <option value="5-C">5-C</option>
                    <option value="6-A">6-A</option>
                    <option value="6-B">6-B</option>
                    <option value="6-C">6-C</option>
                 </select>
               </div>
                  
               
           <div class="form_boz">
           <button class="b2"  name="btn_edicion" id="grupo">EDITAR</button>
        
           </div>
                 </form>
                 <a href="alumnos.php">regresar</a>
                </div>
                <?php
            }
         }

        if(isset($_GET['btn_edicion'])){
         
            $nombre=$_GET['nombre'];
            $apellidoP=$_GET['apellidoP'];
            $apellidoM=$_GET['apellidoM'];
            $tipo=$_GET['tipo_usuario'];
            $nivel=$_GET['nivel_educativo'];
            $grupo=$_GET['grupo'];
            $turno=$_GET['turno'];
             $matricula=$_GET['matricula'];
            $edicion=$base->prepare("update alumno set nombre=:nombre,apellidoP=:apellidoP,apellidoM=:apellidoM,tipo_usuario
            =:tipo_usuario,nivel_educativo=:nivel_educativo,grupo=:grupo,turno=:turno where matricula=$matricula");
             
            $edicion->bindParam(':nombre',$nombre);
               $edicion->bindParam(':apellidoP',$apellidoP);
                  $edicion->bindParam(':apellidoM',$apellidoM);
            $edicion->bindParam(':tipo_usuario',$tipo);
               $edicion->bindParam('nivel_educativo',$nivel);
                  $edicion->bindParam(':grupo',$grupo);
                     $edicion->bindParam(':turno',$turno);
                     if($edicion->execute()){
                       ?>
                     <script>alert('datos editados correctamente')
                        window.location.href="alumnos.php";
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
