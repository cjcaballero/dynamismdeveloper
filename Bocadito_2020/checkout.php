<?php

// include database configuration file
include 'dbConfig.php';

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}

// set customer ID in session
//$_SESSION['sessCustomerID'] = 1;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers ORDER BY id DESC");
//$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);

$custRow = $query->fetch_assoc();

$_SESSION['sessCustomerID'] = $custRow['id']; 
$_SESSION['Email'] = $custRow['email']; 
$_SESSION['address'] = $custRow['address']; 
$_SESSION['nombre'] =  $custRow['name'];  
$latitud =  $custRow['latitud'];  
$longitud =  $custRow['longitud'];  


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


     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBE--rYma4BxE6a7W9gGt17UmbCQsfXj3A&callback=mapa">
     </script>
    <style>
        #map {
            width: 100%;
            height: 300px;
            border: 1px solid #d0d0d0;
        }
    </style>

    <script>
        function localize() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(mapa, error);
            } else {
                alert('Tu navegador no soporta geolocalizacion.');
            }
        }

        function mapa(pos) { /************************ Aqui están las variables que te interesan***********************************/
            
            var latitud = '<?php echo $latitud; ?>';
            var longitud = '<?php echo $longitud; ?>';
            var precision = pos.coords.accuracy; 
            var contenedor = document.getElementById("map")


         var map = new google.maps.Map(document.getElementById('map'), 
            {

              zoom: 10,
              center: {lat: latitud, lng: longitud},
              mapTypeControl: true

            });

         var geocoder = new google.maps.Geocoder;
         var infowindow = new google.maps.InfoWindow;

            
            var direccion = '<?php echo $_SESSION['address']; ?>';
            var name = '<?php echo $_SESSION['nombre']; ?>';
            
            var centro = new google.maps.LatLng(latitud, longitud);

            var propiedades = {
                zoom: 20,
                center: centro,
                mapTypeId: 'satellite',
                disableDefaultUI: true,
                zoomControl: true,
                streetViewControl: true
                //mapTypeId: google.maps.MapTypeId.ROADMAP
            };

              var markerIcon = {
                url: 'images/iconmaps.png',
                scaledSize: new google.maps.Size(40, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(25,45),
                labelOrigin:  new google.maps.Point(20,42),
              };

            var markerLabel = direccion;

            var map = new google.maps.Map(contenedor, propiedades);
            var marcador = new google.maps.Marker({
                draggable: false,
                position: centro,
                map: map,
                title: markerLabel,
                icon: markerIcon,
                animation:google.maps.Animation.BOUNCE,
                label: {
                color: "black",
                fontSize: "14px",
                fontWeight: "bold"
                }
        
            });

            var info = new google.maps.InfoWindow({
              content: "<strong>" + "<span style='color:#666;font-size:13px;'>" + "¡Hola! " + "<span style='text-transform:uppercase;color:#32C1E8;font-size:14px;'>" + name + "</span>" + "<br>" + "Aqui entregaremos tu Orden" +": " + "</span>"  + "<br>" + "<p style='font-weight:bold'>" + markerLabel + "</strong>"

             
            });

            info.open(map,marcador);
 
            }
             
            google.maps.event.addDomListener(window, 'load', localize);

 

        

        function error(errorCode) {
            if (errorCode.code == 1)
                alert("No has permitido buscar tu localizacion")
            else if (errorCode.code == 2)
                alert("Posicion no disponible")
            else
                alert("Ha ocurrido un error")
        }
    </script>

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
    <body onLoad="localize()">

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
              <img src="images/Logo_min.png" alt="Makro Logistica" style="max-height: 85px;" class="Logo">
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
    
              </ul>
            </div> 
          </div>
              </nav>
            </div>
        </header>
       <!-- Header/Portada -->
        <section class="home_banner_area_checkout .img-responsive" id="map">
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
                     
                        <div class="title-checkout col-md-12 col-xs-6">

                        <p>DETALLES DE TU ORDEN</p>
                        
                        </div>

                      <div class="subtitle-detord col-xs-12 col-md-12 ">

                            <p>Estas delicias llevaremos hasta la puerta de tu hogar.</p>

                      </div>
                      <br>
                    <form class="form" action="shippingAddress.php?coordenadas=$coordenadas" role="form" method="post" enctype="multipart/form-data" autocomplete="off">
                       <div class="container">
                          <div class="row">

                              <table class="table .table-striped .table-responsive" style="margin-left: -15px;">

                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th colspan="1">Precio</th>
                                                <th style="text-align: center;">Cantidad</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($cart->total_items() > 0){
                                                //get cart items from session
                                                $cartItems = $cart->contents();
                                                foreach($cartItems as $item){
                                            ?>
                                            <tr>
                                                <td><?php echo $item["name"]; ?></td>
                                                <td><?php echo '$'.$item["price"]; ?></td>
                                                <td style="text-align: center;"><?php echo $item["qty"]; ?></td>
                                                <td><?php echo '$'.$item["subtotal"].' MXN'; ?></td>
                                            </tr>
                                            <?php 
                                                } 

                                            }else{ 

                                            ?>
                                            <tr>
                                                <td colspan="5"><i class="glyphicon glyphicon-shopping-cart"></i>  No cuentas con Productos en tu Carrito :(</td>
                                            </tr>
                                            <?php } ?>
                                                <tr>
                                                <td><?php echo "Costo de Envio"?></td>
                                                <td><?php echo "$". intval(10) ; ?></td>
                                                <td style="text-align: center;"><?php echo "--" ?></td>
                                                <td><?php echo "$". intval(10) ." MXN"; ?></td>
                                                </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                
                                                <?php $envio  = 10; ?> 
                                                <?php if($cart->total_items() > 0){ ?>
                                                <td style="color: red; text-align: right;" colspan="4"><strong>Total <?php echo '$'. ($cart->total() + intval(10)) .' MXN'; ?></strong></td>

                                                <?php } ?>
                                            </tr>
                                        </tfoot>

                                </table>
                                
                                <!--     <div id="map"></div> -->

                                <div class="btns-action_check col-sm-12 col-md-6">
                                  <a class="btn btnContinuarComprando" href="tienda.php">Continuar Comprando</a>

                                </div>

                                <div class="btns-action_check_fin col-sm-12 col-md-6" style="padding-bottom: 5%;">

                                   <a href="cartAction.php?action=placeOrder&id=<?php echo $_SESSION['sessCustomerID'];?>&email=<?php echo $_SESSION['Email']; ?>" class="btn btnFinalizar"><b>Finalizar Orden</b></a>
                               </div>


                            </div>
                        </div>
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