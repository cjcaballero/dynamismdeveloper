<?php
     
    require 'admin/database.php';
 
    $nameError = $emailError = $phoneError = $addressError = $listboxError= $name = $email = $phone = $address = "";
                

    $latitud = $_COOKIE["latitud"];
    $longitud = $_COOKIE["longitud"];
    $precition = $_COOKIE["precition"];

    if(!empty($_POST)) 
    {
        $name              = checkInput($_POST['name']);
        $email             = checkInput($_POST['email']);
        $phone             = checkInput($_POST['phone']);
        $address           = checkInput($_POST['address']); 
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
            $statement = $db->prepare("INSERT INTO customers (name,email,phone,address,medio,latitud,longitud,precition) values(?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($name,$email,$phone,$address,$listbox,$latitud,$longitud,$precition));
            Database::disconnect();
            header("Location: checkout.php?longitud=$longitud&latitud=$latitud");


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
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
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
         <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

    <script type="text/javascript">

            var watchId;
            var mapa = null;
            var mapaMarcador = null;    

            if (navigator.geolocation) {
                watchId = navigator.geolocation.watchPosition(mostrarPosicion, mostrarErrores, opciones);   
            } else {
                alert("Tu navegador no soporta la geolocalización, actualiza tu navegador.");
            }

            function mostrarPosicion(posicion) {
                var latitud = posicion.coords.latitude;
                var longitud = posicion.coords.longitude;
                var precision = posicion.coords.accuracy;


                 document.cookie ='latitud='+latitud+'; expires=Thu, 2 Aug 3000 20:47:11 UTC; path=/';
                 document.cookie ='longitud='+longitud+'; expires=Thu, 2 Aug 3000 20:47:11 UTC; path=/';
                 document.cookie ='precition='+precision+'; expires=Thu, 2 Aug 3000 20:47:11 UTC; path=/';

                var miPosicion = new google.maps.LatLng(latitud, longitud);

                // Se comprueba si el mapa se ha cargado ya 
                if (mapa == null) {
                    // Crea el mapa y lo pone en el elemento del DOM con ID mapa
                    var configuracion = {center: miPosicion, zoom: 16, mapTypeId: google.maps.MapTypeId.HYBRID};
                    mapa = new google.maps.Map(document.getElementById("mapa"), configuracion);

                    // Crea el marcador en la posicion actual
                    mapaMarcador = new google.maps.Marker({position: miPosicion, title:"Esta es tu posición"});
                    mapaMarcador.setMap(mapa);
                } else {
                    // Centra el mapa en la posicion actual
                    mapa.panTo(miPosicion);
                    // Pone el marcador para indicar la posicion
                    mapaMarcador.setPosition(miPosicion);
                }
            }

            function mostrarErrores(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert('Permiso denegado por el usuario'); 
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert('Posición no disponible');
                        break; 
                    case error.TIMEOUT:
                        alert('Tiempo de espera agotado');
                        break;
                    default:
                        alert('Error de Geolocalización desconocido :' + error.code);
                }
            }

            var opciones = {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 1000
            };

            function detener() {
                navigator.geolocation.clearWatch(watchId);
            }
    </script>

    </head>
    
    <body>
        <div class="container">
      <a href="index.php"><div class="logo"></div></a>
         <div class="container admin">
            <div class="row">
                <h1><strong>Datos de Envio</strong></h1>
                <br>
                <form class="form" action="shippingAddress.php" role="form" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefono" value="<?php echo $phone;?>">
                        <span class="help-inline"><?php echo $phoneError;?></span>
                    </div>
                   <div class="form-group">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Direccion" value="<?php echo $address;?>">
                        <span class="help-inline"><?php echo $addressError;?></span>
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
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Agregar</button>
                        <a class="btn btn-primary" href="viewCart.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
                </form>
            </div>
        </div>   
         </div> 
    </body>
</html>