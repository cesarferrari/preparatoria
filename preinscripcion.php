
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"> 

</head>
<body>
<?php  session_start() ;
//echo $_SESSION['code'];
?>

    <header>
        <div class="menu">
            <nav>
        <ul>
            <li><a href="index.html">inicio</a></li>
            <li><a href="registrarse.php">registrarse</a></li>
            <li><a href="login.php">inicio de sesion</a></li>
                </ul>
            </nav>
            </div>
    </header>
    <div class="llave"> 
    </div>
    
    <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])   ?>" method="post">
                <h2>Preregistro de asignatura</h2>
                <?php
               
                if(isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php } ?>
                <label for="asignatura">asignatura</label>
                <input type="text" id="asigantura" name="asignatura" placeholder="ingrese  la asignatura"> <br><br>
                  <label for="grupo">grupo</label>
                <input type="text" id="grupo" name="grupo" placeholder="ingrese el grupo"> <br><br>
                <label for="profesor">profesor</label>
                <input type="text" id="profesor" name="profesor" placeholder="ingrese el profesor que la imparte"> <br><br>
                <label for="turno">turno</label>
                <input type="text" id="turno" name="turno" placeholder="ingrese el turno"> <br><br>
                <label for="semestre">semestre</label>
                <input type="text" id="semestre" name="semestre" placeholder="ingrese su semestre"> <br><br>
              
                <input type="submit"><br><br>
                
      </form>
      <a href="registrarse.php">
           </div>
           <?php
include('conexion.php');
 
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
</body>

</html>




