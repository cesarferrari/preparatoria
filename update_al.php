
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylo.css">
 
</head>
<body>
<header>
           
           <div class="menu">
               <nav>
           <ul>
               <li><a href="index.html">inicio</a></li>
               <li><a href="preinscripcion.php">preinscribir Asignatura</a></li>
               <li><a href="direccion.php">consultar inscripcion</a></li>
               <li><a href="#">salir</a></li>
                   </ul>
               </nav>
               </div>
       </header>
      
  
       <h1>Preparatoria Educacion Especial </h1>
       <h2>Learning is fun</h2>

       <?php
      include("conexion.php");
     // session_start();
   
      if(isset($_POST['asignatura'])&&isset($_POST['grupo'])&&isset($_POST['turno'])&&isset($_POST['semestre'])&&
      isset($_POST['estatus'])&&isset($_POST['profesor'])&&isset($_POST['id'])){
$asignatura_=$_POST['asignatura'];
$grupo_=$_POST['grupo'];
$turno_=$_POST['turno'];
$semestre_=$_POST['semestre'];
$estatus_=$_POST['estatus'];
$profesor_=$_POST['profesor'];
$id_=$_POST['id'];
try{
  $sql="update inscripcion set asignatura=:asignatura,grupo=:grupo,profesor=:profesor,turno=:turno,semestre=:semestre
  ,estatus=:estatus where id_insc=:id_insc";
 $consulta= $base->prepare($sql);
  $consulta->bindParam(':asignatura',$asignatura_);
  $consulta->bindParam(':grupo',$grupo_);
  $consulta->bindParam(':profesor',$profesor_);
 $consulta->bindParam(':turno',$turno_);
  $consulta->bindParam(':semestre',$semestre_); 
  $consulta->bindParam(':estatus',$estatus_);
  
  $consulta->bindParam(':id_insc',$id_);
  if($consulta->execute()){
    header("location:consultar_inscripcion_admin.php");
        }else{
          echo "error al guardar datos ";
        }
}catch(Exception $e){
$e->getMessage();
}
}
      ?>
       <table>
        <tr>
        <th>Id Asignatura</th>
        <th>Asignatura</th>
        <th>grupo</th>
        <th>profesor</th>  
        <th>turno</th>  
        <th>semestre</th>
        <th>estatus</th>
        </tr>
         <?php
       
       include("conexion.php");
       session_start();
       $_SESSION['matr'];
    $consulta=$base->prepare("select id_insc,asignatura,grupo,semestre,usuario.turno,estatus,profesor,usuario.nombre,
    usuario.apellidoP,usuario.apellidoM from inscripcion inner join usuario on usuario.matricula=
    inscripcion.matricula where usuario.matricula=".$_SESSION['matr']);
    $consulta->execute(array());
    $usuarios=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
    
    //echo "sesion".$SESSION['code'];
    
    //while($usuarios){
     // print_r($usuarios['asignatura']);
   
     foreach($usuarios as $user){
      $nombre=$user['nombre'];
      $apellido=$user['apellidoP'];
      $apellidoM=$user['apellidoM'];
        ?>
           
          <tr>
          <td><?php echo $user['id_insc']?></td>
              <td><?php echo $user['asignatura']?></td>
              <td><?php echo $user["grupo"]?></td>
              <td><?php echo  $user["profesor"]?></td>
              <td><?php echo  $user["turno"]?></td>
              <td><?php echo  $user["semestre"]?></td>
              <td><?php echo  $user["estatus"]?></td>
          </tr>
          
         
        <?php
     
  }
  ?>
    </table>
    <h1 class="center"><?php
     if(isset($nombre)&&isset($apellido)&&isset($apellidoM)){
     echo $nombre." ".$apellido." ".$apellidoM
    
     ?></h1>
     <?php
    }else{
      ?>
      <h1>Aun no tiene asignaturas registradas</h>
      
  <?php
  }
  ?>
      <h2>Ingrese los datos que desea editar</h2>
     <div class="form" >
        <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])   ?>" method="post">
          
          <label for="asignatura">asignatura</label>
        <input type="text" id="asignatura" name="asignatura"  placeholder="ingrese la asignatura"> <br><br>
        <label for="grupo">grupo</label>
        <input type="number" id="grupo" name="grupo"  placeholder="ingrese el grupo"> <br><br>
        <label for="turno">turno</label>
        <input type="text" id="turno" name="turno"  placeholder="ingrese el turno"> <br><br>
        <label for="semstre">semestre</label>
        <input type="text" id="semestre" name="semestre"  placeholder="ingrese el semestre"> <br><br>
        <label for="estatus">estatus</label>
        <input type="text" id="estatus" name="estatus"  placeholder="ingrese el estatus"> <br><br>
        <label for="profesor">profesor</label>
        <input type="text" id="profesor" name="profesor"  placeholder="ingrese el profesor"> <br><br>
        <label for="id">id asignatura</label>
        <input type="number" id="id" name="id"  placeholder="ingrese id asignatura "> <br><br>
          <input type="submit" name="submit">

        </form>
     </div>

    
</body>
</html>