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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bocadito | Hechos con Amor&#174;</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <style>
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>

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
    <h1>Tu Orden es la Siguiente:</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
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
            <td><?php echo '$'.$item["price"].' MXN'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' MXN'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No cuentas con Productos en tu Carrito :(......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' MXN'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4 style="font-weight: bold; color: #32C1E8;">Aqui entregaremos tu Orden:</h4>
        <div style="color: #666">
        <p><?php echo $custRow['name']; ?></p>
        <p><?php echo $custRow['phone']; ?></p>
        <p style="font-weight: bold;"><?php echo $custRow['address']; ?></p>
        </div>
    </div>
    <div class="footBtn">
        <a href="tienda.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Continuar Comprando</a>
        <a href="cartAction.php?action=placeOrder&email=<?php echo $_SESSION['Email']; ?>" class="btn btn-success orderBtn">Finalizar Orden<i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
    </div>
    </div>
</div>
</body>
</html>