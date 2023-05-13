<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="estilando.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://kit.fontawesome.com/6a4751c08d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <nav>
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
                
                </label>
                <a href="" class="enlace">
                    <img src="imagen/demo.png" alt="" class="logo">
                </a>
                <ul>
               
               <li class="bienvenida">bienvenido alumno lenidas el fuerte </li>
               
             
               
               
                <li><a href="index.html">inicio</a></li>
               
                <li><a href="noticias.php">noticias</a></li>
                </ul>
                    </nav>
            <div class="container">
    
            <div class="lateral">
    <div class="option">
        <div class="logotipo">
            <a href="acceso_profesor.php">
            <i class="fa-solid fa-house"></i>
                <h4> principal</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  incidencias alumnos</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4>  incidencias alumnos</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> incidencias alumnos</h4>
            </a>
        </div>
        <div class="logotipo">
            <a href="http://">
                <i class="fa-sharp fa-regular fa-calendar-days"></i>
                <h4> incidencias alumnos</h4>
            </a>
        </div>
      
    </div>
            </div>
    
            <div class="body">
               <div class="left">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae officiis iure placeat tempora fuga, 
                    modi adipisci impedit est quas nesciunt consequuntur culpa ullam quod, aliquam unde cumque! Rem, laborum
                     omnis!
                Ratione deleniti doloremque perferendis doloribus ducimus veniam ex officia id cumque tempora placeat earum
                 possimus rerum, sit ipsum, odit sint illum. Aliquid architecto a aperiam facilis, quos dolore sunt commodi?
                Ab ratione libero tempore explicabo. Eveniet ratione consectetur, veniam recusandae tempore quo aperiam nobis
                 necessitatibus commodi quas? Animi a quaerat ad repellat accusantium. Eligendi odit impedit deserunt numquam
                  facilis. Odit?</p>
               </div>
               <div class="right">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque optio minus animi tempora illum, facilis sed! 
                Eveniet veniam, error natus eos quibusdam, velit odit ad doloremque similique enim qui eius?
              Vero animi omnis dolorum earum, dicta perferendis enim corrupti similique natus est ullam ipsam magnam, provident,
               quasi dolore quaerat non ducimus doloremque veniam quae. Ex, fuga consequuntur? Pariatur, odio illo!
              Repellendus nesciunt ex qui perspiciatis veritatis aliquid eos et perferendis est laboriosam iure quisquam magnam 
              aspernatur sint vitae nihil voluptas nemo, commodi natus inventore sequi! Velit temporibus modi vel incidunt.</p>
               </div>
            </div>
        </div>
        
        <body>
        <?php
    
    include('conexion.php');
    //$base = new  PDO($hostname,$username,$password);
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
    
    
    
    ?>
    
          
        </body>
</html>