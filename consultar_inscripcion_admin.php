
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
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
  
       <h1>Preparatoria Educacion Especial </h1>
       <h2>Learning is fun</h2>
 
   
      <table>
        <tr>
       
        <th>Asignatura</th>
        <th>grupo</th>
        <th>profesor</th>  
        <th>turno</th>  
        <th>semestre</th>
        <th>estatus</th>
        <th></th>
        <th></th>
        </tr>
        <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])   ?>" method="post">
          matricula del alumno
        <input type="text" id="matricula" name="matricula">
          <input type="submit" name="submit">

        </form>
     
 
  <?php
      if(isset($_POST['submit'])){
        $matricula=$_POST['matricula'];

       include("conexion.php");
      session_start();
      $_SESSION['matr']=$matricula;
      if(!empty($matricula)){
try{
   $consulta=$base->prepare("select asignatura,grupo,semestre,usuario.turno,estatus,profesor,usuario.nombre,
   usuario.apellidoP,usuario.apellidoM from inscripcion inner join usuario on usuario.matricula=
   inscripcion.matricula where usuario.matricula=".$matricula);
$consulta->execute(array());
   $usuarios=$consulta->fetchAll(PDO::FETCH_ASSOC);
   foreach($usuarios as $user){
     $nombre=$user['nombre'];
     $apellido=$user['apellidoP'];
     $apellidoM=$user['apellidoM'];
   }
     }catch(Exception $err){
echo $err->getMessage();
     }
    }else{
        echo "ingrese el campo matricula";
    }
       ?>
           <?php 
           
  foreach($usuarios as $user){
     ?>
     <tr>
           <td><?php 
         
         
                echo $user['asignatura']?></td>
<td><?php echo $user["grupo"]?></td>
<td><?php echo  $user["profesor"]?></td>
<td><?php echo  $user["turno"]?></td>
<td><?php echo  $user["semestre"]?></td>
<td><?php echo  $user["estatus"]?></td>
<td> <button><a href="update_al.php">update</a></button></td>
<td> <button><a href="delete_al.php">delete</a></button></td>
  </tr>
    <?php
  }
}


?>


     </table>
     <h1 class="center"><?php
     if(isset($nombre)&&isset($apellido)&&isset($apellidoM)){
     echo $nombre." ".$apellido." ".$apellidoM

     ?></h1>
  <?php
  }
  ?>
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