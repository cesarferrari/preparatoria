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
        
            <div class="formulario">
            <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <div class="inputa">
            <h2>   <a href="profesor.php">Consultar Profesor</a></h2>
            </div>
           
            <div class="form_grupo">
           <label class="form_label" for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="ingrese nombre" > 
                </div>
                <div class="form_grupo">
           <label class="form_label" for="apellidoP">Apellido Paterno</label>
                <input type="text" id="apellidoP" name="apellidoP" placeholder="ingrese apellido" > 
                </div>
                <div class="form_grupo">
           <label class="form_label" for="apellidoM">Apellido Materno</label>
                <input type="text" id="apellidoM" name="apellidoM" placeholder="ingrese apellido" > 
                </div>
                <div class="form_grupo">
           <label class="form_label" for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="ingrese email" > 
                </div>
                <div class="form_grupo">
           <label class="form_label" for="matricula">Matricula</label>
                <input type="text" id="matricula" name="matricula" placeholder="ingrese matricula" > 
                </div>
             
             
                    <div class="inputa">
                    <button  class="button2" type="submit" name="btn_envia">guardar</button>
                    </div>
                </form>
            </div>

                <?php
                include('conexion.php');
                require('matricula.php');
                if(isset($_POST['btn_envia'])){
                  $nombre=$_POST['nombre'];
                  $apellidoP=$_POST['apellidoP'];
                  $apellidoM=$_POST['apellidoM'];
                  $email=$_POST['email'];
                  $matricula=$_POST['matricula'];
                 
                  if(empty($nombre)||empty($apellidoP)||empty($apellidoM)||empty($email)|empty($matricula)){
                  ?>
                    <script>
    
alert("debe llenar todos los campos");
                    </script>
                  <?php
                  }else {

                    try{
                      
                  $r[0]=select("select * from alumno where matricula='{$matricula}'");
                   $r[1]=select("select * from profesor where matricula='{$matricula}'");
                    $r[2]=select("select * from servicios_escolares where matricula='{$matricula}'");
                    $r[3]=select("select * from alumno where email='{$email}'");
                    $r[4]=select("select * from profesor where email='{$email}'");
                     $r[5]=select("select * from servicios_escolares where email='{$email}'");
                  if( $r[0]>0||$r[1]>0||$r[2]>0){
                      ?>
                      <script>alert("la matricula  ya se encuentran en la BD")</script>
                    <?php
                  }else if($r[3]>0||$r[4]>0||$r[5]>0){?>
                    <script>alert("el email ya se encuentran en la BD")</script>
                    <?php
                  }else{
                    $pass=rand(10000000,9999999);
                      $consult=$base->prepare("insert into profesor(nombre,apellidoP,apellidoM,email,password,matricula)values
                      (:nombre,:apellidoP,:apellidoM,:email,:password,:matricula)");
                      $consult->bindParam(':nombre',$nombre);
                      $consult->bindParam(':apellidoP',$apellidoP);
                     $consult->bindParam(':apellidoM',$apellidoM);
                     $consult->bindParam(':email',$email);
                     $consult->bindParam(':password',$pass);
                     $consult->bindParam(':matricula',$matricula);
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
                
                

                
                }
                ?>
             </div>
             </div>
        
        </div>
       
        
        <script href="javascript/profesor.js"></script>
  
          
        </body>
</html>