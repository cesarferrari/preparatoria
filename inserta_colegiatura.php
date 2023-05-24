<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles/ins_colegiatura.css">
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
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> noticias</h4>
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
                    <a class="encabezado" href="colegiatura.php">
                        <i class="fa-sharp fa-regular fa-calendar-days"></i>
                        <h3>Colegiatura</h3>
                    </a> 
                   
                    <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <div class="inputa">
                             <label class="form_label" for="motivo">Motivo</label>
                        <input type="text" id="matricula" name="motivo" placeholder="Ingrese el motivo" > 
                        </div>
                        <div class="inputa">
                        <label class="form_label" for="user">Monto</label>  
                        <input type="number" id="cantidad" name="monto" placeholder="Ingrese la cantidad"> 
                     </div>
                   <div class="inputa">
                        <label class="form_label" for="user">Matricula</label>  
                        <input type="text" id="user" name="user" placeholder="matricula de alumno"> 
                     </div>
                  <button  class="btn_form" type="submit" name="btn_envia">guardar</button>
                        </form>
                     </div>
                      <?php
                      require_once("conexion.php");
                      $matr=0;
                      if(isset($_POST['btn_envia'])){
                        $motivo=$_POST['motivo'];
                        $monto=$_POST['monto'];
                         $matricula=$_POST['user'];
                        if(empty($motivo)||empty($monto)||empty($matricula)){?>
                         <script>alert("debe llenar todos los campos")</script>
                        <?php
                           
                        }else if($monto<=0){?>
                            <script>alert("indique una cantidad valida")</script>
                           <?php
                              
                           }else{
                            $query=$base->prepare("select * from alumno where matricula='{$matricula}'");
                            $query->execute(array());
                            $usuario=$query->fetchAll(PDO::FETCH_ASSOC);
                          foreach ($usuario as $user) {
                            $matr=$user['id'];
                          }
                           if($matr==0){
                            ?>
                            <script>alert("la matricula no existe para ningun alumno actual")</script>
                           <?php
                           }else{
                          $insert=$base->prepare("insert into colegiatura(monto,motivo,fecha,id_alumno)values(:monto,:motivo,now(),:id_alumno)");
                           $insert->bindParam(':monto',$monto);
                           $insert->bindParam(':motivo',$motivo);
                           $insert->bindParam(':id_alumno',$matr);
                              if( $insert->execute()){
                                ?>
                                <script>alert("los datos se ingresaron correctamente")</script>
                               <?php
                              }else{
                                ?>
                                <script>alert("error al ingresar datos")</script>
                               <?php
                              }
                           }
                        }
                      }
                      ?>
            </div>
         
             </div>
        
        </div>
       
        
    
    
          
        </body>
</html>