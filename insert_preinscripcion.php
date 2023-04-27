<?php
include('conexion.php');
  session_start();
  $_SESSION['code'];
  $estatus="preinscrita";
       if(isset($_POST['asignatura'])&&isset($_POST['grupo'])&&isset($_POST['profesor'])&&isset
       ($_POST['turno'])&&isset($_POST['semestre'])){
        $asignatura=$_POST['asignatura'];
              $grupo=$_POST['grupo'];
        $profesor=$_POST['profesor'];
        $turno=$_POST['turno'];
        $semestre=$_POST['semestre'];
       
        if(empty($asignatura)||empty($grupo)||empty($profesor)||empty($turno)||empty($semestre)
        ){
           header("location:preinscripcion.php?error=llene todos los campos");
           exit();
           
       
           
    
  }else{
    try{
      
      $consultar=$base->prepare("select * from usuario where matricula=".$_SESSION['code']);
   $consultar->execute(array());
      $usuarios=$consultar->fetchAll(PDO::FETCH_ASSOC);
      foreach($usuarios as $user){
        $id=$user['id'];
      echo $id;
      }
        }catch(Exception $err){
   echo $err->getMessage();
        }

    try{
    $sql="insert into preinscripcion (asignatura,grupo,profesor,turno,semestre,estatus,usuario)
    values(:asignatura,:grupo,:profesor,:turno,:semestre,:estatus,:usuario);";
   $consulta= $base->prepare($sql);
    $consulta->bindParam(':asignatura',$asignatura);
    $consulta->bindParam(':grupo',$grupo);
    $consulta->bindParam(':profesor',$profesor);
    $consulta->bindParam(':turno',$turno);
    $consulta->bindParam(':semestre',$semestre); 
    $consulta->bindParam(':estatus',$estatus);
    $consulta->bindParam(':usuario',$id);

    if($consulta->execute()){
echo "datos guardados correctamente ";
    }else{
      echo "error al guardar datos ";
    }
  
  }catch(Exception $e){
}
}
 }
      ?>
