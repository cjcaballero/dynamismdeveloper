
<?php

    require 'admin/database.php';


        if(!empty($_GET['return'])) {

          $return  = $_GET['return'];

           if ($return == 'ok'){
            echo '<script language="javascript">alert("Bienvenido a nuestro Newsletter! :)");</script>';   
           }

            elseif ($return == 'success'){
            echo '<script language="javascript">alert("Tu mensaje fue enviado Correctamente, Gracias! :)");</script>';   
           }

           
       }
   

 
     $successNews = $success = $nombre = $email = $telefono = $direccion = $asunto= $medio = $comentarios = $newsletter = "";
                

    if(!empty($_POST['newsletter'])) 
    {
      
        $newsletter = checkInput($_POST['newsletter']); 

            
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO newsletter (email) values( ? )");
            $statement->execute(array($newsletter));
            Database::disconnect();


            header("Location: index.php?return=ok");
    }

    if(!empty($_POST['nombre'])) 
    {

              $nombre           = checkInput($_POST['nombre']);
              $email            = checkInput($_POST['email']);
              $telefono         = checkInput($_POST['telefono']);
              $direccion        = checkInput($_POST['direccion']); 
              $asunto           = checkInput($_POST['asunto']); 
              $medio            = checkInput($_POST['medio']); 
              $comentarios      = checkInput($_POST['comentarios']); 

            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO contact (nombre,email,telefono,direccion,asunto,medios,comentarios) values(?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($nombre,$email,$telefono,$direccion,$asunto,$medio,$comentarios));
            Database::disconnect();


            header("Location: index.php?return=success");

    }
    

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<?php
include 'Cart.php';
$cart = new Cart;

// include database configuration file
include 'dbConfig.php';

?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="images/Favicon/favicon-32x32.png" type="image/png">
        <title>&#8226; Bocadito&#174; &#8226;</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--fontawesome-->
        <script src="https://kit.fontawesome.com/b73bf9ac9d.js"></script>
        <!-- main css -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5R24XBV');</script>
        <!-- End Google Tag Manager -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149013070-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-149013070-1');
        </script>

    </head>

      
    <body>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5R24XBV"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

       <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v4.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1452086751689774"
        theme_color="#1FC2DE"
        logged_in_greeting="¡Hola! ¿Como podemos ayudarte?"
        logged_out_greeting="¡Hola! ¿Como podemos ayudarte?">
      </div>
        <!--Chat-->

        <!-- HEADER -->
          <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container box_1620">
                        <a class="navbar-brand" href="index.php">
                            <img src="images/Logo_min.png" alt="Bocadito" style="max-height: 85px;" class="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="tienda.php" style="color: red;font-weight: bolder;">Tienda</a></li> 
                                <li class="nav-item"><a class="nav-link" href="#Nosotros">Nosotros</a></li> 
                                <li class="nav-item"><a class="nav-link" href="#Empresarial">Empresarial</a></li> 
                                <li class="nav-item"><a class="nav-link" href="admin/loginadmin.php">Intranet</a></li> 
                                <li class="nav-item"><a class="nav-link" href="#Contacto">Contacto</a></li> 
                                <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/Bocaditomerida/" target="_blank"><i class="fab fa-facebook"></i></a></li> 
                                   <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/bocaditomerida/" target="_blank"><i class="fab fa-instagram"></i></a></li> 
                           


                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>
        <!-- Header/Portada -->
        <section class="home_banner_area">
            <div class="banner_inner">
                <div class="container">
                    <div class="row">
                        <div class="banner_content col-md-12 col-xs-6">
                            <h2>¡Hechos con Amor!</h2><img src="images/iconmaps.png" alt="Heart" class="heart">
                            <p>Recibe Noticias y Promociones suscribete a nuestro Newsletter</p>
                        </div>
                                
                        <div class="row">
                         <div style="color: green; font-weight: bold;"><?php echo $successNews;?></div>
                            <form action="index.php" method="post" id="contactForm">
                            
                                        <input type="email" name="newsletter" id="newsletter" placeholder="Ingresa tu Correo para recibir Promos!" class="input-correo" required autocomplete="off">
                                                    
                                        <input type="submit" class="form-control btn-correo_top">

                                    
                            </form>
                           
                            
                        </div>

            </div>
            </div>
        </section>  
         <!--Cart Items-->
        <section class="content-landing" id="Nosotros">
            <div class="banner_inner">
                <div class="container">     
                    <div class="title-hist col-md-12 col-xs-6">
                            <p>NUESTRA HISTORIA</p>
                        </div>
                        <div class="col-xs-12 col-md-12">


                            
                                        <p>Una empresa 100% Yucateca, llevando desde hace mas de 5años los mejores Bocadillos, Sandwichones y otras delicias a tu hogar.<br><span style="font-weight: bold;font-size: 15px; color: #666; padding: 14%;"><span>¡Ven a Visitarnos!, Llamanos o pide por Internet...</span></span></p>


                        </div>
                    
                        <div class="col-xs-3 col-md-6 .img-responsive">

                            <img src="images/Sucursal/sucursal1.jpg" alt="Nosotros">

                        </div>
                    
                        <div class="col-xs-3 col-md-6 .img-responsive" style="margin-top: -18px; padding-bottom: 1%;">
                            
                            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!4v1558388117954!6m8!1m7!1ssExgCU8iNLEwzYUhq-VCMw!2m2!1d20.9966365287377!2d-89.597836297527!3f350.21489139445896!4f1.0083699384367577!5f1.4125384518173338" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </div>
                  </div>
            </div>
        </section>
         <section class="content-empresarial section-padding" id="Empresarial">
                <div class="content-empresarial-bg banner_inner" data-stellar-background-ratio="0.6">
                    <div class="container"> 
                        <div class="row">
                        <div class="title-empresarial col-md-12 col-xs-6">
                            <p>EMPRESARIAL</p>
                        </div>
                         <div class="col-xs-12 col-md-12 subtitle-emp">

                            <p>Te brindamos un servicio de calidad para eventos de negocios y corporativos.</p>

                        </div>
                        <div  class="col-xs-12 col-md-12 subtitle-emp-second" style="padding-bottom: 1%;">
                            
                            Hemos pensado en toda la experiencia de nuestros clientes, por lo que ofrecemos paquetes <br>a medida para cada tipo de evento.Nuestros procesos de producción y servicio son estandarizados, <br>por lo que garantizamos la calidad y confianza.

                        </div>
                        
            
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                            <img src="images/Empresarial/Banquete1.jpg" alt="Banquete 1" class="img-empre1">
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                            <img src="images/Empresarial/Banquete2.jpg" alt="Banquete 2" class="img-empre1">
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                            <img src="images/Empresarial/Banquete3.jpg" alt="Banquete 3" class="img-empre1">
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                            <img src="images/Empresarial/Banquete4.jpg" alt="Banquete 4" class="img-empre1">
                        </div>

                  </div>
                  <div class="paquetes">
                      
                      <h1>
                           Nuestros Servicios:
                      </h1>
                   <p> <span>&#8226; Bocaditos a Domicilio:</span> Entrega en lugar y horario especificado. <br>
                    <span>&#8226; Bocaditos Catering y Coffee Brake.</span> <br>
                    <span>&#8226; Servicio completo de Catering:</span> Bocadillos, café, personal de atención, barra y utensilios. <br>
                    <span>&#8226; Paquetes Armados:</span><br>
                    &#8226; 15 Personas: 1 Sandwichon, 15 bocadillos, café y agua $600<br>
                    &#8226; 25 Personas: 1 1/2 Sandwichon, 25 bocadillos, café y agua $990
                    </p>

                  </div>
                    </div>

                </div>
        </section>
         <section class="content-contacto" id="Contacto">
             <div class="banner_inner">
                    <div class="container"> 
                        <div class="row">

                            <div class="title-contacto col-md-12 col-xs-6">
                                    <p>CONTACTO</p>
                            </div>
                            <div class="col-xs-12 col-md-12 subtitle-emp">

                            <p>¿Dudas o comentarios? dejanos tu informacion.</p>

                            </div>
                            <form class="form" action="index.php" method="post" enctype="multipart/form-data" class="form-align" autocomplete="off">
                                <div class="container">
                                   <div class="row">
                            
                            <span style="color: #10CC26; font-weight: bold;"><?php echo $success;?></span>
                            <div class="col-md-6 col-xs-3">
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="input-nombre" required autocomplete="off">
                            </div>
                            <div class="col-md-6 col-xs-3">
                                    <input type="text" name="email" id="email" placeholder="Correo Electronico" class="input-email" required autocomplete="off">
                            </div>
                            <div class="col-md-6 col-xs-3">

                                    <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="input-tel" required autocomplete="off">
                            </div>
                           <div class="col-md-6 col-xs-3">

                                <input type="text" name="direccion" id="direccion" placeholder="Direccion" class="input-direccion" required autocomplete="off">

                            </div>
                            <div class="col-md-6 col-xs-3">

                                <input type="text" name="asunto" id="asunto" placeholder="Asunto" class="input-asunto" required autocomplete="off">

                            </div>
                             <div class="col-md-6 col-xs-3">
                                    <select name="medio" class="select" required>
                                      <option value="" disabled selected>¿Como te enteraste de nosotros?</option>
                                       <option value="Facebook">Facebook</option>
                                      <option value="Instagram">Instagram</option>
                                      <option value="Google">Google</option>
                                      <option value="Google">Recomendacion</option>
                                      <option value="Google">Tienda</option>
                                    </select>
                            </div>
                            <div class="col-md-6 col-xs-3">

                                <textarea name="comentarios" class="textarea" id="comentarios" placeholder="Comentarios" cols="3" required autocomplete="off"></textarea>

                            </div>
                            <div class="col-md-6 col-xs-3">
                                <input type="submit" class="btn btncontent-contact">
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
                            <a href="https://www.facebook.com/Bocaditomerida/" alt="Facebook Bocadito" target="_blank"><img src="images/Iconos/feis.png" alt="Facebook" class="feis"></a>
                    </div>
                    <div class="col-md-12 col-xs-12">
                            <a href="https://www.instagram.com/bocaditomerida/" alt="Instagram Bocadito" target="_blank"><img src="images/Iconos/instagram.png" alt="Facebook" class="insta"></a>
                    </div>
            
        </footer> 
             <script src="js/jquery-3.2.1.min.js"></script>
             <script src="js/bootstrap.min.js"></script>
    </body>
</html>