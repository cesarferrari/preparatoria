<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumno</title>
        <link rel="stylesheet" href="styles/alumno_estilo.css">
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
            <a href="colegiatura.php">
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
            <div class="grupo_form">
                <div class="selects">
                <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form_grupo" method="GET">
                <label class="form_label" for="grupo">nivel educativo</label> 
                    <select name="nivel_1" id="nivel_1">
                    <option value="selecciona">selecciona un nivel</option>
                    <option value="preescolar">preescolar</option>
                    <option value="primaria">primaria</option>
                    <option value="secundaria">secundaria</option>
                    <option value="preparatoria">preparatoria</option>
                    </select>
                    <label class="form_label" for="grupo">grupo</label> 
                <select name="grupo" id="grupo">
                <option value="selecciona">selecciona un grupo</option>
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
                <button class="btn_sel"  name="btn_grupo" id="grupo">buscar</button>
                 </form>
                </div>
              
                <form class="nuevos" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="form_grupo">
                    <label class="form_label" for="nivel">nuevos usuarios</label> 
                    <button class="btn_sel" name="btn_user" id="btn_user">buscar</button>
            </form>
                
               </div>
            
                
                <table class="tabla" id="data-table">
                    <tr>
                        <th>matricula</th>
                        <th colspan="2">nombre</th>
                       
                        <th>email</th>
                        <th>turno</th>
                        <th>usuario</th>
                        <th>nivel </th>
                        <th>grupo</th>
                        <th>Editar</th>
                        
                    </tr>
                 <?php
                 
              require_once("conexion.php");
                $bandera=false;
                 if(isset($_GET['btn_grupo'])){
                   $nivel1=$_GET['nivel_1'];
                   $grupo=$_GET['grupo'];
                   echo "<p>{$nivel1}{$grupo}</p>";
                
                   $sql_grupo="select* from alumno where nivel_educativo='{$nivel1}' and grupo='{$grupo}'";
                  
                   try{
                    $consult=$base->prepare($sql_grupo);
                    $consult->execute(array());
                    $usuarios=$consult->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($usuarios as $user) {
                        ?>
                        <tr>
                        <td data-titulo="matricula"><?php   echo $user['matricula'] ?></td>
                            <td data-titulo="nombre" colspan="2"><?php   echo $user['nombre'] ?></td>
                     
                            <td data-titulo="email"><?php   echo $user['email'] ?></td>
                            <td data-titulo="turno"><?php   echo $user['turno'] ?></td>
                            
                            <td data-titulo="tipo usuario"><?php   echo $user['tipo_usuario'] ?></td>
                            <td data-titulo="nivel educativo"><?php   echo $user['nivel_educativo'] ?></td>
                            <td data-titulo="grupo"><?php   echo $user['grupo'] ?></td>
     <td><button class="boton"><a  href="free.php?txtID=<?php echo $user['matricula']?>" >editar</a></button>
     <button class="boton"><a  href="" >Imprimir</a></button> </td>
                        </tr>
                        <?php
                        $bandera=true;
                    }
                    }catch(Exception $e){
                      $e->getMessage();
                    }
                 
                 }

                 if(isset($_GET['btn_asignatura'])){
                    $nivel2=$_GET['nivel_2'];
                    $asignatura=$_GET['asignatura'];
                    echo "<p>{$nivel2}  {$asignatura}</p>";
                 }
                 if(isset($_GET['btn_user'])){
                    echo "<p>nuevo usuario</p>";
                    $sql_usuarios="select* from alumno ;";
                    try{
                        $consult=$base->prepare($sql_usuarios);
                        $consult->execute(array());
                        $usuarios=$consult->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($usuarios as $user) {
                            ?>
                            <tr>
                            <td data-titulo="matricula"><?php   echo $user['matricula'] ?></td>
                                <td data-titulo="nombre" colspan="2"><?php   echo $user['nombre'] ?></td>
                           
                                <td data-titulo="email"><?php   echo $user['email'] ?></td>
                                <td data-titulo="turno"><?php   echo $user['turno'] ?></td>
                                
                                <td data-titulo="tipo usuario"><?php   echo $user['tipo_usuario'] ?></td>
                                <td data-titulo="nivel educativo"><?php   echo $user['nivel_educativo'] ?></td>
                                <td data-titulo="grupo"><?php   echo $user['grupo'] ?></td>
                                 
                                <td><button class="boton"><a  href="free.php?txtID=<?php echo $user['matricula']?>" >editar</a></button>
                                <button class="boton"><a  href="" >Imprimir</a></button>
    </td>
                            </tr>
                            <?php
                            $bandera=true;
                        }
                        }catch(Exception $e){
                          $e->getMessage();
                        }
                 }
                 
                 ?>
                </table>
                <?php
        if($bandera==true){
     echo" <a class='center' href='pdf_colegiatura.php'>  <button class='boton'> IMPRIMIR PDF</button></a>";
                       }
                       ?>
            </div>
           <?php
           
           if(isset($_GET['txtID1'])){
            $id=$_GET['txtID1'];

echo(  $id );
           }
           
           ?>
           </div>
    
        </div>
    </div>
    
</html>