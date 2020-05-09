<?php 

    include 'Cart.php';
    $cart = new Cart;

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

        <script>
            function updateCartItem(obj, id) {
                $.get("cartAction.php", {
                    action: "updateCartItem",
                    id: id,
                    qty: obj.value
                }, function(data) {
                    if (data == 'ok') {
                        location.reload();
                    } else {
                        location.reload();
                    }
                });
            }
        </script>
    <style>
        
    input[type="number"]{

        width: 25%;
        text-align: center;
    }

    </style>

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
                            <p>LLEVAMOS TODOS NUESTROS PRODUCTOS
                                <br> HASTA LA PUERTA DE TU HOGAR</p>
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

                            <p>DETALLES DE TU ORDEN</p>

                        </div>
                        <div class="col-xs-12 col-md-12 subtitle-emp">

                            <p>Estas delicias llevaremos hasta la puerta de tu hogar.</p>

                        </div>

                        <table class="table .table-striped .table-responsive">
                                           <?php if($cart->total_items() > 0){ ?>
                            <thead>

                                <tr>
                                    <th>Producto</th>
                                    <th colspan="1">Precio</th>
                                    <th style="text-align: center;">Cantidad</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                                        
                                        //get cart items from session
                                        $cartItems = $cart->contents();
                                        foreach($cartItems as $item){

                                   $CantidadItem = $item['qty'];
                                   $rowid = $item['rowid'];


                                ?>
                                    <tr>
                                        <td><?php echo $item["name"]; ?></td>
                                        <td><?php echo '$'.$item["price"]; ?></td>
                                        <td style="text-align: center;">
                                                <input type="number" class="number" value="<?php echo $CantidadItem ?>" onchange="updateCartItem(this, '<?php echo $rowid ?>')">

                                        </td>
                                        <td>
                                                <a href="cartAction.php?action=removeCartItem&id=<?php echo $rowid ?>" class="btn " onclick="return confirm('¿Seguro que quiere remover el Producto seleccionado?')">
                                                    <i class="fas fa-times-circle" style="color: red;"></i>
                                                </a>

                                        </td>

                                        <?php 

                                                    } 

                                                        }else{ ?>

                                            <div class="col-md-12 col-xs-6">

                                                <td colspan="5"><i class="glyphicon glyphicon-shopping-cart"></i> No cuentas con Productos en tu Carrito :(</td>
                                    </tr>

                                    </div>

                                    <?php 

                                                            } 

                                                            ?>
                                        </td>
            
                                        </tr>
                            </tbody>
                            <tfoot>
                                            <tr>
                                                
                                                <?php $envio  = 10; ?> 
                                                <?php if($cart->total_items() > 0){ ?>
                                                <td style="color: red; text-align: right;" colspan="4"><strong>Total <?php echo '$'. ($cart->total()) .' MXN'; ?></strong></td>

                                                <?php } ?>
                                            </tr>
                                        </tfoot>

                        </table>

                        <div class="btns-action_view col-sm-12 col-md-6">
                            <a class="btn" href="tienda.php">Continuar Comprando</a>

                        </div>

                        <div class="btns-action_view_Confirm col-sm-12 col-md-6" style="padding-bottom: 5%;">
                            <?php if($cart->total_items() > 0){ ?>

                                <a href="shippingAddress.php" class="btn"><b>Confirmar Orden</b></a>

                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- FOOTER -->
        <footer class="footer-area">

            <div class="text-center">
                <div class="col-md-12 col-xs-12">
                    <a href="mailto:ing.carloscaballero@outlook.com">
                        <div class="derechosfoot">Desarrollado con <i class="fas fa-heart" style="color: red;"> </i> por <b>Dynamism</b></a> © 2019</div>
                </div>

        </footer>
         <script src="js/jquery-3.2.1.min.js"></script>
             <script src="js/bootstrap.min.js"></script>
    </body>

    </html>