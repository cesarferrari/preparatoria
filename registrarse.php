

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
        <script src="https://kit.fontawesome.com/6a4751c08d.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="esty.css">


</head>
<body>
    <header>
    <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
    
    </label>
    <a href="" class="enlace">
        <img src="imagen/demo.jpg" alt="" class="logo">
    </a>
    <ul>
    <li><a href="index.html">inicio</a></li>
    <li><a href="registrarse.php">registrarse</a></li>
    <li><a href="login.php">login</a></li>
    </ul>
        </nav>
    </header>
    <h2>Registrarse</h2>
   
<?php
include('conexion.php');
       if(isset($_POST['btn_envia'])){
        $matricula=$_POST['matricula'];
              $user=$_POST['user'];
        $apellidoP=$_POST['apellido'];
        $apellidoM=$_POST['apellido1'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $pass1=$_POST['pass1'];
        if(empty($user)||empty($apellidoP)||empty($apellidoM)||
        empty($pass)||empty($pass1)||empty($matricula)){
           echo "<p> llene todos los campos </p>";
           
           
           
        }else if (strcmp($pass, $pass1) !== 0){

        
         $redirect='<script>  window.location.href=registrarse.php?error=contraseña no coincide</script>';
         echo "<p>contraseña no coincide</p>";
              
          }else if(!preg_match("/^[a-zA-Z0-9$%&|<>#]{8,20}$/",$pass)){ 
            echo "<p>invalido tu contraseña debe contener minusculas
             mayusculas numeros  y  caracter especial como $%&|<># minimo 8</p>";
            
           
              }else{
               try{
                
                $query[0]="select * from alumno where matricula={$matricula}";
                $query[1]="select * from profesor where matricula={$matricula}";
                $query[2]="select * from servicios_escolares where matricula={$matricula}";
                for ($i=0; $i <3 ; $i++) { 
                  $consult=$base->prepare($query[$i]);
                  $consult->execute(array());
                //  $matr=$consulta->fetchAll(PDO::FETCH_ASSOC);     
                  
                              
        }
 
     
  if($consult){
    echo "<p>la matricula ya existe en la bd</p>";
    
  }else{
    $sql="insert into alumno (nombre,apellidoP,apellidoM,email,password,matricula)
    values(:nombre,:apellidoP,:apellidoM,:email,:password,:matricula)";
   $consulta= $base->prepare($sql);
    $consulta->bindParam(':nombre',$user);
    $consulta->bindParam(':apellidoP',$apellidoP);
    $consulta->bindParam(':apellidoM',$apellidoM);
   
   $consulta->bindParam(':email',$email);
    $consulta->bindParam(':password',$pass);
    $consulta->bindParam(':matricula',$matricula);

    if($consulta->execute()){
echo "bienvenido ".$user." ".$apellidoP;
    }else{
      echo "error al guardar datos ";
    }
    
    
  }
     
}catch(Exception $e){
echo $e->getMessage();
}
}
              }
         
        ?>
    <div class="contour">
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
           
           
          
          
            <div class="inputa">
                
            <label class="form_label" for="matricula">Matricula</label>
            <input type="text" id="matricula" name="matricula" placeholder="Matricula" > 
            </div>
            
         <div class="inputa">
            <label class="form_label" for="user">Nombre</label>  
            <input type="text" id="user" name="user" placeholder="Nombre"> 
         </div>
          
          <div class="inputa">
            <label class="form_label" for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido paterno"> 
          </div>
                
           <div class="inputa">
            <label class="form_label" for="apellido1">Apellido</label> 
            <input type="text" id="apellido1" name="apellido1" placeholder="Apellido materno">
           </div>
           
          <div class="inputa">
            <label class="form_label" for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email">
          </div>

            <div class="inputa">
                <label class="form_label" for="password">Password</label>
                <input type="password" id="pass" name="pass" placeholder="Password">
            </div>

           <div class="inputa">
            <label class="form_label" for="password">Password</label>
            <input type="password" id="pass1" name="pass1" placeholder="Confirmar password">
           </div>

         <button  class="btn_form" type="submit" name="btn_envia">guardar</button>
            </form>
         </div>
   

     
      <footer class="pie-pagina">
    <div class="grupo-1">
    <div class="box">
    <figure>
        <a href="#">
            <img src="imagen/edu.jpg" alt="logo">
        </a>
    </figure>
    </div>
    <div class="box">
        <h2>SOBRE NOSOTROS</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, voluptas!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, dolores.</p>
    </div>
    <div class="box">
        <h2>SIGUENOS</h2>
        <div class="red-social">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-youtube"></a>
        </div>
    </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2023 <b>Educacion Especial</b> - Todos los Derechos Reservados-</small>
    </div>
        </footer>
    
</body>

</html>