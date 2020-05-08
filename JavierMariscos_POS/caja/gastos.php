<!DOCTYPE html>
<html>
    <head>

    <?php 

      $usuario  = $_GET['user'];

      if(!empty($_GET['Total'])) {

        $return  = $_GET['return'];

      }
           
    ?>

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
          
          window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
          }, 4000);
      
        </script>

    </head>
    
    <body>
        <div class="container">
            <a href="../menuadmin.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>           
                <div class="container admin">
                  <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="../logout.php">Cerrar Sesion</a></span></div>
                  <div class="row">
                            <h1><strong>Gastos del Dia</strong>  <a href="generagasto.php?user=<?php echo $usuario ?>" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Agregar Gasto</a> </h1> 

                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Concepto</th>
                            <th style="text-align: center;">Total</th>
                            <th style="text-align: center;">Abono</th>
                            <th style="text-align: center;">por Pagar</th>
                            <th style="text-align: center;">Comentarios</th>
                            <th style="text-align: center;">TipoGasto</th>
                            <th style="text-align: center;">Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php

                              require '../database.php';

                              $db = Database::connect();

                              $statement = $db->query('SELECT A.id, B.name as Cajero, Concepto, total, abono, comentarios, C.nombre                       as TipoGasto, CONVERT(A.fecha, DATE) as fecha, (total - abono) as porpagar
                                                        
                                                       FROM gastosdiarios A 
                                                       LEFT JOIN catUsers B ON A.idCajero = B.id
                                                       INNER JOIN catTipoGastos C ON A.idTipoGasto = C.id
                                                       WHERE CONVERT(A.fecha, DATE) = CURDATE() ORDER BY C.id ASC');

                              while($item = $statement->fetch()) 
                              {

                                  if($item['id'] > 0){                                   
                              
                                        
                                      echo '<tr>';
                                      echo '<td style="font-weight:bold;text-align:center;">'. $item['Concepto'] . '</td>';
                                      echo '<td style="text-align:center;font-weight:bold">$'. $item['total'] . '</td>';
                                      echo '<td style="text-align:center;">$'. $item['abono'] . '</td>';
                                      if  ($item['abono']  > 0){

                                           echo '<td style="text-align:center;">$'. $item['porpagar'] . '</td>';

                                      }else{


                                             echo '<td style="text-align:center;">--</td>';

                                      }
                                     
                                      echo '<td style="text-align:center;">'. $item['comentarios'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['TipoGasto'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['fecha'] . '</td>';
                                      echo '</tr>';
                              
                                }else{


                                   echo '<tr>';

                                   echo '<td style="font-weight:bold;text-align:center;">No se encontraron registros...</td>';
                                    
                                   echo '</tr>';

                                }

                          }
                                   $totals = $db->query('SELECT SUM(A.Total) as TotalGastos
                                                       FROM gastosdiarios A 
                                                       LEFT JOIN catUsers B ON A.idCajero = B.id
                                                       INNER JOIN catTipoGastos C ON A.idTipoGasto = C.id
                                                       WHERE CONVERT(A.fecha, DATE) = CURDATE() ORDER BY C.id ASC');

                                     while($values = $totals->fetch()) {

                                              echo '<table style="width: 100%; text-align:right;margin-top:-15px;">'; 
 
                                              echo '<tr>';

                                              echo '<td style="font-weight:bold;text-align:right;font-size:20px;color:red;">TOTAL GASTOS:'.'$'. $values['TotalGastos'] . '</td>';
                                                
                                              echo '</tr>';

                                              echo '</table>';

                                      }


                              Database::disconnect();
                            ?>
                        </tbody>
                      </table>
                  </div>
                    <div class="form-actions">
                        <a class="btn btn-primary" href="caja.php?user=<?php echo $usuario ?>&"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
               </div>
        </div>
    </body>
</html>
