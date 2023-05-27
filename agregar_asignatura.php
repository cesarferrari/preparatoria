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
            <a href="profesor.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>profesores</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="colegiatura.php">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>Colegiatura</h4>
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
            <h2>   <a href="inscripcion.php">Consultar asignatura</a></h2>
            </div>
            <div class="form_grupo">
           
                <label class="form_label" for="matricula">Asignatura</label>
                <input type="text" id="asigntura" name="asignatura" placeholder="ingrese asignatura" > 
                </div>
                
             <div class="form_grupo">
             <label class="form_label" for="grupo">Profesor</label> 
             <?php 
                    include('conexion.php');
                    $sql="select  id_profesor,nombre,apellidoP,apellidoM from profesor;";
              $query=$base->prepare($sql);
                     $query->execute();
                     $results=$query->fetchAll(PDO::FETCH_ASSOC);
                     ?>
                     <select name="profesor" id="profesor">
                     <option value="Elige una opcion">elige una opcion</option>
                   <?php  foreach ($results as $res ){?>
                    
             <option value="<?php echo $res['id_profesor'];?>">
        <?php echo $res['nombre']." ".$res['apellidoP']." ".$res['apellidoM'];?></option>
                       <?php }
?>
                 
      </select>
      <label class="form_label" for="nivel">Nivel Academico</label> 
      <select name="nivel_academico" id="nivel_academico">
<option value="Elige una opcion">Elige una Opcion</option>
<option value="Preescolar">Preescolar</option>
<option value="Primaria">Primaria</option>
<option value="Secundaria">Secundaria</option>
<option value="Preparatoria">Preparatoria</option>

      </select>
             </div>
                    <div class="inputa">
                    <button  class="button2" type="submit" name="btn_envia">guardar</button>
                    </div>
                </form>
            </div>

                <?php
                include('conexion.php');
                if(isset($_POST['btn_envia'])){
                  $asignatura=$_POST['asignatura'];
                  $profesor=$_POST['profesor'];
                  $nivel=$_POST['nivel_academico'];
                 
                  if(empty($asignatura)){
                  ?>
                    <script>alert("ingrese una asignatura")</script>
                  <?php
                  }else if(strcmp($profesor,"Elige una opcion")===0){
                    ?>
                    <script>alert("Elige un Profesor")</script>
                  <?php
                  }else if(strcmp($nivel,"Elige una opcion")===0){
                    ?>
                    <script>alert("Elige un Nivel Academico")</script>
                  <?php
                  }else
                
                  try{
                    $sql_asig="select * from asignatura where asignatura='{$asignatura}' and id_profesor={$profesor};";
                 $select=$base->prepare($sql_asig);
                 $select->execute(array());
                     $usuarios=$select->fetch(PDO::FETCH_ASSOC);
                  


                if($usuarios>0){
                    ?>
                    <script>alert("la asignatura y profesor ya se encuentran en la BD")</script>
                  <?php
                }else{
                    $consult=$base->prepare("insert into asignatura(id_profesor,asignatura,nivel_educativo)values(:id_profesor,:asignatura,:nivel_educativo)");
                    $consult->bindParam(':id_profesor',$profesor);
                    $consult->bindParam(':asignatura',$asignatura);
                   $consult->bindParam(':nivel_educativo',$nivel);

                  if($consult->execute()){
                    ?>
                    <script>alert("datos ingresados correctamente")</script>
                  <?php
                  }else{
                    ?>
                    <script>alert("error al ingresar datos ")</script>
                  <?php
                  }
                }



                  }catch(Exception $e){
                    $e->getMessage();
                  }
                
                }
                ?>
             </div>
             </div>
        
        </div>
       
        
    
    
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </body>
</html>