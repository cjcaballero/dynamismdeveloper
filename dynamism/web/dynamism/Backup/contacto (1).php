<?php
     
    require 'admin/database.php';
 
        $success = $comentariosError = $asuntoError = $nameError = $emailError = $phoneError = $addressError = $listboxError= $name = $email = $phone = $address = $asunto = $comentarios = "";

    if(!empty($_POST)) 
    {
        $name              = checkInput($_POST['name']);
        $email             = checkInput($_POST['email']);
        $phone             = checkInput($_POST['phone']);
        $address           = checkInput($_POST['address']); 
        $asunto            = checkInput($_POST['asunto']); 
        $comentarios       = checkInput($_POST['comentarios']); 
        $listbox           = checkInput($_POST['medios']); 
       
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($name)) 
        {
            $nameError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        if(empty($email)) 
        {
            $emailError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
        if(empty($phone)) 
        {
            $phoneError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
        if(empty($address)) 
        {
            $addressError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
         if(empty($asunto)) 
        {
            $asuntoError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        if(empty($comentarios)) 
        {
            $comentariosError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        if($listbox == 'Seleccione')
        {
            $listboxError = 'Debe Seleccionar una Opcion';
            $isSuccess = false;
        }
        else{

             $isSuccess = true;
        }
       
        if($isSuccess) 
        {
            if(isset($_POST['email'])) {

                    // Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
                    $email_to = "contacto@bocadito.mx";
                    $email_subject = "Contacto de la pagina Web BOCADITO";
            
                    // Aquí se deberían validar los datos ingresados por el usuario
                    if(!isset($_POST['name']) ||
                    !isset($_POST['email']) ||
                    !isset($_POST['phone']) ||
                    !isset($_POST['address']) ||
                    !isset($_POST['medios']) ||
                    !isset($_POST['asunto']) ||
                    !isset($_POST['comentarios'])) {
            
                    echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
                    echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
                die();
                 }
            
                    $email_message = "Datos del Cliente:\n\n";
                    $email_message .= "Nombre: " . $_POST['name'] . "\n";
                    $email_message .= "Email: " . $_POST['email'] . "\n";
                    $email_message .= "Teléfono: " . $_POST['phone'] . "\n";
                    $email_message .= "Direccion: " . $_POST['address'] . "\n";
                    $email_message .= "Se entero de nosotros por: " . $_POST['medios'] . "\n";
                    $email_message .= "Asunto: " . $_POST['asunto'] . "\n";
                    $email_message .= "Comentarios: " . $_POST['comentarios'] . "\n\n";
            
            
                    // Ahora se envía el e-mail usando la función mail() de PHP
                    $headers = 'From: '.$email_to."\r\n".
                    'Reply-To: '.$email_to."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    @mail($email_to, $email_subject, $email_message, $headers);

                    $success = "¡El formulario se ha enviado con éxito!";

                    $comentariosError = $asuntoError = $nameError = $emailError = $phoneError = $addressError = $listboxError= $name = $email = $phone = $address = $asunto = $comentarios = "";

                    header( "refresh:5;url=index.html" );
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

<!DOCTYPE html>
<html>
    <head>
        <title>Bocadito | Hechos con Amor&#174;</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/cwdialog.js"></script>
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

    
    <body>
        <div class="container">
      <a href="index.php"><div class="logo"></div></a>
         <div class="container admin">
            <div class="row">
                <h1 style="color: black; font-size: 36px;"><strong>Contacto</strong></h1>
                <br>                
                <form class="form" action="contacto.php" role="form" method="post" enctype="multipart/form-data" style="color: #666; font-family: sans-serif;font-weight: bold; padding-top: 10px;">
                    <span style="color: #10CC26; font-weight: bold;"><?php echo $success;?></span>
                    <div class="form-group">
                        <label for="name">Nombre Completo:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email;?>">
                        <span class="help-inline"><?php echo $emailError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono Celular</label>
                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Telefono" value="<?php echo $phone;?>">
                        <span class="help-inline"><?php echo $phoneError;?></span>
                    </div>
                   <div class="form-group">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Direccion" value="<?php echo $address;?>">
                        <span class="help-inline"><?php echo $addressError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto" value="<?php echo $asunto;?>">
                        <span class="help-inline"><?php echo $asuntoError;?></span>
                    </div>
                    <div class="form-group">
                       <label for="comentarios">Comentarios</label>
                        <input type="text" class="form-control" id="comentarios" name="comentarios" placeholder="Comentarios" value="<?php echo $comentarios;?>">
                        <span class="help-inline"><?php echo $comentariosError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="medios">¿Como te enteraste de nosotros?</label>
                            <select name="medios">
                              <option value="Seleccione">Seleccione</option>
                              <option value="Facebook">Facebook</option>
                              <option value="Instagram">Instagram</option>
                              <option value="Google">Google</option>
                            </select>
                        <span class="help-inline"><?php echo $listboxError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Enviar</button>
                        <a class="btn btn-primary" href="index.html"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
                </form>
            </div>
        </div>   
         </div> 
    </body>
</html>