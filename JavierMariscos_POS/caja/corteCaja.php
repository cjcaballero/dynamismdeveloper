<?php
     
    require '../database.php';
    include '../dbConfig.php';

    $Fecha = date("d/m/Y");  

    $usuario  = $_GET['user'];
    $return  = 'notok';

      if(!empty($_GET['return'])) {

          $return  = $_GET['return'];

           if ($return == 'ok'){

              echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    El Corte se realizo Correctamente!</strong>
                   </div>';

                  $return ='success';


              } 

            elseif ($return == 'fail'){

              echo '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    ¡El Corte ya fue realizado el dia de hoy!</strong>
                   </div>';

                  $return ='success';
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
        <!--Sweet Alert-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
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

      <script>
          window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 4000);
      </script>

</head>
<body>
  <div class="container">
    <a href="../index.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>    
        <div class="container admin">
          <div class="row">
                   <div class="col-sm-12">
                 <h1><strong>Corte de Caja</strong></h1>
                   <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="../logout.php">Cerrar Sesion</a></span></div>    
                         <br>
                              <?php


                                  $db = Database::connect();

                                  $statement = $db->query('SELECT SUM(A.total) as Total, CONVERT(A.fecha, DATE) AS Fecha
                                                           FROM enccuenta A
                                                           WHERE CONVERT(A.fecha, DATE) = CURDATE() AND idestatus = 4');

                                  $statement2 = $db->query('SELECT SUM(A.pago) as TotalGastos
                                                       FROM gastosdiarios A
                                                       WHERE CONVERT(A.fecha, DATE) = CURDATE()');

                                  while($item = $statement->fetch()) 
                                  {

                                      while($gastos = $statement2->fetch()) 
                                        {

                                              if ($item['Total']  > 0){


                                                  if(empty($gastos['TotalGastos'])){


                                                      $gastos['TotalGastos'] = 0;

                                                  }

                                                  
                                                  $TotalVentaDiaria = $item['Total'] - $gastos['TotalGastos'];
                                                  $Total = $item['Total'] ;
                                                  $TotalGastos = $gastos['TotalGastos'];

                                                  if ($return != 'ok'){

                                                    echo '<div class="col-xs-6 col-md-4" style="padding-top: 0px;">
                
                                                    <a href="#" data-toggle="modal" data-target="#generacorte"><div class="content-box" style="background:#00a9ce; width: 250px;height: 180px;">
                                                      <span style="color: white;font-size: xx-large; margin-top:-65px;text-align: center;margin-left:5px;">CORTE DE CAJA</span>
                                                   <img src="../images/Iconos/check.png" style="width: 80px; height:80px; margin-left: 20px;" alt=""></a>
                                                    </div> </div>';


                                                  }

               

                                                  echo '<div class="col-xs-6 col-md-4" style="padding-top: 0px;">
                
                                                  <div class="content-box" style="background: #78be20; width: 250px;height: 180px;">
                                                    <span style="color: white;font-size: xx-large; margin-top:-65px;text-align: center;margin-left:5px;">VENTA TOTAL</span>
                                                    <span style="color: red;font-size: xx-large; margin-top:-65px;text-align: center; margin-left:5px;">$'.$item['Total'].'</span><img src="../images/Iconos/ventadia.png" style="width: 80px; height:80px; margin-left: 40px;" alt="">
                                                  </div> </div>';

                                                     
                                                  echo '<div class="col-xs-6 col-md-4" style="padding-top: 0px;">
                
                                                  <div class="content-box" style="background: #8a1538; width: 250px;height: 180px;">
                                                    <span style="color: white;font-size: xx-large; margin-top:-65px;text-align: center;margin-left:5px;">GASTOS DEL DIA</span>
                                                    <span style="color: red;font-size: xx-large; margin-top:-65px;text-align: center; margin-left:5px;">$'.$gastos['TotalGastos'].'</span><img src="../images/Iconos/gastos.png" style="width: 80px; height:80px; margin-left: 40px;" alt="">
                                                  </div> </div>';

                                                      
                                                  echo '<div class="col-xs-6 col-md-4" style="padding-top:8px;">
                
                                                  <div class="content-box" style="background:#fae100; width: 250px;height: 180px;">
                                                    <span style="color: white;font-size: xx-large; margin-top:-65px;text-align: center;margin-left:5px;">GANANCIAS</span>
                                                    <span style="color: red;font-size: xx-large; margin-top:-65px;text-align: center; margin-left:5px;">$'. $TotalVentaDiaria .'</span><img src="../images/Iconos/dinero.png" style="width: 80px; height:80px; margin-left: 40px;" alt="">
                                                  </div> </div>';


                                               }else{

                                                   echo '<tr>';

                                                   echo '<span style="font-weight:bold;text-align:center; margin-left:15px;">Aun no se han registrado Ventas el dia de hoy...</span>';
                                                    
                                                   echo '</tr>';

                                              }


                                        }

                                     
                                  }

                                  Database::disconnect();
                            ?>

                    </div>
          </div>
          <br>

              <div class="form-actions">
                  <a class="btn btn-primary" href="caja.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
             </div>

      </div>
    </div>
  </div>

      <!--Modal Corte de Caja-->
      <div class="modal fade" id="generacorte" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle9" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

              <div class="modal-header">   
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <h2 class="modal-title" id="exampleModalCenterTitle9" style="font-weight;bold;font-size:x-large;">Generar Corte de Caja</h2>
             
              </div>

              <div class="modal-body">
                <?php

                  $db = Database::connect();

                   //Validamos si el cierre ya se realizo
                   $query = $db->query("SELECT id FROM cierrediario WHERE CONVERT(fecha, DATE) = date('d-m-Y')");
                        
                        $idcierre = 0;

                        while($custRow = $query->fetch()) 
                        {
                            
                            $idcierre = $custRow['id']; 

                        }



                     if ($idcierre > 0 || !empty($idcierre)){

                        echo '<img src="../images/Iconos/exito.png" style="width: 150px;height: 150px;margin-left: 200px;"> </br>   
                         </br>
                        <span style="font-size:20px;font-weight: bold; color: black;margin-left: 60px;">¡El Corte de HOY '.$Fecha.' ya fue realizado! </span><span style="font-size: xx-large;font-weight: bold;"></span></br>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>';

                     }else{

                        echo '<img src="../images/Iconos/warning.png" style="width: 150px;height: 150px;margin-left: 200px;"> </br>
                              <span style="font-size:25px;font-weight: bold; color: red;margin-left: 20px;">¿Seguro que desea Generar el Corte del dia? </span><span style="font-size: xx-large;font-weight: bold;"></span></br>
                              <span style="font-size:25px;font-weight: bold; color:black;margin-left: 220px;">'.$Fecha.'</span>
                             <p style="text-align: center;font-weight: bold; color: #AEAEAE;">Al Generar el corte,Cerrara automaticamente las ventas del Dia en curso.</p>

                              <div class="modal-footer">
                                <a class="btn btn-danger" href="InsertaitemCuenta.php?user='.$usuario.'&action=generacorte&ventatotal='.$Total.'&gastostotales='.$TotalGastos.'&gananciatotal='.$TotalVentaDiaria.'">Generar Corte</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>';

                     }

                ?>
   
          
              </div>

            </div>
          </div>
      </div>

<!--Modal Eliminar-->
</body>
</html>