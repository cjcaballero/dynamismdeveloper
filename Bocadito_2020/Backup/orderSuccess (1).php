<?php
$email= "";
 
include 'dbConfig.php';
 

if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
else
{
   
             
       $id= $_REQUEST['id'];
        $email= $_GET['email'];

        $query = $db->query("SELECT * FROM orders A INNER JOIN customers B ON A.customer_id = B.id WHERE A.id = $id");

        $custRow = $query->fetch_assoc();

        

            //Enviamos Confirmacion y detalles del pedido al Cliente
            $email_to = $email;
            $email_subject = "Detalles de tu Pedido - BOCADITO";    


        //Enviamos Confirmacion y detalles del pedido al Cliente
            $email_to = $email;
            $email_subject = "Detalles de tu Pedido - BOCADITO";    
                    
            $email_message = "Datos del Cliente:\n\n";
            $email_message .= "Nombre: " . $custRow['name'] . "\n";
            $email_message .= "Email: " . $custRow['email'] . "\n";
            $email_message .= "Teléfono: " . $custRow['phone'] . "\n";
            $email_message .= "Direccion: " . $custRow['address'] . "\n";
            $email_message .= "Se entero de nosotros por: " . $custRow['medios'] . "\n";
            $email_message .= "Asunto: " . $custRow['asunto'] . "\n";
            $email_message .= "Comentarios: " . $custRow['comentarios'] . "\n\n";
            
            //para el envío en formato HTML 
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            
            $headers = 'Detalles de tu Pedido BOCADITO '.' <contacto@bocadito.mx>'."\r\n".
            'Reply-To: '.$email_to."\r\n" .
            'X-Mailer: PHP/' . phpversion();
            @mail($email_to, $email_subject, $email_message,$headers);
}
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title>Bocadito | Hechos con Amor&#174;</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    p{color: #34a853;font-size: 18px;}
    </style>
    
    <meta http-equiv="Refresh" content="5;url=index.php">
    
</head>
</head>
<body>
<div class="container">
    <a href="index.php"><div class="logo"></div></a>
         <div class="container admin">
            <div class="row">
    <h1>Tu Pedido va en Camino...</h1>
    <p style="font-weight: bold; color: #32C1E8">¡La Orden #<?php echo $_GET['id']; ?> fue generada Exitosamente!</p>
    <img src="images/delivery.gif" alt="Delivery Bocadito">
    <p style="padding-top: 25px; color:#666;">¿Tienes alguna duda o Comentario? - ¡Llamanos con gusto te atenderemos! Lineas Directas: <span style="font-weight: bold;">287-87-00 y 290-9890</span><br/>o escribenos al correo: <span style="font-weight: bold; color: #32C1E8"><a href="mailto:atencionaclientes@bocadito.com.mx"/>atencionaclientes@bocadito.com.mx</span></p>
    <p style="color: black;">Siguenos en Redes Sociales: <span><img src="images/face.png"  style="width: 40px; height: 40px;" alt="Facebook">
	<?php header( "refresh:5;url=index.php" ); ?>
</span></p>
	</div>
	</div>
</div>
</body>
</html>