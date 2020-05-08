<!DOCTYPE html>
<html>
    <head>

    <?php 


      $usuario  = $_GET['user'];

      if(!empty($_GET['action'])) 
      {


          $action  = $_GET['action'];


          if ($action == 'porPagar'){


              $idestatus = 3;


          }
          else if ($action == 'Pagadas'){


              $idestatus = 4;

          }
          else{


              $idestatus = 5;


          }
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
            <a href="../menuadmin.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>           
                <div class="container admin">
                  <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="../logout.php">Cerrar Sesion</a></span></div>
                  <div class="row">
                      <h1><strong>Nueva Cuenta</strong></h1>
                          <div class="form-group">
                           
                              <?php


                                 require '../database.php';

                                 $db = Database::connect();

                                      $statement = $db->query('SELECT * FROM cattipocuenta CP');
                                      while($item = $statement->fetch()) 
                                      {
                                         

                                          echo '<div class="col-xs-6 col-md-4" style="padding-top: 5px;">';
                                          echo '<div class="content-box" style="background:'. $item['color'] . '; width: 250px;height: 200px; border-radius:5px;">';
                                          echo '<a href="InsertaitemCuenta.php?user='.$usuario.'&action='. $item['nombre'] . '&Id='. $item['id'] . '&delivery=no"><span style="color: white;font-size: xx-large;margin-left: 10px; line-height: 65px; text-transform: uppercase; font-weight:bold;">'. $item['nombre'] . '</span><img src='. $item['imagen'] . ' style="width: 100px; height:100px;margin-left:65px;margin-top:-15px;"></a>';
                                          echo '</div>';
                                          echo '</div>';
                                
                                         
                                      }

                                 Database::disconnect();

                              ?>
                       
                              
                        </div>
                  </div>
                    <div class="form-actions" style="padding-top: 25px;">
                        <a class="btn btn-primary" href="caja.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
               </div>
        </div>
    </body>
</html>
