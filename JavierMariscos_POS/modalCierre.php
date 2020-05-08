<?php

	$Fecha = $_GET['Fecha'];
	$FechaCorte = $_GET['FechaCorte'];
	$usuario  = $_GET['user'];

	
?>
<html lang="en">

<head>

        <title>Javier Mariscos | Los Originales desde 1980&#174;</title>
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


<script>
  window.console = window.console || function(t) {};
</script>

<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

</head>

<body style="background: rgba(0, 0, 0, 0.9);">

   <?php

	   require 'database.php';
	   include 'dbConfig.php';

                                  $db = Database::connect();

                                  $statement = $db->query('SELECT SUM(A.total) as Total, CONVERT(A.fecha, DATE) AS Fecha
                                                           FROM enccuenta A
                                                           WHERE CONVERT(A.fecha, DATE) = CURDATE() - 1 AND idestatus = 4');

                                  $statement2 = $db->query('SELECT SUM(A.pago) as TotalGastos
                                                       FROM gastosdiarios A
                                                       WHERE CONVERT(A.fecha, DATE) = CURDATE() - 1');

                                  while($item = $statement->fetch()) 
                                  {

                                      while($gastos = $statement2->fetch()) 
                                        {

                                              if ($item['Total']  > 0){


                                                  if(empty($gastos['TotalGastos'])){


                                                      $gastos['TotalGastos'] = 0;

                                                  }

                                                  $ventatotal = $item['Total'] ;
                                                  $TotalGastos = $gastos['TotalGastos'] ;

                                                  $TotalVentaDiaria = $item['Total'] - $gastos['TotalGastos'];


                                               }

                                        }

                                     
                                  }

                                  Database::disconnect();
                            ?>
<div style="  width: 60%;height: 40%;position: absolute;top: 0;left: 0;bottom: 0;right: 0;margin: auto;font-size: 1.5em;text-align: center;   color: #fff;">
<p> El corte de Caja del dia <span style="color: red;font-weight: bold;"><?php echo $FechaCorte; ?></span> no fue realizado</p>
<div class="col-xs-6 col-md-4" style="padding-top: 0px; width: 60%;height: 40%;position: absolute;top: 0;left: 0;bottom: 0;right: 0;margin: auto;font-size: 1.5em;text-align: center;   color: #fff;">
                
<a href="Caja/InsertaitemCuenta.php?user=<?php echo $usuario?>&action=generacorteatrasado&ventatotal=<?php echo $ventatotal ?>&gastostotales=<?php echo $TotalGastos ?>&gananciatotal=<?php echo $TotalVentaDiaria; ?>&Fecha=<?php echo $Fecha?>&$FechaCorte=<?php echo $FechaCorte ?>"><div class="content-box" style="background:#00a9ce; width: 250px;height: 180px;">
  <span style="color: white;font-size: xx-large; margin-top:-65px;text-align: center;margin-left:5px;">REALIZAR CORTE</span>
<img src="images/Iconos/check.png" style="width: 80px; height:80px; margin-left: 20px;" alt=""></a>

</div>

<div class="col-xs-6 col-md-4" style="padding-top: 0px; width: 60%;height: 40%;position: absolute;top: -71px;left: 280px;bottom: 0;right: 0;margin: auto;font-size: 1.5em;text-align: center;   color: #fff;">
<a href="index.php"><div class="content-box" style="background:#EC6104; width: 250px;height: 180px;">
  <span style="color: white;font-size: xx-large; margin-top:-65px;text-align: center;margin-left:5px;">IR AL INICIO</span>
<img src="images/Iconos/left-arrow.png" style="width: 80px; height:80px; margin-left: 20px;" alt=""></a>

</div> 

</div>
</div>

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script id="rendered-js">
      // Look mom! without js!
      //# sourceURL=pen.js
    </script>


</body></html>