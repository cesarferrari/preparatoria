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
    <h3 class="name">eleonora understantable</h3>
        <div class="logotipo">
            <a href="acceso_SE.php">
            <i class="fa-solid fa-house"></i>
                <h4> principal</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  incidencias alumnos</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  incidencias alumnos</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> incidencias alumnos</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">

                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> incidencias alumnos</h4>
            </a>
        </div>
      
    </div>
            </div>
    
            <div class="body">
           <div class="left">
           
            <div class="filt">
                <h2>consultas de alumnos elige una opcion</h2>
                <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form_grupo" method="GET">
                    <label class="form_label" for="nivel">nivel educativo</label> 
                    <select name="nivel_1" id="nivel_1">
                    <option value="selecciona">selecciona grado academico</option>
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
                <button class="boton"  name="btn_grupo" id="grupo">buscar</button>
                 </form>
              
              
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="form_grupo">
                    <label class="form_label" for="nivel">nuevos usuarios</label> 
                    <button class="boton" name="btn_user" id="btn_user">buscar</button>
            </form>
                
               
            
                
                <table class="tabla" id="data-table">
                    <tr>
                        <th>matricula</th>
                        <th>nombre</th>
                        <th>paterno</th>
                        <th> materno</th>
                        <th>email</th>
                        <th>turno</th>
                        <th>usuario</th>
                        <th>nivel </th>
                        <th>grupo</th>
                        <th>Editar</th>
                        
                    </tr>
                 <?php
                 
                 $sql_usuarios="select* from alumno where grupo='' or nivel_educativo='' or tipo_usuario='' or turno='' or tipo_usuario is null or grupo is null or nivel_educativo is null or turno is null";
                
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
                        <td><?php   echo $user['matricula'] ?></td>
                            <td><?php   echo $user['nombre'] ?></td>
                            <td><?php   echo $user['apellidoP'] ?></td>
                            <td><?php   echo $user['apellidoM'] ?></td>
                            <td><?php   echo $user['email'] ?></td>
                            <td><?php   echo $user['turno'] ?></td>
                            
                            <td><?php   echo $user['tipo_usuario'] ?></td>
                            <td><?php   echo $user['nivel_educativo'] ?></td>
                            <td><?php   echo $user['grupo'] ?></td>
     <td><a class="boton" href="alumnos1.php?txtID=<?php $user['matricula']?>" >editar</a></td>
                        </tr>
                        <?php
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
                    try{
                        $consult=$base->prepare($sql_usuarios);
                        $consult->execute(array());
                        $usuarios=$consult->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($usuarios as $user) {
                            ?>
                            <tr>
                            <td><?php   echo $user['matricula'] ?></td>
                                <td><?php   echo $user['nombre'] ?></td>
                                <td><?php   echo $user['apellidoP'] ?></td>
                                <td><?php   echo $user['apellidoM'] ?></td>
                                <td><?php   echo $user['email'] ?></td>
                                <td><?php   echo $user['turno'] ?></td>
                                
                                <td><?php   echo $user['tipo_usuario'] ?></td>
                                <td><?php   echo $user['nivel_educativo'] ?></td>
                                <td><?php   echo $user['grupo'] ?></td>
                                 
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
           <div class="right">
            <?php
            if(isset($_GET['txtID'])){
               $ID=$_GET['txtID'];
               echo "<p>$ID</p>";
            }
            
            ?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" id="data-form">
        <h4>registro alumno</h4>
       <div class="form_group">
        
        <input type="text" id="matr" name="matricula" placeholder="matricula">
       </div>
        <div class="form_group">
            
        <input type="text" id="matr" name="name" placeholder="nombre">
        </div>
       <div class="form_group">
        
        <input type="text" id="matr" name="last_name1" placeholder="apellido paterno">
       </div>
        <div class="form_group">
            
        <input type="text" id="l_name1" name="last_name2" placeholder="apellido materno">
        </div>
        <div class="form_group">
           
        <input type="text" id="email" name="email" placeholder="email">
        </div>
    <div class="form_group">
        <label class="form_label" for="turno">turno</label> 
        <select name="turno" id="turno">
  <option value="matutino">matutino</option>
  <option value="vespertino">vespertino</option>
   </select>
    </div>
 <div class="form_group">
    <label class="form_label" for="tipo">tipo usuario</label> 
 <select name="tipo" id="tipo">
<option value="estudiante">estudiante</option>
<option value="tutor">padres o tutor</option>
</select>
 </div>
<div class="form_group">
    <label class="form_label" for="nivel">nivel educativo</label> 
<select name="nivel" id="nivel">
<option value="preescolar">preescolar</option>
<option value="primaria">primaria</option>
<option value="secundaria">secundaria</option>
<option value="preparatoria">preparatoria</option>
</select>
</div>
<div class="form_group">
    <label class="form_label" for="grupo">grupo</label> 
<select name="grupo" id="grupo">
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
<input type="submit" id="btn" name="btn" class="button">

      </form>
           </div>
        </div>
    </div>
    
</html>