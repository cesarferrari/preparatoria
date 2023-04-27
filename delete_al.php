
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
           if(isset($_POST['id'])){
            $id=$_POST['id'];

            $sql="delete from inscripcion where id_insc=:id_insc";
$TSM=$base->prepare($sql);
$TSM->bindParam(":id_insc",$id);
if($TSM->execute()){
header("location:consultar_inscripcion_admin.php");
}else{
  echo "error al eliminar registro";
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
       if(isset($_POST['id'])){
        $id=$_POST['id_insc'];


       }
      
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
      <h2>Ingrese el registro que desea eliminar</h2>
      
      <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])   ?>" method="post">
      <label for="id">id asignatura</label>
        <input type="text" id="id" name="id"  placeholder="ingrese id asignatura "> <br><br>
          <input type="submit" name="submit" >

      </form>
    
    
</body>
</html>