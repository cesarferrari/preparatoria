<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/style_alumno.css">
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
               
               <li class="bienvenida">bienvenido alumno lenidas el fuerte </li>
               
             
               
               
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
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  incidencias profesores</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="alumnos.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> alumnos</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="profesores.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>profesores</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> noticias</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="alumnos1.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> inscripciones</h4>
            </a>
        </div>
      
    </div>
            </div>
    
            <div class="body">
           
            <div class="filt">
            <h2>consultas de alumnos elige una opcion    <a href="agregar_asignatura.php">Agregar asignatura</a></h2>
                <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form_grupo" method="GET">
                 
                    <label class="form_label" for="grupo">asignatura</label> 
                
                    <?php 
                    include('conexion.php');
                    $sql="select asig.asignatura,prof.nombre,prof.apellidoP,prof.apellidoM from asignatura  asig inner join profesor prof on asig.id_profesor=prof.id_profesor;";
             
                    $query=$base->prepare($sql);
                     $query->execute();
                     $results=$query->fetchAll(PDO::FETCH_ASSOC);
                     ?>
                     <select name="asignatura" id="asignatura">
                     <option value="elige unan opcion">elige una opcion</option>
                   <?php  foreach ($results as $res ){?>
                    
                        <option value="<?php echo $res['asignatura'];?>">
                        <?php echo $res['asignatura']." ".$res['nombre']." ".$res['apellidoP']." ".$res['apellidoM'];?></option>
                       <?php }
?>
      </select>
<button class="boton"  name="btn_asignatura" id="grupo">buscar</button>
                 </form>
            
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="form_grupo" method="GET">
                 
                    <label class="form_label" for="nivel">matricula del alumno</label> 
                  <input type="text" name="matricula">
                        <button class="boton"  name="btn_matricula" id="btn_matricula">buscar</button>
            </form>
            <div class="tab">
            <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Materno</th>
                <th>Asignatura</th>
                <th>Estatus</th>
                <th>Editar</th>
            </tr>
            <?php
                
                 $sql_var="";
                
                 if(isset($_GET['btn_asignatura'])){
                   $asignatura=$_GET['asignatura'];
                   
                   echo "<p>{$asignatura}</p>";
                
                   $sql_grupo="select al.nombre,al.apellidoP,al.apellidoM,asig.asignatura,estatus from inscripcion_asignatura
                    insc inner join alumno al on al.id=insc.id_alumno inner join asignatura asig on
                     asig.id_asignatura=insc.id_asignatura where asig.asignatura='{$asignatura}';";
                   try{
                    $consult=$base->prepare($sql_grupo);
                    $consult->execute(array());
                    $usuarios=$consult->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($usuarios as $user) {
                        ?>
                           <tr>
                            
                            <td><?php   echo $user['nombre'] ?></td>
                            <td><?php   echo $user['apellidoP'] ?></td>
                            <td><?php   echo $user['apellidoM'] ?></td>
                            <td><?php   echo $user['asignatura'] ?></td>
                            <td><?php   echo $user['estatus'] ?></td>
                             <td><a class="boton" href="alumnos1.php?txtID1=<?php $user['matricula'];?>" >editar</a></td>
                        </tr>
                        <?php
                    }
                    }catch(Exception $e){
                      $e->getMessage();
                    }
                 
                 }
              
                 if(isset($_GET['btn_matricula'])){
                    $matricula=$_GET['matricula'];
                    $sql_asignatura=" select al.nombre,al.apellidoP,al.apellidoM,asig.asignatura,estatus from inscripcion_asignatura insc
                    inner join alumno al on al.id=insc.id_alumno inner join asignatura asig on asig.id_asignatura=insc.id_asignatura 
                    where al.matricula={$matricula};";
                    echo "<p>{$matricula}</p>";
                 
                
                 
                    try{
                        $consult=$base->prepare($sql_asignatura);
                        $consult->execute(array());
                        $usuarios=$consult->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($usuarios as $user) {
                            ?>
                            <tr>
                            
                                <td><?php   echo $user['nombre'] ?></td>
                                <td><?php   echo $user['apellidoP'] ?></td>
                                <td><?php   echo $user['apellidoM'] ?></td>
                                <td><?php   echo $user['asignatura'] ?></td>
                                <td><?php   echo $user['estatus'] ?></td>
                                 <td><a class="boton" href="alumnos1.php?txtID1=<?php $user['matricula'];?>" >editar</a></td>
                            </tr>
                            <?php
                        }
                        }catch(Exception $e){
                          $e->getMessage();
                        }
                 }
                 
                 ?>


        </table>
            </div>
             </div>
        
        </div>
       
      
    
    
          
        </body>
</html>