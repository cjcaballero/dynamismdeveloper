
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
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li> 
                <li class="nav-item"><a class="nav-link" href="tienda.php">Tienda</a></li> 
            </div> 
          </div>
              </nav>
            </div>
        </header>
        <!-- Header/Portada -->
        <section class="home_banner_area_shop .img-responsive">
            <div class="banner_inner">
        <div class="container">
        <div class="row">
        <div class="banner_sub col-md-12 col-xs-6">
          <p>LLEVAMOS TODOS NUESTROS PRODUCTOS <br> HASTA LA PUERTA DE TU HOGAR</p>
        </div>
      </div>
      </div>
            </div>
        </section>  
        <!--Cart Items-->
      <section class="content-landing" id="Tienda">
      <div class="banner_inner">
            <div class="container">  
              <div class="row">   
                     <div class="title-tienda col-md-12 col-xs-6">
                        
                        <p>¡COMPRA AQUI!</p>
                      
                      </div>
                          <?php
                                require 'admin/database.php';

                                echo '<nav>
                                        <ul class="nav nav-pills">';

                                $db = Database::connect();
                                $statement = $db->query('SELECT * FROM categories');
                                $categories = $statement->fetchAll();
                                foreach ($categories as $category)
                                {
                                    if($category['id'] == '0')
                                        echo '<li role="presentation" class="active nav-item"><a href="#'. $category['id'] . '" data-toggle="tab" class="nav-link">' . $category['name'] . '</a></li>';
                                    else
                                        echo '<li role="presentation" class="nav-item"><a href="#'. $category['id'] . '" data-toggle="tab" class="nav-link">' . $category['name'] . '</a></li>';
                                }

                                echo    '</ul>
                                      </nav>';

                                echo '<div class="tab-content" id="Compra">';

                                if ($cart->total_items() > 0 )
                                {

                               echo '
                                      <div class="btns-shop">
                                        <div class="col-xs-12 col-md-6">
                                           <a class="btn btn-revisarorden" href="viewCart.php" role="button"><span>REVISAR ORDEN</a>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                           <a class="btn btn-orders" href="shippingAddress.php" role="button"> <span class="glyphicon glyphicon-shopping-cart"></span> FINALIZAR COMPRA por: <span style="color:red;font-weight:bold;">$ '.$cart->total().' MXN </span></a>
                                        </div>
                                      </div>'
                                          ;

                                        echo '<br>';
                                }

                                echo '<div class="items-list"></div>';
                        
                                foreach ($categories as $category)
                                {
                                   
                                    echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                                   
                                    echo '<div class="row">';

                                    $statement = $db->prepare('SELECT * FROM items WHERE category = "'.$category['id'].'"');
                                    $statement->execute(array($category['id']));

                                    while ($item = $statement->fetch())
                                    {
                                        echo '<div class="col-sm-6 col-md-4" style="items-align=left">
                                                <div class="thumbnail_items">
                                                    <img src="images/' . $item['image'] . '" alt="..." class="thumbnail_items">
                                                    <div class="price">$ ' . number_format($item['price'], 2, '.', ''). '</div>
                                                    <div class="caption">
                                                        <h4>' . $item['name'] . '</h4>
                                                        <p>' . $item['description'] . '</p>
                                                        <a class="btn btn-order btn-add" href="cartAction.php?action=addToCart&id='. $item['id'] .'" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> AGREGAR AL CARRITO</a>
                                                    </div>
                                                </div>
                                            </div>';

                                     
                                       
                                    }

                                   echo    '</div>
                                        </div>';
                                     
                                }
                                Database::disconnect();
                                echo  '</div>';
                            ?>
        </div>
      </div>
      </div>
      </section>
       <!-- FOOTER -->  
        <footer class="footer-area">
            
                <div class="text-center">               
                    <div class="col-md-12 col-xs-12">
                    <a href="mailto:ing.carloscaballero@outlook.com"><div class="derechosfoot">Desarrollado con <i class="fas fa-heart" style="color: red;"> </i> por <b>Dynamism</b></a> © 2019</div>
                </div>
            
        </footer> 
               <script src="js/jquery-3.2.1.min.js"></script>
             <script src="js/bootstrap.min.js"></script>
    </body>
</html>