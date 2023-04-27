<?php
include('conexion.php');
       if(isset($_POST['matricula'])&&isset($_POST['user'])&&isset($_POST['apellido'])&&isset($_POST['apellido1'])&&isset($_POST['turno'])
       &&isset($_POST['tipo'])&&isset($_POST['pass'])&&isset($_POST['pass1'])){
        $matricula=$_POST['matricula'];
              $user=$_POST['user'];
        $apellidoP=$_POST['apellido'];
        $apellidoM=$_POST['apellido1'];
        $turno=$_POST['turno'];
        $tipo="AL";
        $pass=$_POST['pass'];
        $pass1=$_POST['pass1'];
        if(empty($user)||empty($apellidoP)||empty($apellidoM)||empty($turno)||empty($tipo)||
        empty($pass)||empty($pass1)||empty($matricula)){
           header("location:registrarse.php?error=llene todos los campos");
           exit();
           
        }else if (strcmp($pass, $pass1) !== 0){

         header("location:registrarse.php?error=contraseña no coincide");
         exit();
              
          }else if(!preg_match("/^[a-zA-Z0-9$%&|<>#]{8,20}$/",$pass)){ 
            header("location:registrarse.php?error=invalido tu contraseña debe contener minusculas
             mayusculas numeros  y  caracter especial como $%&|<># minimo 8");
            exit();
           
              }else{
               try{
   $consulta=$base->query("select * from usuario where matricula='$matricula' ");
   $matr=$consulta->fetchAll(PDO::FETCH_OBJ);
     
  if($matr){
    header("location:registrarse.php?error=la matricula ya existe en la bd");
    exit();
  }else{
    $sql="insert into usuario (nombre,apellidoP,apellidoM,turno,tipoUsuario,password,matricula)
    values(:nombre,:apellidoP,:apellidoM,:turno,:tipoUsuario,:password,:matricula);";
   $consulta= $base->prepare($sql);
    $consulta->bindParam(':nombre',$user);
    $consulta->bindParam(':apellidoP',$apellidoP);
    $consulta->bindParam('apellidoM',$apellidoM);
    $consulta->bindParam(':turno',$turno);
    $consulta->bindParam(':tipoUsuario',$tipo); 
    $consulta->bindParam(':password',$pass);
    $consulta->bindParam(':matricula',$matricula);

    if($consulta->execute()){
echo "datos guardados correctamente ";
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
