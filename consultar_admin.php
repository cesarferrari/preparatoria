<?php
      if(isset($_POST['submit'])){
        $matricula=$_POST['matricula'];

       include("conexion.php");
      session_start();
      $_SESSION['matr']=$matricula;
    //without usefull     
if(!empty($matricula)){
      
        try{
          $consulta=$base->prepare("select asignatura,grupo,semestre,usuario.turno,estatus,profesor,usuario.nombre,
          usuario.apellidoP,usuario.apellidoM from inscripcion inner join usuario on usuario.id=
          inscripcion.usuario where usuario.matricula=".$matricula);
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
           if(isset($usuarios)){
  foreach($usuarios as $user){
     ?>
     <tr>
           <td><?php echo $user['asignatura']?></td>
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
}
?>