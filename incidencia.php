<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/style_incidencia.css">
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
               
        <div class="form_group">

            <form method="GET" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <h3>incidencias</h3>
                <label for="alumno">Alumnos</label>
                <input type="radio" name="opcion" value="alumno">
               <label for="prof">Profesores</label>
               <input type="radio" name="opcion" value="profesor" >
               <label for="se">General</label>
              <input type="radio" name="opcion" value="SE" ><br>


<input type="date" name="f1" placeholder="fecha inicio">
<input type="date" name="f2" placeholder="fecha fin">
<input type="text" name="matricula" placeholder="matricula">
<button  class="boton" name="btn_check_fecha">Fecha</button>
</form>
               <button class="btn_lat"><a href="agregar_incidencia.php"><h2>Nuevo</h2></a></button>
        </div>
               </div>
               <div class="right">
                  <table>
                   <thead>
                    <tr>
                        <th colspan="2">Nombre</th>
                        <th>Incidecnia</th>
                        <th>Fecha</th>
                        <th>Editar</th>
                    </tr>
                       <?php
                       require("conexion.php");
                       require('matricula.php');
                       $id=0;
                   if(isset($_GET['btn_check_fecha'])){
                     $matricula=$_GET['matricula'];
                     $fechaI=$_GET['f1'];
                     $fechaF=$_GET['f2'];
                    if(isset($_GET['opcion'])){
                        $rol=$_GET['opcion'];
                    }else{
                        $rol="";
                    }
if($rol=="alumno" and  $matricula!=""){
    echo "<p>profesor$fechaI$fechaF$matricula</p>";
    $id_se= select("select id_services from servicios_escolares where matricula='$matricula'");
    $consult=$base->prepare(incidenceMatr($fechaI,$fechaF,$matricula)[0]);
    $consult->execute(array());
    $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuario as $user ) {
       ?>
<tr>
            <td ><?php echo $user['nombre']." ".$user['apellidoP']." ".$user['apellidoM']?></td>
            <td><?php echo $user['incidencia'] ?></td>
            <td><?php echo $user['fecha'] ?></td>
            <td><button>Editar</button></td>
        </tr>
      <?php
    }


                }else if($rol=="SE" and $matricula!=""){
                  //  echo "<p>profesor$fechaI$fechaF$matricula</p>";
                    $id_se= select("select id_services from servicios_escolares where matricula='$matricula'");
                 
                    $consult=$base->prepare("select* from incidencia where fecha between '$fechaI' and '$fechaF' ");
                    $consult->execute(array());
                    $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($usuario as $user ) {
                       ?>
                <tr>
                           <!-- <td ><//?php echo $user['nombre']." ".$user['apellidoP']." ".$user['apellidoM']?></td>-->
                            <td><?php echo $user['incidencia'] ?></td>
                            <td><?php echo $user['fecha'] ?></td>
                            <td><button>Editar</button></td>
                        </tr>
                      <?php
                    }
                }else if($rol=="profesor" and  $matricula!=""){
                    
    $id_se= select("select id_services from servicios_escolares where matricula='$matricula'");
    $consult=$base->prepare(incidenceMatr($fechaI,$fechaF,$matricula)[1]);
    $consult->execute(array());
    $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuario as $user ) {
       ?>
<tr>
            <td ><?php echo $user['nombre']."  ".$user['apellidoP']."  ".$user['apellidoM']?></td>
            <td><?php echo $user['incidencia'] ?></td>
            <td><?php echo $user['fecha'] ?></td>
            <td><button>Editar</button></td>
        </tr>
      <?php
    }

                }else if($rol=="alumno"){
                  $url_al= incidence($fechaI,$fechaF)[5];
       
                      
                      $id_al= select("select id from alumno where matricula='$matricula'");
                        $consult=$base->prepare(incidence($fechaI,$fechaF)[5]);
                        $consult->execute(array());
                        $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);

                      foreach ($usuario as $user ) {
                        ?>
                        <tr>
                            <td ><?php echo $user['nombre']." ".$user['apellidoP']." ".$user['apellidoM']?></td>
                            <td><?php echo $user['incidencia'] ?></td>
                            <td><?php echo $user['fecha'] ?></td>
                            <td><button>Editar</button></td>
                        </tr>
                        
                        
                                            <?php
                      }
               
                   
                    
                     
                   }else  if($rol=="profesor"){
                    $url_al= incidence($fechaI,$fechaF)[6];
                    
                    $id_prof= select("select id_profesor from profesor where matricula='$matricula'");
                    $consult=$base->prepare(incidence($fechaI,$fechaF)[6]);
                    $consult->execute(array());
                    $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($usuario as $user ) {
                       ?>
       <tr>
                            <td ><?php echo $user['nombre']." ".$user['apellidoP']." ".$user['apellidoM']?></td>
                            <td><?php echo $user['incidencia'] ?></td>
                            <td><?php echo $user['fecha'] ?></td>
                            <td><button>Editar</button></td>
                        </tr>
                      <?php
                    }
                }else if($rol=="SE"){
                    $url_se= incidence($fechaI,$fechaF)[6];
                    
                    $id_se= select("select id_services from servicios_escolares where matricula='$matricula'");
                    $consult=$base->prepare("select* from incidencia where fecha between '$fechaI' and '$fechaF' ");
                    $consult->execute(array());
                    $usuario=$consult->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($usuario as $user ) {
                       ?>
       <tr>
                          
                            <td><?php echo $user['incidencia'] ?></td>
                            <td><?php echo $user['fecha'] ?></td>
                            <td><button>Editar</button></td>
                        </tr>
                      <?php
                    }


                
                    }
                    }
               ?>
                      
                    
                   </thead>
<tbody>
   
</tbody>

                  </table>
               </div>
            </div>
        </div>
        
       
   
    
          
        </body>
</html>