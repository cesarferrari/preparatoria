
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://kit.fontawesome.com/6a4751c08d.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="estilos.css">


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

   
    <div class="contour">
            <form  action="acceso.php" method="POST">
                <h2>Registrarse</h2>
               
                <?php
                if(isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php } ?>
                
                <input type="text" id="matricula" name="matricula" placeholder="ingrese su matricula"> 
                <label class="form_label" for="matricula">matricula</label><br><br>
                 
                <input type="text" id="user" name="user" placeholder="ingrese su nombre(s)">
                <label class="form_label" for="user">nombre</label> <br><br>
               
                <input type="text" id="apellido" name="apellido" placeholder="ingrese su apellido paterno"> 
                 <label class="form_label" for="apellido">apellido</label><br><br>
                
                <input type="text" id="apellido1" name="apellido1" placeholder="ingrese su apellido materno">
                <label class="form_label" for="apellido1">A materno</label> <br><br>
                
                <input type="text" id="turno" name="turno" placeholder="ingrese su turno">
                <label class="form_label" for="turno">turno</label> <br><br>
                
                <input type="text" id="tipo" name="tipo" placeholder="ingrese su tipo de usuario">
                <label class="form_label" for="tipo">tipo de usuario</label> <br><br>
              
                <input type="password" id="pass" name="pass" placeholder="ingrese su contraseña">
                <label class="form_label" for="password">password</label> <br><br>
                
                <input type="password" id="pass1" name="pass1" placeholder="confirmar contraseña">
                <label class="form_label" for="password">password</label> <br><br>
                <input type="submit"><br><br>
                
      </form>
      <a href="registrarse.php">
          
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