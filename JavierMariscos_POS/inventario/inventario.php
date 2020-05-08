<?php
     
    require '../database.php';
    include '../dbConfig.php';


    $usuario  = $_GET['user'];

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
    <a href="../menuAdmin.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>    
        <div class="container admin">
          <div class="row">
            <div class="col-sm-12">
                 <h1><strong>Inventario</strong></h1>
                   <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>    
                         <br>
                         <div class="col-xs-6 col-md-4" style="padding-top: 0px;">

                              <div class="content-box" style="background: #ffcc00; width: 250px;height: 200px;">
                                <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Insumos"><span style="color: white;font-size: xx-large; margin-top:-65px; margin-left: 45px;">INSUMOS</span><img src="../images/Iconos/insumos.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                              </div>

                         </div>

                         <div class="col-xs-12 col-md-4" style="padding-top: 0px;">

                            <div class="content-box" style="background: #1978f7;width: 250px;height: 200px;">
                              <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Mariscos"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">MARISCOS</span><img src="../images/Iconos/mariscos.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                            </div>

                        </div>

                         <div class="col-xs-12 col-md-4" style="padding-top: 0px;">

                            <div class="content-box" style="background: #bfff00;width: 250px;height: 200px;">
                              <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Mobiliario"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">MOBILIARIO</span><img src="../images/Iconos/Cubiertos.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                            </div>

                        </div>

                        <div class="col-xs-12 col-md-4" style="padding-top: 5px;">

                            <div class="content-box" style="background: #d7023c;width: 250px;height: 200px;">
                              <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Bebidas"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">BEBIDAS</span><img src="../images/Iconos/invbebidas.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                            </div>

                        </div>


                        </div>

                    </div>
                
              <div class="form-actions" style="padding-top: 10px;">
                  <a class="btn btn-primary" href="../menuAdmin.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
             </div>
          </div>
      </div>
    </div>
  </div>
</body>
</html>