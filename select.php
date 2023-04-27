

<?php
/*$hostname="mysql:host=localhost;dbname=norma";
$username="root";
$password="";*/
include('conexion.php');
//$base = new  PDO($hostname,$username,$password);
$base->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
$base->exec("SET CHARACTER SET utf8");

if(isset($_GET['user'])&&isset($_GET['pass'])){
$usuario=$_GET['user'];
$pass=$_GET['pass'];
try{
   $consulta=$base->query("select * from usuario where matricula='$usuario' and password='$pass'");
   $usuarios=$consulta->fetchAll(PDO::FETCH_OBJ);
     
  if($usuarios){
   //print_r($usuarios);
echo " bienvenido  ".$usuario;
  
  }else{
   header("location:login.php?error=usuario o contraseña no coinciden");
   exit();
  }
}catch(Exception $e){
echo $e->getMessage();
}


/**/
}

?>