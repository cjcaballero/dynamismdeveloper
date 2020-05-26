<?php
     
    require 'database.php';


    $usuario  = $_GET['user'];


    if($usuario == 'Carlos Caballero' || $usuario == 'Joel Caballero'){
        

        $none = 'block';

    }
    else{

        $none = 'none';
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
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="apple-touch-icon" sizes="57x57" href="../images/Favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../images/Favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../images/Favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../images/Favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../images/Favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../images/Favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../images/Favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../images/Favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../images/Favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../images/Favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/Favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../images/Favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/Favicon/favicon-16x16.png">
        <link rel="manifest" href="../images/Favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="../images/Favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
    </head>

        <style>
        	
			@import url("https://fonts.googleapis.com/css?family=Montserrat:900");

			.cuadro {
				width: 200px;
				height: 100px;
				padding: 50px;
				margin: 0 auto;
				opacity: 0.5;
				font-family: 'Montserrat', sans-serif;
			}

			.content-box { 
				box-sizing: content-box; 
				font-family: 'Montserrat', sans-serif;
				
			}

			.border-box { 
				box-sizing: border-box;
				font-family: 'Montserrat', sans-serif;
			}


        </style>
</head>
<body>
	<div class="container">
		<a href="index.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>    
        <div class="container admin">
        	<div class="row">
                   <div class="col-sm-12">
			        	 <h1><strong>Control Panel</strong></h1>
			             <div style="text-align: right; font-weight: bold;"><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>    
                         <br>
                         <div class="col-xs-6 col-md-4" style="display: <?php echo $none ?>">

        						<div class="content-box" style="background: #448AFF; width: 250px;height: 200px;">
        							<a href="index.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-65px; margin-left: 15px;">Productos</span><img src="../images/Iconos/menu.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
        						</div>

                         </div>
                         <div class="col-xs-12 col-md-4">

        						<div class="content-box" style="background: #4CAF50;width: 250px;height: 200px;">
        							<a href="pedidos.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">Pedidos</span><img src="../images/Iconos/orden.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
        						</div>

                        </div>
                        <div class="col-xs-6 col-md-4" style="display: <?php echo $none ?>;">

    						<div class="content-box" style="background: #FF5252;width: 250px;height: 200px;">
    							<a href="usuarios.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">Usuarios</span><img src="../images/Iconos/usuario.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
    						</div>

                        </div>
                    </div>
					</div>
			</div>
		</div>
	</div>
</body>
</html>