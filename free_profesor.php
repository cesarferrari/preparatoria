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
         
              $edita=$base->prepare("select prof.matricula,asig.id_asignatura,asig.asignatura,asig.nivel_educativo,prof.nombre,prof.apellidoP,prof.apellidoM,prof.email
               from asignatura asig inner join profesor prof on prof.id_profesor=asig.id_asignatura where prof.matricula=$id;");
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
             <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo $user['email']?>">
             </div>
            
           <div class="form_boz">
           <button class="b2"  name="btn_edicion" id="grupo">EDITAR</button>
           </div>
                 </form>
                 <a href="profesor.php">regresar</a>
                </div>
                <?php
            }
         }

        if(isset($_GET['btn_edicion'])){
         
            
            $nombre=$_GET['nombre'];
            $apellidoP=$_GET['apellidoP'];
            $apellidoM=$_GET['apellidoM'];
             $matricula=$_GET['matricula'];
            $edicion=$base->prepare("update profesor set nombre=:nombre,apellidoP=:apellidoP,apellidoM=:apellidoM 
             where matricula=:matricula");
             
            
               $edicion->bindParam(':nombre',$nombre);
                  $edicion->bindParam(':apellidoP',$apellidoP);
                   $edicion->bindParam(':apellidoM',$apellidoM);
                   $edicion->bindParam(':matricula',$matricula);            
                     if($edicion->execute()){
                       ?>
                     <script>alert('datos editados correctamente')
                        window.location.href="profesor.php";
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
