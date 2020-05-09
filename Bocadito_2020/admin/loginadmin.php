<?php
     
    require 'database.php';
     
    $usuarioError = $passwordError = $datosError = $usuario = $password = "";

    if(!empty($_POST)) 
    {

        $usuario            = checkInput($_POST['usuario']);
        $password           = checkInput($_POST['password']); 
       
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($usuario)) 
        {
            $usuarioError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        elseif(empty($password)) 
        {
            $passwordError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 

        else{

             $isSuccess = true;
        }
       
            if($isSuccess) 
            {
            
                $db = Database::connect();

                $sql= "SELECT id,name FROM users WHERE user = '". $usuario ."' AND password = '".$password."'";
             
                try 
                {
                    $stmt = $db->prepare($sql);
                    $result = $stmt->execute();
                    $rows = $stmt->fetch();
    
                    //$n = count($rows); 
                    
                    if($rows > 0){

                         $_SESSION['tipo_usuario'] = $rows['name'];   
                         $UserLogin = $_SESSION['tipo_usuario'];

                         header("location: menuadmin.php?user=".$UserLogin."");

                    }else{

                           $datosError = 'Usuario y/o Password son Incorrectos';
                    }
                    
                    $db =Database::disconnect();
                    $stmt->closeCursor(); 

                }       
                catch (Exception $e)
                {
                    die ($e->getMessage() ); 
                }
        }
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
                                <li class="nav-item"><a class="nav-link" href="../index.php" style="color: red;font-weight: bolder;">Inicio</a></li> 
                                <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/Bocaditomerida/" target="_blank"><i class="fab fa-facebook"></i></a></li> 
                                   <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/bocaditomerida/" target="_blank"><i class="fab fa-instagram"></i></a></li> 
                           


                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>
        <!-- Header/Portada -->
  <section class="content-loginintranet section-padding">
                <div class="content-loginintranet-bg banner_inner" data-stellar-background-ratio="0.6">
                    <div class="container"> 
                        <div class="row">
                            
                        <div class="title-loginintranet col-md-12 col-xs-6">
                            <p>INTRANET</p>
                        </div>
                         <div class="col-xs-12 col-md-12 subtitle-emp">

                            <p>¡Bienvenido! a nuestra Intranet.</p>

                        </div>
                        <form class="form" action="loginadmin.php" method="post" enctype="multipart/form-data" class="form-align" autocomplete="off">
                            
                        <div class="container">
                            <div class="row">

                                 <div class="col-md-6 col-xs-3">
                            
                                    <input type="text" name="usuario" id="usuario" placeholder="Usuario" class="input-usuario" required autocomplete="off">

                                </div>
                                <div class="col-md-6 col-xs-3">

                                    <input type="password" name="password" id="password" placeholder="Password" class="input-password" required autocomplete="off">

                                </div>
                                      
                                 <div class="col-md-6 col-xs-3">
                                    <input type="submit" class="btn btncontent-loginintranet">
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