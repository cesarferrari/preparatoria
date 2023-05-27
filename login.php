<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
   


    <div id="login">
<div class="llave"> 
   
</div>
<form action="dispersa.php" method="GET">
            <h1>Inicio de sesion</h1>
              <label for="user">usuario</label>
            <input type="text" id="user" name="user" placeholder="ingrese su usuario"> <br><br>
            <label for="pass">contraseña</label>
            <input type="password" id="pass" name="pass" placeholder="ingrese su contraseña"> <br><br>
            <input type="submit"><br><br>
            <?php
            ?>
             <a href="registrarse.php">nuevo usuario</a>
             <?php
if(isset($_GET['error'])){?>
<p class="error"><?php echo $_GET['error'];?></p>
                <?php } ?>
            </form>
 
   </div>
   
</body>
</html>