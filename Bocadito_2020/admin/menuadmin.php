<?php
     
    require 'database.php';


    $usuario  = $_GET['user'];


    if($usuario == 'Carlos Caballero' || $usuario == 'Joel Caballero' || $usuario == 'Christian Caballero'){
        

        $none = 'block';

    }
    else{

        $none = 'none';
    }


    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../images/Favicon/favicon-32x32.png" type="image/png">
        <title>&#8226; Bocadito&#174; &#8226;</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--fontawesome-->
        <script src="https://kit.fontawesome.com/b73bf9ac9d.js"></script>
        <!-- main css -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/responsive.css">
        

    </head>
    <body>

        <!-- HEADER -->
          <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container box_1620">
                        <a class="navbar-brand" href="index.php">
                            <img src="../images/Logo_min.png" alt="Bocadito" style="max-height: 85px;" class="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/Bocaditomerida/" target="_blank"><i class="fab fa-facebook"></i></a></li> 
                                   <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/bocaditomerida/" target="_blank"><i class="fab fa-instagram"></i></a></li> 
                           


                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>
        <!-- Header/Portada -->
  <section class="content-menulogin section-padding">
                <div class="content-menulogin-bg banner_inner" data-stellar-background-ratio="0.6">
                    <div class="container"> 
                        <div class="row">
                            
                        <div class="title-menulogin col-md-12 col-xs-6">
                            <p>CONTROL PANEL</p>
                        </div>
                         <div class="col-xs-12 col-md-12 subtitle-emp">

                                  <p><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></p> 

                        </div>

                        <form class="form" action="loginadmin.php" method="post" enctype="multipart/form-data" class="form-align" autocomplete="off">
                            
                        <div class="container">
                            <div class="row">

                                     <div class="col-xs-12 col-md-4" style="display: <?php echo $none ?>">

                                            <div class="content-box content-box-productos" style="background: #448AFF; width: 250px;height: 200px;">
                                                <a href="index.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-65px; margin-left: 15px;">Productos</span><img src="../images/Iconos/menu.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                                            </div>

                                     </div>
                                     <div class="col-xs-12 col-md-4">

                                            <div class="content-box content-box-pedidos" style="background: #4CAF50;width: 250px;height: 200px;">
                                                <a href="pedidos.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">Pedidos</span><img src="../images/Iconos/orden.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                                            </div>

                                    </div>
                                    <div class="col-xs-6 col-md-4" style="display: <?php echo $none ?>;">

                                        <div class="content-box content-box-usuarios" style="background: #FF5252;width: 250px;height: 200px;">
                                            <a href="usuarios.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">Usuarios</span><img src="../images/Iconos/usuario.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>
                   </div>
                </div>
            </div>
        </section>
       <!-- FOOTER -->  
        <footer class="footer-area">
            
                                            
                    <div class="col-md-12 col-xs-12">
                    <a href="mailto:ing.carloscaballero@outlook.com"><div class="derechosfoot">Desarrollado con <i class="fas fa-heart" style="color: red;"> </i> por <b>Dynamism</b> © 2019</div></a>
                    </div>
                    <div class="col-md-12 col-xs-12">
                            <a href="https://www.facebook.com/Bocaditomerida/" alt="Facebook Bocadito" target="_blank"><img src="../images/Iconos/feis.png" alt="Facebook" class="feis"></a>
                    </div>
                    <div class="col-md-12 col-xs-12">
                            <a href="https://www.instagram.com/bocaditomerida/" alt="Instagram Bocadito" target="_blank"><img src="../images/Iconos/instagram.png" alt="Facebook" class="insta"></a>
                    </div>
            
        </footer> 
             <script src="js/jquery-3.2.1.min.js"></script>
             <script src="js/bootstrap.min.js"></script>
    </body>
</html>