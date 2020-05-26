
<?php
include 'Cart.php';
$cart = new Cart;

// include database configuration file
include 'dbConfig.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bocadito | Hechos con Amor&#174;</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="apple-touch-icon" sizes="57x57" href="images/Favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="images/Favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/Favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images/Favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/Favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="images/Favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="images/Favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="images/Favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images/Favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="images/Favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/Favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images/Favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/Favicon/favicon-16x16.png">
        <link rel="manifest" href="images/Favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images/Favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!--Menu-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

      
     <style>

        @font-face {
          font-family: Montserrat;
          src: url(../images/Fonts/Montserrat-Regular.ttf);
        }
                  * {
              box-sizing: border-box;
              -webkit-box-sizing: border-box;
              -moz-box-sizing: border-box;
            }

            *, *:before, *:after {
              box-sizing: inherit;
            }

            html {
              box-sizing: border-box;
            }

            body {
              margin: 0;
            font-family: Montserrat;
              overflow-x: hidden;
            }

            section {
              width: 100%;
              padding: 0 7%;
              display: table;
              margin: 0;
              max-width: none;

              height: 100vh;
              color: #fff;
            }

            .content {
              display: table-cell;
              vertical-align: middle;
              color: #fff;
            }

            .nav-trigger {
              width: 30px;
              height: 30px;
              position: fixed;
              top: 10px;
              right: 10px;
              z-index: 20;
              cursor: pointer;
              -webkit-transition: top .1s ease-in-out;
              transition: top .1s ease-in-out;
            }
            .nav-trigger span {
              display: block;
              width: 100%;
              height: 2px;
              background: #fff;
              margin: 7px auto;
              -webkit-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
              box-shadow: 0 0 3px 1px rgba(0, 0, 0, 0.3);
            }
            .nav-trigger span:first-child {
              top: 0;
              left: 0;
            }
            .nav-trigger span:nth-child(2) {
              width: 20px;
              top: 10px;
              left: 0;
            }
            .nav-trigger span:last-child {
              top: 20px;
              left: 0;
            }
            .nav-trigger .on {
              top: 10px;
            }

            .nav-trigger.on span:first-child {
              -webkit-transform: translateY(10px) rotate(45deg);
              transform: translateY(10px) rotate(45deg);
            }

            .nav-trigger.on span:nth-child(2) {
              -webkit-transform: translateX(50px);
              transform: translateX(50px);
              opacity: 0;
            }

            .nav-trigger.on span:last-child {
              -webkit-transform: translateY(-8px) rotate(-45deg);
              transform: translateY(-8px) rotate(-45deg);
            }

            .nav-trigger-dark {
              width: 30px;
              height: 30px;
              position: fixed;
              top: 10px;
              right: 10px;
              z-index: 20;
              cursor: pointer;
              -webkit-transition: top .1s ease-in-out;
              transition: top .1s ease-in-out;
            }
            .nav-trigger-dark span {
              display: block;
              width: 100%;
              height: 2px;
              background: #000;
              margin: 7px auto;
              -webkit-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
              box-shadow: 0 0 3px 1px rgba(255, 255, 255, 0.3);
            }
            .nav-trigger-dark span:first-child {
              top: 0;
              left: 0;
            }
            .nav-trigger-dark span:nth-child(2) {
              width: 20px;
              top: 10px;
              left: 0;
            }
            .nav-trigger-dark span:last-child {
              top: 20px;
              left: 0;
            }
            .nav-trigger-dark .on {
              top: 10px;
            }

            .nav-trigger-dark.on span:first-child {
              -webkit-transform: translateY(10px) rotate(45deg);
              transform: translateY(10px) rotate(45deg);
            }

            .nav-trigger-dark.on span:nth-child(2) {
              -webkit-transform: translateX(50px);
              transform: translateX(50px);
              opacity: 0;
            }

            .nav-trigger-dark.on span:last-child {
              -webkit-transform: translateY(-8px) rotate(-45deg);
              transform: translateY(-8px) rotate(-45deg);
            }

            .nav-menu {
              height: 100%;
              position: fixed;
              top: 0;
              right: 0;
              bottom: 0;
              left: 0;
              display: none;
              z-index: 19;
              overflow: hidden;
            }
            .nav-menu ul {
              list-style-type: none;
              padding: 0;
              margin: 0;
              width: 100%;
              max-width: 100%;
              text-align: center;
              position: relative;
              -webkit-transition: opacity .35s, visibility .35s, height .35s;
              transition: opacity .35s, visibility .35s, height .35s;
            }
            .nav-menu ul a {
              position: relative;
              float: left;
              margin: 0;
              width: 25%;
              height: 100vh;
              text-align: center;
              cursor: pointer;
              background: #74C2E9;
              color: #fff;
              text-decoration: none;
                font-family: Montserrat;
            }
            @media (max-width: 30em) {
              .nav-menu ul a {
                width: 100%;
                height: 25vh;
              }
            }
            .nav-menu ul a li {
              position: absolute;
              text-transform: uppercase;
              font-family: Montserrat;
              top: 45%;
              left: 0;
              position: relative;
              -webkit-animation: fadeInRight .5s ease forwards;
              animation: fadeInRight .5s ease forwards;
            }
            @media (max-width: 30em) {
              .nav-menu ul a li {
                top: 25%;
              }
            }
            .nav-menu ul a h2.mb {
              -webkit-transition: -webkit-transform 0.35s;
              transition: -webkit-transform 0.35s;
              transition: transform 0.35s;
              transition: transform 0.35s, -webkit-transform 0.35s;
              margin-bottom: -20px;
              font-size: 2.25rem;
              /* 36/16 */
            }
            @media (max-width: 30em) {
              .nav-menu ul a h2.mb {
                font-size: 1.688rem;
                /* 27/16 */
              }
            }
            @media (min-width: 48em) and (max-width: 61.9375em) {
              .nav-menu ul a h2.mb {
                font-size: 2rem;
                /* 32/16 */
                margin-bottom: -13px;
              }
            }
            .nav-menu ul a h2.mt {
              -webkit-transition: -webkit-transform 0.35s;
              transition: -webkit-transform 0.35s;
              transition: transform 0.35s;
              transition: transform 0.35s, -webkit-transform 0.35s;
              margin-bottom: -60px;
              font-size: 2.25rem;
              /* 36/16 */
            }
            @media (max-width: 30em) {
              .nav-menu ul a h2.mt {
                font-size: 1.688rem;
                /* 27/16 */
              }
            }
            @media (min-width: 48em) and (max-width: 61.9375em) {
              .nav-menu ul a h2.mt {
                font-size: 2rem;
                /* 32/16 */
              }
            }
            .nav-menu ul a i {
              font-style: normal;
              opacity: 0;
              -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
              transition: opacity 0.35s, -webkit-transform 0.35s;
              transition: opacity 0.35s, transform 0.35s;
              transition: opacity 0.35s, transform 0.35s, -webkit-transform 0.35s;
              -webkit-transform: translate3d(0, -30px, 0);
              transform: translate3d(0, -30px, 0);
              font-size: 1.875rem;
              /* 30/16 */
            }
            @media (max-width: 30em) {
              .nav-menu ul a i {
                display: none;
              }
            }
            .nav-menu ul a:hover {
              background: #fff;
              color: #74C2E9;
            }
            .nav-menu ul a:hover h2 {
              -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
            }
            .nav-menu ul a:hover i {
              opacity: 1;
              -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
            }
            .nav-menu ul a.active {
              background: #fff;
              color: #e65454;
            }
            .nav-menu ul a.active:hover {
              color: #000;
              
            }

            @-webkit-keyframes fadeInRight {
              0% {
                opacity: 0;
                left: 20%;
              }
              100% {
                opacity: 1;
                left: 0;
              }
            }
            @keyframes fadeInRight {
              0% {
                opacity: 0;
                left: 20%;
              }
              100% {
                opacity: 1;
                left: 0;
              }
            }
            .bgwhite {
              background: #fff;
            }

    </style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
    </head>


    <body>
     <div class="nav-trigger js_navbar">
<span></span><span></span><span></span>
</div>
<div class="nav-menu" style="display: none;">
<ul>
<a href="nosotros.php"> <li><h2 class="mt">Nosotros</h2></li></a>
<a href="empresarial.php"><li><h2 class="mb">Empresarial</h2></li></a>
<a href="admin/loginadmin.php"><li><h2 class="mt">Intranet</h2></li></a>
<a href="contacto.php"><li><h2 class="mb">Contacto</h2></li></a>
</ul>
</div>
<section>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script id="rendered-js">
      $('body').on('click', '.nav-trigger', function () {
  $(this).toggleClass('on');
  $('.nav-menu').fadeToggle(200);
});

$('body').on('click', '.nav-trigger-dark', function () {
  $(this).toggleClass('on');
  $('.nav-menu').fadeToggle(200);
});

$(document).scroll(function (e) {
  $.each($('section'), function (index, section) {
    if ($(this).scrollTop() >= section.getBoundingClientRect().top && $(this).scrollTop() <= section.getBoundingClientRect().bottom) {
      if ($(section).hasClass('bgwhite')) {
        $('.js_navbar').removeClass('nav-trigger');
        $('.js_navbar').addClass('nav-trigger-dark');
      } else {
        $('.js_navbar').removeClass('nav-trigger-dark');
        $('.js_navbar').addClass('nav-trigger');
      }
    }
  });
});
      //# sourceURL=pen.js
    </script>
<script src="https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js"></script>


        <div class="container site">
                <a href="index.html"><div class="logo"></div></a>
       
                    <?php
        				        require 'admin/database.php';

                        echo '<nav>
                                <ul class="nav nav-pills">';

                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM categories');
                        $categories = $statement->fetchAll();
                        foreach ($categories as $category)
                        {
                            if($category['id'] == '1')
                                echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                            else
                                echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                        }

                        echo    '</ul>
                              </nav>';

                        echo '<div class="tab-content">';

                        if ($cart->total_items() > 0 )
                        {

                          echo '
                            
                            <div class="col-xs-5 col-md-6">
                               <a class="btn btn-order" href="viewCart.php" role="button" style="background-color:#8BC34A;"><span style="font-family:Montserrat;">REVISAR ORDEN</a>
                            </div>
                            <div class="col-xs-7 col-md-6">
                               <a class="btn btn-order" href="shippingAddress.php" role="button" style="font-family:Montserrat;><span class="glyphicon glyphicon-shopping-cart"></span>FINALIZAR COMPRA por: <span style="color:red;font-weight:bold;">$ '.$cart->total().' MXN </span></a>

                            </div>';

                            echo '<br>';
                        }

                        echo '<div style="margin-top:35px;"></div>';
                
                        foreach ($categories as $category)
                        {
                           
                            echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                           
                            echo '<div class="row">';

                            $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                            $statement->execute(array($category['id']));

                            while ($item = $statement->fetch())
                            {
                                echo '<div class="col-sm-6 col-md-4 style="items-align=left">
                                        <div class="thumbnail">
                                            <img src="images/' . $item['image'] . '" alt="..." style="width:350px;height:250px;">
                                            <div class="price">$ ' . number_format($item['price'], 2, '.', ''). '</div>
                                            <div class="caption">
                                                <h4>' . $item['name'] . '</h4>
                                                <p>' . $item['description'] . '</p>
                                                <a class="btn btn-order" href="cartAction.php?action=addToCart&id='. $item['id'] .'" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> AGREGAR AL CARRITO</a>
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
        <ul class="list-style-none d-flex text-gray">
        <li class="mr-3" style="color: #757575;text-align: center;">Desarrollado con <img src="images/Iconos/heart.png" alt="Dynamism" style="width: 15px; height: 15px;"> por <a href="mailto:ing.carloscaballero@outlook.com">Dynamism</a> © 2019</li>
      </ul>
    </body>
</html>
