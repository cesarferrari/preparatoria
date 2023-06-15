<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/style_asignatura.css">
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
            <i class="fa-duotone fa-building-columns"></i>
                <h4>  incidencias </h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="colegiatura.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> Colegiaturas</h4>
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
            <i class="fa-thin fa-screen-users"></i>
            <h4>profesores</h4>
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
           <div class="filt">
                <div class="encabezado">
                <h2>consultas de alumnos elige una opcion   </h2>
                <h3> <a href="agregar_profesor.php">Agregar Profesor</a></h3>
                </div>
            <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form_grupo" method="GET">
                 <label class="form_label" for="grupo">Todos los Profesores</label> 
                 <button class="boton"  name="btn_general" id="grupo">buscar</button>
                 </form>

             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="form_grupo" method="GET">
                 <label class="form_label" for="nivel">matricula del Profesor</label> 
                  <input type="text" name="matricula">
                        <button class="boton"  name="btn_matricula" id="btn_matricula">buscar</button>
            </form>
            <table>
            <tr>
                <th colspan="2">Nombre</th>
                <th>Email</th>
                <th>Matricula</th>
                <th>Asignatura</th>
                <th>nivel</th>
                <th>Editar</th>
            </tr>
            <div class="tab">
          <?php
          require_once("conexion.php");
             $bandera=false;
                 if(isset($_GET['btn_general'])){
              //  $sql_grupo="select* from profesor";
                $sql_grupo="select prof.id_profesor,asig.id_asignatura,asig.asignatura,asig.nivel_educativo,prof.nombre,prof.apellidoP,prof.apellidoM ,prof.email,prof.matricula from asignatura  asig inner join profesor prof on asig.id_profesor=prof.id_profesor;";
                   try{
                    $consult=$base->prepare($sql_grupo);
                    $consult->execute(array());
                    $usuarios=$consult->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($usuarios as $user) {
                        ?>
                           <tr>
                            <td colspan="2"><?php   echo $user['nombre']." ".$user['apellidoP']." ".$user['apellidoM'] ?></td>
                            <td><?php   echo $user['email'] ?></td>
                            <td><?php   echo $user['matricula'] ?></td>
                            <td><?php     echo $user['asignatura']?></td>
                            <td><?php     echo $user['nivel_educativo']?></td>
                            <td><button class="boton"><a  href="free_profesor.php?txtID=<?php echo $user['matricula']?>" >Editar</a></button>
  </td>   
                        </tr>
                        <?php
                        $bandera=true;
                    }
                    }catch(Exception $e){
                      $e->getMessage();
                    }
                 
                 }else{
                  //  $bander=false;
                 }
              
                 if(isset($_GET['btn_matricula'])){
                    $matricula=$_GET['matricula'];
                    //$sql_asignatura=" select nombre,apellidoP,apellidoM,email,matricula from profesor 
                    //where matricula  ={$matricula};";
                    $sql_asignatura="select prof.id_profesor,asig.id_asignatura,asig.asignatura,asig.nivel_educativo,prof.nombre,prof.apellidoP,prof.apellidoM ,prof.email,prof.matricula from asignatura  asig inner join profesor prof 
                    on asig.id_profesor=prof.id_profesor where prof.matricula=$matricula;";
                    echo "<p>{$matricula}</p>";
                 
                
                 
                    try{
                        $consult=$base->prepare($sql_asignatura);
                        $consult->execute(array());
                        $usuarios=$consult->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($usuarios as $user) {
                            ?>
                            <tr>
                            
                            <td colspan="2"><?php   echo $user['nombre']." ".$user['apellidoP']." ".$user['apellidoM'] ?></td>
                                <td><?php   echo $user['email'] ?></td>
                                <td><?php   echo $user['matricula'] ?></td>
                                <td><?php     echo $user['asignatura']?></td>
                                <td><?php     echo $user['nivel_educativo']?></td>
                                <td><button class="boton"><a  href="free_profesor.php?txtID=<?php echo $user['matricula']?>" >Editar</a></button>
                                </td>
                            </tr>
                            <?php
                            $bandera=true;
                        }
                        }catch(Exception $e){
                          $e->getMessage();
                        }
                 }else{
                   // $bandera=false;
                 }
                 
                 ?>


        </table>  <?php
        if($bandera==true){
     echo" <a class='center' href='pdf_profesor.php'>  <button class='boton'> IMPRIMIR PDF</button></a>";
                       }
                       ?>
            </div>
             </div>
        
        </div>
       
      
    
    
          
        </body>
</html>