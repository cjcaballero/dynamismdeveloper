
<?php

    require 'database.php';

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

// include database configuration file
include 'dbConfig.php';

?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="images/Favicon/favicon-32x32.png" type="image/png">
        <title>&#8226; dynamism&#174; &#8226;</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--fontawesome-->
        <script src="https://kit.fontawesome.com/b73bf9ac9d.js"></script>
       
        <!--Ir arriba-->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/up.js" type="text/javascript" charset="utf-8"></script>
        
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

          <!--Carussel patrocinadores-->

    <script src="js/slick.js" type="text/javascript" charset="utf-8"></script>

    <!--Carussel patrocinadores-->

    <script type="text/javascript">

        $(document).ready(function(){
          $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
              pauseOnHover: false,
              responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 4
              }
            }, {
              breakpoint: 520,
              settings: {
                slidesToShow: 3
              }
            }]
          });
        });

    </script>

    </head>

      
    <body>
      <!--Icono Up-->
      <span class="ir-arriba"><i class="fas fa-chevron-up"></i></span>

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
                            <img src="images/Logo/LogoSF_Black.png" alt="dynamism" style="max-height: 85px;" class="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="#Soluciones">Soluciones</a></li> 
                                <li class="nav-item"><a class="nav-link" href="#Tecnologias">Tecnologìas</a></li> 
                                <li class="nav-item"><a class="nav-link" href="#Clientes">Clientes</a></li> 
                                <li class="nav-item"><a class="nav-link" href="#Contacto">Contacto</a></li> 
                                <li class="nav-item"><a href="https://www.facebook.com/#/" alt="Facebook" target="_blank"><img src="images/Iconos/feis.png" alt="Facebook" style="width: 20px;height: 20px;margin-top: 30px;" class="nav-link"></a></li> 
                                <li class="nav-item"><a href="https://www.instagram.com/#/" alt="Instagram" target="_blank"><img src="images/Iconos/instagram.png" alt="Facebook" style="width: 20px;height: 20px;margin-top: 30px;"  class="nav-link"></a></li> 
                                <li class="nav-item"><a href="https://www.instagram.com/#/" alt="Whatsapp" target="_blank"><img src="images/Iconos/whatsapp.png" alt="Whatsapp" style="width: 20px;height: 20px;margin-top: 30px;"  class="nav-link"></a></li> 
                           
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
                            <h2>¡Soluciones para Ti!</h2>
                            <p>Recibe Noticias y Promociones suscribete a nuestro Newsletter</p>
                        </div>
                                
                        <div class="row">
                         <div style="color: green; font-weight: bold;"><?php echo $successNews;?></div>
                            <form action="index.php" method="post" id="contactForm">
                            
                                        <input type="email" name="newsletter" id="newsletter" placeholder="Ingresa tu Correo Electronico Aqui :)" class="input-correo" required autocomplete="off">
                                                    
                                        <input type="submit" class="form-control btn-correo_top">

                                    
                            </form>
                           
                            
                        </div>

            </div>
            </div>
        </section>  
        <section class="content-empresarial section-padding" id="Soluciones">
                <div class="content-empresarial-bg banner_inner" data-stellar-background-ratio="0.6">
                    <div class="container"> 
                        <div class="row">
                        <div class="title-empresarial col-md-12 col-xs-6">
                            <p>SOLUCIONES</p>
                        </div>
                         <div class="col-xs-12 col-md-12 subtitle-emp">

                            <p>
                                Contamos con las mejores Soluciones para ti. Nos enfocamos en tus necesidades y en que tu negocio venda más. Somos un equipo multidisciplinario originario de la ciudad de Monterrey Nuevo León México, comprometidos a atender tus necesidades y las de tu empresa o negocio. 
                            </p>

                        </div>
                        <div  class="col-xs-12 col-md-12 subtitle-emp-second" style="padding-bottom: 1%;">
                            
                            Conoce algunas de las soluciones integrales que tenemos para ti. ¡Conocenos!

                        </div>
                        

                        <div class="col-xs-12 col-md-6" style="padding-top: 50px;">
                            <img src="images/Servicios/Web.png"/>
                        </div>
                         <div class="col-xs-12 col-md-6" style="padding-top: 50px;">
                          <img src="images/Servicios/Software.png"/>
                        </div>
                         <div class="col-xs-12 col-md-6" style="padding-top: 155px;">
                          <img src="images/Servicios/eCommerce.png"/>
                        </div>
                         <div class="col-xs-12 col-md-6" style="padding-top: 155px;">
                          <img src="images/Servicios/Landing.png"/>
                        </div>
                        <div class="col-xs-12 col-md-6" style="padding-top: 155px;">
                          <img src="images/Servicios/apps.png"/>
                        </div>
                          <div class="col-xs-12 col-md-6" style="padding-top: 155px;">
                          <img src="images/Servicios/Marketing.png"/>
                        </div>
                        <p style="z-index:999;margin-top: 235px;">¿Requieres alguna solución para tu empresa o negocio? ¡Estamos para ayudarte! <a href="#Contacto"><b>Contactanos</b></a></p>
                  </div>
      

                    </div>

                </div>
        </section>  
         <!--Cart Items-->
        <section class="content-landing" id="Tecnologias">
            <div class="banner_inner">
                <div class="container"> 
                    <div class="row">

                        <div class="title-hist col-md-12 col-xs-6">
                            <p>TECNOLOGÍAS</p>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <p>Algunas de las Tecnologías con las que
                            trabajamos para poder crear soluciones integrales,
                            optimas y sobre todo funcionales para nuestros
                            clientes. <br><span style="font-weight:
                            bold;font-size: 15px; color: white; padding:
                            14%;"><span>¡No esperes más Solicita una Cotización <a href="#Contacto">Aqui</a> sin compromisos!.</span></span></p>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <img src="images/tech/html5.png"/>
                        </div>
                         <div class="col-xs-12 col-md-2">
                          <img src="images/tech/css3.png"/>
                        </div>
                        <div class="col-xs-12 col-md-2">
                          <img src="images/tech/javascript.png"/>
                        </div>
                        <div class="col-xs-12 col-md-2">
                          <img src="images/tech/android.png"/>
                        </div>
                        <div class="col-xs-12 col-md-2">
                          <img src="images/tech/ios.png"/>
                        </div>
                        <div class="col-xs-12 col-md-2">
                          <img src="images/tech/wp.png"/>
                        </div>
                        <div class="col-xs-12 col-md-2" style="margin-top: 12px;">
                          <img src="images/tech/presta.png"/>
                        </div>
                        <div class="col-xs-12 col-md-2" style="margin-top: 30px;">
                          <img src="images/tech/react.png"/>
                        </div>
                        <div class="col-xs-12 col-md-2" style="margin-top: 30px;">
                          <img src="images/tech/magento.png"/>
                        </div>
                        <div class="col-xs-12 col-md-2" style="margin-top: 30px;">
                          <img src="images/tech/php.png"/>
                        </div>
                         <div class="col-xs-12 col-md-2" style="margin-top: 30px;">
                          <img src="images/tech/dotnet.png"/>
                        </div>
                         <div class="col-xs-12 col-md-2" style="margin-top: 5px;padding-bottom: 45px;">
                          <img src="images/tech/sql.png"/>
                        </div>
              

                    </div>
                  </div>
            </div>
        </section>
         
        <section class="content-clientes" id="Clientes">
            <div class="banner_inner">
                <div class="container">     
                    <div class="title-hist col-md-12 col-xs-6">
                            <p>ALGUNOS DE NUESTROS CLIENTES</p>
                    </div>
                    <div  class="col-xs-12 col-md-12 subtitle-cli-second" style="padding-bottom: 1%;">
                            
                            Ellos como tu han confiado en nosotros :).

                    </div>

                    <div class="row">     
                      <div class="container">
                        <section class="customer-logos slider">
                          <div class="slide col-md-4"><img src="images/patrocinadores/bocadito.png" width="225px" height="100px;"></div>
                          <div class="slide col-md-4"><img src="images/patrocinadores/kafe.png" width="225px" height="100px;"></div>
                          <div class="slide col-md-4"><img src="images/patrocinadores/Framelist.png" width="225px" height="100px;"></div>
                          <div class="slide col-md-4"><img src="images/patrocinadores/Indemex.png"></div>
                          <div class="slide col-md-4"><img src="images/patrocinadores/hyperlink.png" width="225px" height="100px;"></div>
                          <div class="slide col-md-4"><img src="images/patrocinadores/aperh.png" width="225px" height="100px;"></div>
                        </section>
                      </div>
                    </div>
                    <div style="padding-bottom: 25px;"></div>
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

                            <p>¿Nos tomamos un Cafè? dejanos tu informaciòn.</p>

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
                                      <option value="Recomendacion">Recomendacion</option>
                                      <option value="Otro">Otro</option>
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
                    <a href="mailto:ing.carloscaballero@outlook.com"><div class="derechosfoot">Desarrollado con <i class="fas fa-heart" style="color: red;"> </i> por <b>dynamism</b> © 2020</div></a>
                    </div>
                    <div class="col-md-4 col-xs-12">
                            <a href="https://www.facebook.com/#" alt="Facebook" target="_blank">
                              <img src="images/Iconos/feis.png" alt="Facebook" class="feis">
                            </a>
                    </div>
                    <div class="col-md-4 col-xs-12">
                            <a href="https://www.instagram.com/#/" alt="Instagram" target="_blank"><img src="images/Iconos/instagram.png" alt="Facebook" class="insta"></a>
                    </div>
                    <div class="col-md-4 col-xs-12">
                            <a href="https://www.instagram.com/#/" alt="Whatsapp" target="_blank"><img src="images/Iconos/whatsapp.png" alt="Whatsapp" class="whats"></a>
                    </div> 

        </footer> 

    </body>
</html>