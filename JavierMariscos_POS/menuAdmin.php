<?php
     
    require 'database.php';
    include 'dbConfig.php';


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


            elseif ($return == 'sinventas'){

              echo '<div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    ¡No se registraron Ventas el dia de ayer!</strong>
                   </div>';

                  $return ='success';
              }  



            elseif ($return == 'Entrada'){

              echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    ¡Bienvenido(a) '. $usuario . ' Tu Entrada ha sido registrada !  </strong>
                   </div>';

                  $return ='success';
              }  


            elseif ($return == 'Salida'){

              echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    ¡Hasta Mañana '. $usuario . ' Tu Salida ha sido registrada !  </strong>
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
    <a href="index.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>    
        <div class="container admin">
          <div class="row">
            <div class="col-sm-12">
                 <h1><strong>Menu de Administracion</strong></h1>
                   <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>    
                         <br>
                         <div class="col-xs-6 col-md-4" style="padding-top: 0px;">

                              <div class="content-box" style="background: #2196F3; width: 250px;height: 200px;">
                                <a href="caja/caja.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-65px; margin-left: 45px;">CAJA</span><img src="images/Iconos/pos.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                              </div>

                         </div>

                         <div class="col-xs-12 col-md-4" style="padding-top: 0px;">

                            <div class="content-box" style="background: #8BC34A;width: 250px;height: 200px;">
                              <a href="inventario/muestrainventario.php?user=<?php echo $usuario ?>&action=Insumos"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">INVENTARIO</span><img src="images/Iconos/estante.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                            </div>

                        </div>

                        <div class="col-xs-12 col-md-4" style="padding-top: 0px;">

                            <div class="content-box" style="background: #F57C00;width: 250px;height: 200px;">
                              <a href="admin/admin.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">ADMIN</span><img src="images/Iconos/administrador.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                            </div>

                        </div>

                        <div class="col-xs-12 col-md-4" style="padding-top: 10px;">

                            <div class="content-box" style="background: #FF5722;width: 250px;height: 200px;">
                              <a href="#" data-toggle="modal" data-target="#registraentrada"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">CHECADOR</span><img src="images/Iconos/reloj.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                            </div>

                        </div>

                        <div class="col-xs-12 col-md-4" style="padding-top: 10px;">

                            <div class="content-box" style="background: #BDBDBD;width: 250px;height: 200px;">
                              <a href="usuarios.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">CAMARAS</span><img src="images/Iconos/camaras.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                            </div>

                        </div>

                        <div class="col-xs-12 col-md-4" style="padding-top: 10px;">

                            <div class="content-box" style="background: #795548;width: 250px;height: 200px;">
                              <a href="usuarios.php?user=<?php echo $usuario ?>"><span style="color: white;font-size: xx-large; margin-top:-5px; margin-left: 15px;">NOMINAS</span><img src="images/Iconos/nominas.png" style="width: 100px; height:100px; padding: 0; margin-left: 30px;" alt=""></a>
                          </div>

                        </div>
                    </div>
          </div>
      </div>
    </div>
  </div>
            <!--Modal Checador-->
            <div class="modal fade" id="registraentrada" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle88" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">

                    <div class="modal-header">   
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>

                        <?php 

                            //Obtenemos el Id del Cajero
                            $query = $db->query("SELECT id FROM catUsers WHERE name = '".$usuario."'");

                            $custRow = $query->fetch_assoc();

                            $idCajero = $custRow['id']; 

                            //Validamos que no se haya registrado antes el mismo dia
                            $queryvalida = $db->query("SELECT id,horaentrada,horasalida FROM relojchecador WHERE idempleado = '".$idCajero."' AND CONVERT(fecha, DATE) = CURDATE() AND horasalida = '00:00:00'");
                            $custRow = $queryvalida->fetch_assoc();

                            $existe = $custRow['id']; 


                              if( $existe >= 1){

                                     echo '<h2 class="modal-title" id="exampleModalCenterTitle88" style="font-weight;bold;font-size:x-large;">Registro de Salida</h2>';

                              }else{

                                    echo '<h2 class="modal-title" id="exampleModalCenterTitle88" style="font-weight;bold;font-size:x-large;">Registro de Entrada</h2>';

                              }



                        ?>
                 
                   
                    </div>

                    <div class="modal-body">

                       <span style="font-size: large;font-weight: bold; color: red;">Usted sera registrado a la(s): </span><span style="font-size: xx-large;font-weight: bold;">
                         
                          <?php 

                            //Obtenemos la hora actual
                            $Hora = new DateTime('NOW', new DateTimeZone('America/Mexico_City'));
                            echo $Hora->format('h:i:s') . "\n";


                          ?>

                       </span>
                            <div class="modal-footer">
                              <?php 
                                 
                                 //Obtenemos el Id del Cajero
                                 $query = $db->query("SELECT id FROM catUsers WHERE name = '".$usuario."'");

                                 $custRow = $query->fetch_assoc();

                                 $idCajero = $custRow['id']; 

                                 //Validamos que no se haya registrado antes el mismo dia
                                 $queryvalida = $db->query("SELECT id,horaentrada,horasalida FROM relojchecador WHERE idempleado = '".$idCajero."' AND CONVERT(fecha, DATE) = CURDATE() AND horasalida = '00:00:00'");

                                 $custRow2 = $queryvalida->fetch_assoc();

                                 $existe = $custRow2['id']; 

                                 $HoraEnt = $custRow2['horaentrada']; 

                                 $HoraSal = $custRow2['horasalida']; 


                                 if($HoraEnt <> '00:00:00' & $HoraSal <> '00:00:00' & $existe <> NULL){

                                    echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';

                                 }else{



                                    if($existe >= 1){

                                      echo '<a class="btn btn-danger" href="checador/checadortransact.php?user='.$usuario.'&action=insertasalida">Registrar Salida</a>';
                                      echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';

                                    }else{

                                      echo '<a class="btn btn-success" href="checador/checadortransact.php?user='.$usuario.'&action=insertaentrada">Registrar Entrada</a>';
                                      echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';

                                    }


                                 }
                                 


                              ?>
                        
                            </div>
                            
                    </div>

                  </div>
                </div>
            </div>

          <!--Modal Checador-->
</body>
</html>