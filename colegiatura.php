<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/colegiatura.css">
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
            <i class="fa-duotone fa-building-columns"></i>
                <h4>  incidencias </h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="colegiatura.php">
            <i class="fa-regular fa-sack-dollar"></i>
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
           
            <i class="fa-regular fa-circle-plus"></i>
                <h4> inscripciones</h4>
            </a>
        </div>
      
    </div>
            </div>
     <div class="body">
           <div class="filt">
                <div class="encabezado">
                <h2>consultas de Colegiaturas </h2>
                 <h2><a href="inserta_colegiatura.php">  <i class="fa-regular fa-sack-dollar"></i></i></a></h2>
                </div>
            <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form_grupo" method="GET">
                 <label class="form_label" for="grupo">Fecha Inicio</label> 
                 <input type="date" name="fechaI">
                 <label class="form_label" for="grupo">Fecha Fin</label> 
                 <input type="date" name="fechaF"> <br>
                
                <label class="form_label" for="nivel">matricula  alumno</label> 
                  <input type="text" name="matricula">
                        <button class="boton"  name="btn_matricula" id="btn_matricula">buscar</button>
            </form>
            <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form_grupo" method="GET">
                <label class="form_label" for="grupo">Fecha Inicio</label> 
                <input type="date" name="fechaIA">
                <label class="form_label" for="grupo">Fecha Fin</label> 
                <input type="date" name="fechaFA"> <br>
               <button class="boton"  name="btn_fecha" id="btn_fecha">buscar</button>
           </form>
            <table>
            <tr>
                <th colspan="2">Nombre</th>
                <th>Monto</th>
                <th>Motivo</th>
                <th>Fecha</th>
                <th>Editar</th>
            </tr>
            <div class="tab">
                             <?php
                             $imprimir=false;
                             require_once("conexion.php");
                             if(isset($_GET["btn_matricula"])){
                                $matricula=$_GET["matricula"];
                               $fechaI=$_GET["fechaI"];
                               $fechaF=$_GET["fechaF"];
                               $sql_matr="select a.nombre,a.apellidoM,a.apellidoP,motivo,monto,fecha,id_colegiatura from colegiatura inner 
                               join alumno a on a.id=colegiatura.id_alumno where fecha between '{$fechaI}' and '{$fechaF}'
                               and matricula='{$matricula}';";
                               try{
                                $consulta=$base->prepare($sql_matr);
                                $consulta->execute(array());
                                $usuario=$consulta->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($usuario as $user) {
                                ?>
                              <tr>
                                <td colspan="2"><?php  echo $user['nombre']."   ".$user['apellidoP']."   ".$user['apellidoM']  ?></td>
                                 <td><?php echo $user['motivo'] ?></td>
                                  <td><?php  echo $user['monto']  ?></td>
                                  <td><?php   echo $user['fecha'] ?></td>
                                  <td><button class="boton"><a  href="free_colegiatura.php?txtID=<?php echo $user['id_colegiatura']?>" >Editar</a></button>
                              </tr>
                              <?php
                              $imprimir=true;
                                }
                                }catch(Exception $e){
                                   $e->getMessage();
                               }
                         }else{
                            $imprimir=false;
                         }
                          if(isset($_GET['btn_fecha'])){
                          
                            $fechaI=$_GET["fechaIA"];
                            $fechaF=$_GET["fechaFA"];
                            $sql_matr="select a.matricula,a.nombre,a.apellidoM,a.apellidoP,motivo,monto,fecha,id_colegiatura from colegiatura inner 
                            join alumno a on a.id=colegiatura.id_alumno where fecha between '{$fechaI}' and '{$fechaF}';";
                            try{
                             $consulta=$base->prepare($sql_matr);
                             $consulta->execute(array());
                             $usuario=$consulta->fetchAll(PDO::FETCH_ASSOC);
                          
                             foreach ($usuario as $user) {
                               $imprimir=true;
                             ?>
                           <tr>
                             <td colspan="2"><?php  echo $user['nombre']."  ".$user['apellidoP']."  ".$user['apellidoM']  ?></td>
                              <td><?php echo $user['motivo'] ?></td>
                               <td><?php  echo $user['monto']  ?></td>
                               <td><?php   echo $user['fecha'] ?></td>
                               <td><button class="boton"><a  href="free_colegiatura.php?txtID=<?php echo $user['id_colegiatura']?>" >Editar</a></button>
                           </tr>
                      
                           <?php
                          
                             }
                             }catch(Exception $e){
                                $e->getMessage();
                            }
                         }else{
                            
                         }
                             
                             ?>   
                       </table><?php
                       if($imprimir==true){
                       echo" <a class='center' href='pdf_colegiatura.php'>  <button class='boton'> IMPRIMIR PDF</button></a>";
                       }
                       ?>
                       
                             
            </div>
             </div>
        
        </div>
       
      
    
    
          
        </body>
</html>