<!DOCTYPE html>
<html>
    <head>

    <?php 

      $usuario  = $_GET['user'];

      if(!empty($_GET['action'])) 
      {


          $action  = $_GET['action'];

          $idestatus = "";


            if ($action == 'porPagar'){


                $idestatus = 3;


            }
            else if ($action == 'Pagadas'){


                $idestatus = 4;

            }
            else if ($action == 'Canceladas'){


                $idestatus = 5;

            }
            else{


                $idestatus = 0;


            }

      }

      
    ?>

        <title>Javier Mariscos | Los Originales desde 1980&#174;</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/jquery.min.js"></script>
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
          
          window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
          }, 4000);
      
        </script>
        <style type="text/css">
        .pagina {
         padding:8px 16px;
         border:1px solid #ccc;
         color:#333;
         font-weight:bold;

        }
      </style>

       
        <script type="text/javascript" src="js/jquery.scrollExtend.js"></script>
        <script type="text/javascript">
        $(document).ready(function()
        {
            $('#infinite_scroll').scrollExtend(
            {
                'target': '#lista',
        'loadingIndicatorEnabled':true,
            'loadingIndicatorClass':'scrollExtend-loading',
                'url': 'scroll.php',
            });
        });
        </script>
       
        <style>
          li{
            list-style:none;
            margin:21px 0;
            border:3px solid #ddd;
            padding:21px;
            font-size:13px
            }
          .scrollExtend-loading {
            height: 32px;background-image:url('images/loading.gif');
            background-position: center center;background-repeat: no-repeat
            }
        </style>

    </head>
    
    <body>
        <div class="container">
            <a href="../menuadmin.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>           
                <div class="container admin">
                  <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="../logout.php">Cerrar Sesion</a></span></div>
                  <div class="row">
                      <h1><strong>Cuentas</strong>  <a href="tipocuenta.php?user=<?php echo $usuario ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> Nueva Cuenta</a>  <a href="cuentas.php?user=<?php echo $usuario ?>&action=porPagar" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-check"></span> Por Pagar</a>  <a href="cuentas.php?user=<?php echo $usuario ?>&action=Pagadas" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok"></span> Pagadas</a>  <a href="cuentas.php?user=<?php echo $usuario ?>&action=Canceladas" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove"></span> Canceladas</a>   <a href="croquisComedor.php?user=<?php echo $usuario ?>" class="btn btn-success btn-lg" style="background-color: #011f4b;"><span class="glyphicon glyphicon-cutlery"></span> Croquis Mesas</a></h1> 

                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th style="text-align: center;">#Cuenta</th>
                            <th style="text-align: center;">Cliente</th>
                            <th style="text-align: center;">Mesa/Banco</th>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php

                              require '../database.php';
                              $db = Database::connect();

                              $statement = $db->query('SELECT DISTINCT A.id,C.nombre as Cliente, A.mesaBanco, A.horapedido,
                                                       CONVERT(A.fecha, DATE) AS fecha , D.nombre as Status     
                                                       FROM enccuenta A 
                                                       LEFT JOIN detcuenta B ON A.id = B.idCuenta
                                                       LEFT JOIN catclientes C ON A.idCliente = C.id
                                                       LEFT JOIN catstatus D ON A.idestatus = D.id
                                                       WHERE CONVERT(A.fecha, DATE) = CURDATE() AND A.idestatus = "'.$idestatus.'" LIMIT 0, 10');


                              while($item = $statement->fetch()) 
                              {

                                  if($idestatus > 0){                                   
                              
                                      echo '<tr>';
                                      echo '<td style="font-weight:bold;text-align:center;">'. $item['id'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['Cliente'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['mesaBanco'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['fecha'] . '</td>';

                                      if ($item['Status'] == 'Nopagada'){


                                          $item['Status'] = 'Por Pagar';

                                      }
                                      
                                      echo '<td style="text-align:center;font-weight:bold">'. $item['Status'] . '</td>';
                                      
                                      echo '<td width=100>';

                                      //Validamos que tenga mesa asignada en Comedor
                                      if (!empty($item['mesaBanco'])){


                                        echo '<a class="btn btn-info" alt="Ticket" href="ticketPOS.php?idCuenta='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-print"></span></a>';
                                        echo '<a class="btn btn-primary" alt="Cuenta" href="pos.php?idCuenta='.$item['id'].'&user='.$usuario.'&statusCuenta='. $item['Status'] . '"><span class="glyphicon glyphicon-list"></span></a>';


                                      }else{
                                      
                                          echo '<a class="btn btn-info" href="ticketPOS.php?idCuenta='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-print"></span></a>';
                                          echo '<a class="btn btn-primary" href="croquisComedor.php?idCuenta='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-list"></span></a>';

                                      }

                                      echo '</td>';
                                      echo '</tr>';
                              
                                  }else{


                                     echo '<tr>';

                                     echo '<td style="font-weight:bold;text-align:center;">No se encontraron registros...</td>';
                                      
                                     echo '</tr>';

                                  }

                              }
                                
                                Database::disconnect();
                            ?>
                        </tbody>
                      </table>
 
                  </div>
                    <div class="form-actions">
                        <a class="btn btn-primary" href="caja.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
               </div>
        </div>
    </body>
</html>
