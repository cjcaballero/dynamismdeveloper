<?php

$email= "";
 
include 'dbConfig.php';
 

if(!isset($_REQUEST['id'])){
    header("Location: tienda.php");
}
else
{
   
             
        $id= $_REQUEST['id'];
        $email= $_GET['email'];

        $query = $db->query("SELECT * FROM orders A INNER JOIN customers B ON A.customer_id = B.id WHERE A.id = $id");

        $custRow = $query->fetch_assoc();

        

            //Enviamos Confirmacion y detalles del pedido al Cliente
            $para = $email;  
            // título
            $título = 'Hola! ' . ' ' .ucfirst ($custRow['name']). ' Tu Pedido fue Recibido :)';

            // mensaje
            $mensaje = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Bocadito de Cielo</title>
                <link rel="icon" href="images/Favicon/favicon-32x32.png" type="image/png">
            </head>
                      
                <body style="background-color: black;">
                     

                          <img src="https://www.bocadito.mx/images/Sucesspedido.png" alt="Bocadito" style="width: 150px;height: 80px;margin-left: 45%;margin-right: 50%;">
              
                    
                </body>
            </html>
            ';

                        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'From: Pedido - Bocadito de Cielo <contacto@bocadito.mx>' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // Cabeceras adicionales

            // Enviarlo
            mail($para, $título, $mensaje, $cabeceras);


      
}
        
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

        <meta http-equiv="Refresh" content="5;url=index.php"> 

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
      
    <!-- HEADER -->
        <header class="header_area">
            <div class="main_menu">
              <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container box_1620">
            <a class="navbar-brand" href="index.php">
              <img src="images/Logo_min.png" alt="Makro Logistica" style="max-height: 85px;" class="Logo">
            </a>

          </div>
              </nav>
            </div>
        </header>
        <section class="content-successorder section-padding" id="Empresarial">
                <div class="content-successorder-bg banner_inner" data-stellar-background-ratio="0.6">
                    <div class="container"> 
                        <div class="row">
                        <div class="title-successorder col-md-12 col-xs-6">
                            <img src="images/muchas-gracias-indigital-marketing-digital.png" alt="">
                            <p>LA ORDEN <b style="color: white;">#<?php echo $_GET['id']; ?></b> FUE GENERADA EXITOSAMENTE!</p>
                        </div>
                         <div class="col-xs-12 col-md-12 subtitle-successorder">

                            <p style="color: #1FC2DE;">Estas apunto de disfrutar algo delicioso. Tu Pedido va en camino. :)</p>

                        </div>

                  </div>
                    </div>

                </div>
        </section>
       <!-- FOOTER -->  
        <footer class="footer-area">
            
                <div class="text-center">               
                    <div class="col-md-12 col-xs-12">
                    <a href="mailto:ing.carloscaballero@outlook.com"><div class="derechosfoot">Desarrollado con <i class="fas fa-heart" style="color: red;"> </i>  por <b>Dynamism</b></a>2019</div>
                </div>
            
        </footer> 
        
    </body>
</html>