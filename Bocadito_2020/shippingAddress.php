<?php

    require 'admin/database.php';
 
    $nameError = $emailError = $phoneError = $addressError = $listboxError= $name = $email = $phone = $address = "";
                
 

    if(!empty($_POST)) 
    {
        $name              = checkInput(strtolower($_POST['name']));
        $email             = checkInput(strtolower($_POST['email']));
        $phone             = checkInput(strtolower($_POST['phone']));
        $address           = checkInput($_POST['address']); 
        $listbox           = checkInput(strtolower($_POST['medios'])); 
        $latitud           = checkInput(strtolower($_POST['latitud'])); 
        $longitud          = checkInput(strtolower($_POST['longitud'])); 

       
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($name)) 
        {
            $nameError = 'Este campo no puede estar vac&#237;o';
            $isSuccess = false;
        }
        if(empty($email)) 
        {
            $emailError = 'Este campo no puede estar vac&#237;o';
            $isSuccess = false;
        } 
        if(empty($phone)) 
        {
            $phoneError = 'Este campo no puede estar vac&#237;o';
            $isSuccess = false;
        } 
        if(empty($address)) 
        {
            $addressError = 'Este campo no puede estar vac&#237;o';
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
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO customers (name,email,phone,address,medio,latitud,longitud,status) values(?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($name,$email,$phone,$address,$listbox,$latitud,$longitud,1));
            Database::disconnect();
            header("Location: checkout.php");


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
        

                // Este ejemplo muestra un formulario de dirección, utilizando la función de autocompletar
                // de Google places API para ayudar a los usuarios rellenar la información.

                var placeSearch, autocomplete, autocomplete_textarea;
                var componentForm = {
                  street_number: 'short_name',
                  route: 'long_name',
                  locality: 'long_name',
                  administrative_area_level_1: 'short_name',
                  country: 'long_name',
                  postal_code: 'short_name'
                };

                function initialize() {
                  // Cree el objeto de autocompletado, restringiendo la búsqueda
                  autocomplete = new google.maps.places.Autocomplete(
                     (document.getElementById('address')),
                      { types: ['geocode'] });
                  // Cuando el usuario selecciona una dirección en el menú desplegable,
                  // rellena los campos de dirección en el formulario.
                  google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    fillInAddress();
                

                  });
                  
                  autocomplete_textarea = new google.maps.places.Autocomplete((document.getElementById('autocomplete_textarea')),
                      { types: ['geocode'] }
                  );
                  google.maps.event.addListener(autocomplete_textarea, 'place_changed', function() {
                    alert('initialize - fillInAddress_textarea');
                    fillInAddress_textarea();
                  });
                }

                function fillInAddress_textarea(){
                    alert('entro fillInAddress_textarea');
                    var place = autocomplete_textarea.getPlace();
                    console.log( place.formatted_address );
                    console.log( JSON.stringify(place) );
                    $('#autocomplete_textarea').val( place.formatted_address );
                }


                function fillInAddress() {

                    getCoords();
                  // Obtener los detalles de lugar el objeto de autocompletado.
                  var place = autocomplete.getPlace();
                  console.log( JSON.stringify(place) );
                  for (var component in componentForm) {
                    document.getElementById(component).value = '';
                    document.getElementById(component).disabled = false;
                  }

                  // Recibe cada componente de la dirección de los lugares más detalles
                  // y llena el campo correspondiente en el formulario.
                  for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                      var val = place.address_components[i][componentForm[addressType]];
                      document.getElementById(addressType).value = val;
                      alert(val);
                    }
                  }
                }



                //ubicación geográfica del usuario,

                function geolocate() {
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                      var geolocation = new google.maps.LatLng(
                          position.coords.latitude, position.coords.longitude);
                      var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy

                      });
                      autocomplete.setBounds(circle.getBounds());
                      autocomplete_textarea.setBounds(circle.getBounds());
                    });
                  }
                }

    </script>

    <script>
        
        
        // función que se ejecuta al pulsar el botón buscar dirección
        
          function getCoords() {

          // Creamos el objeto geodecoder
         var geocoder = new google.maps.Geocoder();

         address = document.getElementById('address').value;

         if(address!='')
         {
          // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
         geocoder.geocode({ 'address': address}, function(results, status)
         {
           if (status == 'OK')
           {

           var latitud = results[0].geometry.location.lat();
           var longitud = results[0].geometry.location.lng();


            // Mostramos las coordenadas obtenidas en el p con id coordenadas
           document.getElementById("latitud").value= latitud;
           document.getElementById("longitud").value= longitud;
            // // Posicionamos el marcador en las coordenadas obtenidas
            //    mapa.marker.setPosition(results[0].geometry.location);
            // // Centramos el mapa en las coordenadas obtenidas
            //    mapa.map.setCenter(mapa.marker.getPosition());
            //    agendaForm.showMapaEventForm();
           }
          });
         }
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
    <body onload="initialize()">

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
        <section class="home_banner_area_enviodatos .img-responsive">
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

                            <div class="title-envio col-md-12 col-xs-6">
                                    <p>DATOS DE ENVÍO</p>
                            </div>
                      
                      <div class="subtitle-envio col-xs-12 col-md-12">

                            <p>Enviando delicias hasta tu hogar.</p>

                      </div>
                      <br>
                    <form class="form" action="shippingAddress.php?coordenadas=$coordenadas" role="form" method="post" enctype="multipart/form-data" autocomplete="off">
                       <div class="container">
                          <div class="row">
                              <div class="col-md-6 col-xs-3">
                                  
                                  <input type="text" name="name" id="name" placeholder="Nombre" class="input-nombre" required autocomplete="off">

                              </div>
                              <div class="col-md-6 col-xs-3">
                                          <input type="text" name="email" id="email" placeholder="Correo Electronico" class="input-email" required autocomplete="off">
                              </div>
                              <div class="col-md-6 col-xs-3">

                                  <input type="text" name="phone" id="phone" placeholder="Telefono" class="input-tel" required autocomplete="off">

                              </div>

                              <div class="col-md-6 col-xs-3">

                                      <input type="text" name="address" id="address" placeholder="Direccion" class="input-direccion" onFocus="geolocate()" autocomplete="off" autocomplete="nope" required>

                              </div>
                               
                              <div class="col-md-6 col-xs-3" style="margin-left: 50px;">
                                    <select name="medios" class="select" required>
                                      <option value="" disabled selected>¿Como te enteraste de nosotros?</option>
                                      <option value="Facebook">Facebook</option>
                                      <option value="Instagram">Instagram</option>
                                      <option value="Google">Google</option>
                                      <option value="Google">Recomendacion</option>
                                      <option value="Google">Tienda</option>
                                    </select>
                              </div>

                              
                                  <input type="hidden" name="latitud" id="latitud">
                                  <input type="hidden" name="longitud" id="longitud">

                                <div class="btns-action col-sm-12 col-md-6">
                                  <a class="btn btnRegresar" href="tienda.php">Regresar</a>
                                </div>
                                <div class=" btns-action_Continuar col-sm-12 col-md-6" style="padding-bottom: 2%;">
                                  <button type="submit" class="btn btnContinuar">Continuar</button>
                                </div>

                           </div>
                        </div>
                    </form>
                    <br>
            </div>
        </div>   
         </div> 
                 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places&key=AIzaSyBE--rYma4BxE6a7W9gGt17UmbCQsfXj3A&callback=initMap"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"> </script>
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