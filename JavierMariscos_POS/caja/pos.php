  <?php
     
    require '../database.php';
    // Requerimos el archivo autoload dentro de la carpeta 'vendor' para poder usar el SDK
    require '../extensiones/vendor/autoload.php';

    $usuario  = $_GET['user'];
    $delivery = '';
  
    if(!empty($_GET['statusCuenta'])) 
    {
         

          $muestracancelado = 'none';
          $muestrapagado = 'none';
          $muestradiv = 'none'; 

          $statusCuenta  = $_GET['statusCuenta'];

          if ($statusCuenta == 'Pagada'){


            $muestradiv = 'none';
            $muestrapagado = 'block';
            $muestracancelado = 'none';

          }


          else if ($statusCuenta == 'Cancelada'){


            $muestradiv = 'none';
            $muestracancelado = 'block';
            $muestrapagado = 'none';

          }

           else if ($statusCuenta == 'Por Pagar'){

            $muestradiv = 'block';
            $muestracancelado = 'none';
            $muestrapagado = 'none';

          }


    }

    
    if(!empty($_GET['idCuenta'])) 
    {

          $idCuenta  = $_GET['idCuenta'];
          //unset($_COOKIE['Pagacon']);

    }

    if(!empty($_GET['action'])) 
    {
        $action  = $_GET['action'];
    }

    if(!empty($_GET['delivery'])) 
    {

         echo $delivery = $_GET['delivery'];
          //unset($_COOKIE['Pagacon']);

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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


  <script>
  function myFunction() {
    var x, text;

    // Get the value of the input field with id="numb"
    Monto = document.getElementById("monto").value; //x
    Total = document.getElementById("total").innerHTML; //y

    GranTotal = Total.substr(1,3); //Total a pagar

      // If x is Not a Number or less than one or greater than 10
      if (isNaN(Monto) || Monto <= 1 ) {
        
        swal("Ups!","¡Debe Capturar un monto de pago!","warning");
        
        return false;

      }else if(parseInt(Monto) < parseInt(GranTotal) ){

        swal("Mmmm..!!","¡El Monto de Pago debe ser Mayor o Igual al Total a Pagar!","warning");

        return false;

      }else {

         //$('#myModal').modal('show'); 

        return true;

      }
  }
  </script>

  <script type="text/javascript">
    

     function Cancel() {

            swal({
              
              title: "Wow!",
              text: "Message!",
              type: "error",
              confirmButtonText: "OK"

            },
            function(isConfirm){
              if (isConfirm) {

                window.location.href = "//stackoverflow.com";
                return true;

              }else{

                return false;

              }
            }); 

          }, 1000;

  </script>

<script>
    
    //Funcion Tabs Modal Pago

    function openCity(evt, cityName) {
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

</script>



    </head>

    <style>
        
        #caja{

                margin-top: 5px;    
                border-color:black; 
                width:40%; 
                height: 720px; 
                color: #000; 
                background-color: #fff;
                border-radius: 5px;
                border-style: solid;
                border-width: 3px;
                margin-left: -79px;

              }

        #cajaproductos{

              margin-top: -720px;
              border-color:black;
              border-style: solid;
              border-width: 3px;
              width:75%; 
              float: right; 
              height: 720px; 
              color: #fff; 
              background-color: #fff;
              border-radius: 5px;
              margin-right: -93px;
              overflow-x:hidden;
              overflow-y:hidden;

            }
      .logopos{
       
             margin-top: 5px;
             text-align: center;
        }

    </style>

    <style>
          
          /* Style the tab Modal Pago */
          .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
          }

          /* Style the buttons that are used to open the tab content */
          .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
          }

          /* Change background color of buttons on hover */
          .tab button:hover {
            background-color: #ddd;
          }

          /* Create an active/current tablink class */
          .tab button.active {
            background-color: #ccc;
          }

          /* Style the tab content */
          .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
          }

    </style>
    <style>
      
      button.mercadopago-button {
        
        width: 130px; 
        height: 80px;
        background-color: #f97300;
        margin-left: 15px;
        font-weight: bold; 
        font-size: 15px;
        background-image: url("../images/Iconos/redu.png");
      
      }

      button>span.mercadopago-button{

        margin-top: 155px; line-height: 60px; font-weight: bold; font-size: 15px;

      }
      
      button>img.mercadopago-button{

          width:30px;
          height: 30px;
          background-size: cover;
         background-position: center;
         display: inline-block;

      }
      background-image.mercadopago-button{

         width: 80px; 
        height: 80px;
      }

    </style>


</head>
<body>
  <div class="container">
  

      <div id="caja" class="table-responsive col-xs-12 col-md-12">    


          <div class="logopos">

            <img src="../images/Logo/Logo_sm.png" alt="JavierMariscos" style="width: 100px;">  

          </div>

          <div class="col-xs-6 col-md-12 table-responsive-xs table-responsive-md">
                <table class="table table-striped" style="width: 100%; margin-left: 8px;">
                  <thead>
                    <tr>
                      <th style="text-align: center;">Producto</th>
                      <th style="text-align: center;">Cantidad</th>
                      <th style="text-align: center;">Precio</th>
                      <th style="text-align: center;">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                   
                        $db = Database::connect();

                        $statement = $db->query('SELECT id,idCuenta,idplatillo,descplatillo,precio,SUM(precio) as total,SUM(cantidad) as cantidad FROM detcuenta WHERE idCuenta = '.$idCuenta.'
                          GROUP BY idplatillo,descplatillo ORDER BY DESCPLATILLO DESC');

                        while($item = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td style="font-size:10px;text-align: center;font-weight:bold;">'. $item['descplatillo'] . '</td>';
                            echo '<td style="font-size:10px;text-align: center;">'. $item['cantidad'] . '</td>';
                            echo '<td style="font-size:10px;text-align: center;">$'. $item['precio'] . '</td>';
                            echo '<td style="font-size:10px;text-align: center;">$'. $item['total'] . '</td>';
                            echo '<td width=50>';
                            echo '<a class="btn" style="font-size:10px;text-align: center;line-height:-35px;" href="InsertaitemCuenta.php?user='.$usuario.'&action=delete&idCuenta='.$idCuenta.'&Id='. $item['id'] . '"><span class="glyphicon glyphicon-trash"></span></a>';
                            echo '</td>';
                            echo '</tr>';

                        }

                        $totals = $db->query('SELECT SUM(precio) as Subtotal, ROUND((SUM(precio) * 0.16)) as Iva, SUM(precio) as Total  FROM detcuenta WHERE idCuenta = '.$idCuenta.'');


                        // $totals = $db->query('SELECT SUM(precio) as Subtotal, ROUND((SUM(precio) * 0.16)) as Iva, ROUND(SUM(precio) + (SUM(precio) * 0.16)) as Total  FROM detcuenta WHERE idCuenta = '.$idCuenta.'');

                        while($values = $totals->fetch()) 
                        {
                  

                            $Subtotal = $values['Subtotal'];
                            $Iva = $values['Iva'];
                            $Total = $values['Total'];

                            // Precio a cobrar
                            $TotalTDC = $Subtotal;

                            // Concepto de compra
                            $ConceptoTDC = "Compra en Javier Mariscos.";
                        ?>

                            <table class="table table-striped" style="width: 100%; margin-top:15px;"> 
                            <div style="border-bottom-style: dashed; border-bottom-width: 1px; margin-top:-15px;"></div>
                            <tr>
                            <td style="font-size:10px;text-align: left; width:600px;"><span>Total a pagar: </span><span style="font-size:18px;font-weight:bold;color:red;" id="total" name="total">$<?php echo $Subtotal ?></span></td>
                             </td>

                            <td style="font-size:10px;text-align:left;width:500px;line-height:30px;">Monto de pago:<td>
                              <input style="width:100px;font-size:20px;font-weight:bold;margin-left:-50px;" type="text" 
                               class="form-control" id="monto" name="monto" required></td>
                            
                            </tr>

                        <?php

                        }
           
                        Database::disconnect();

                        ?>
                  </tbody>
                </table>
              </div>

            <div class="form-actions" style="margin-top: -55px; display: <?php echo $muestradiv; ?>">


                  <div class="col-xs-4 col-md-4 col-sm-4 edit" style="padding-top: 1px;">
                    <a class="btn btn-success" style= "width: 130px; height: 80px;" onclick="return myFunction();" href="InsertaitemCuenta.php?user=<?php echo $usuario ?>&action=pagar&idCuenta=<?php echo $idCuenta ?>&Subtotal=<?php echo $Subtotal ?>&Iva=<?php echo $Iva ?>&Total=<?php echo $Total ?>"><span style=" margin-top: 155px; line-height: 60px; font-weight: bold; font-size: 20px;"><span><img src="../images/Iconos/pagar.png" alt="" style="width:30px; height:30px;" id="boton"></span> Pagar</span></a>
                  </div>
               <!--       <div class="col-xs-4 col-md-4 col-sm-4" style="padding-top: 1px;">
                    <a class="btn btn-success" style= "width: 130px; height: 80px;" onSubmit="return validar();" href="InsertaitemCuenta.php?user=<?php echo $usuario ?>&action=pagar&idCuenta=<?php echo $idCuenta ?>&Subtotal=<?php echo $Subtotal ?>&Iva=<?php echo $Iva ?>&Total=<?php echo $Total ?>&monto=<?php echo $_COOKIE['Pagacon']; ?>"><span style=" margin-top: 155px; line-height: 60px; font-weight: bold; font-size: 20px;"><span><img src="../images/Iconos/pagar.png" alt="" style="width:30px; height:30px;" id="boton"></span> Pagar</span></a>
                  </div> -->
                  <div class="col-xs-4 col-md-4 col-sm-4" style="padding-top: 1px;">
                    <a class="btn btn-danger" style= "width: 130px; height: 80px;" onclick="return Cancel();" href="InsertaitemCuenta.php?user=<?php echo $usuario ?>&action=cancelar&idCuenta=<?php echo $idCuenta ?>&Subtotal=<?php echo $Subtotal ?>&Iva=<?php echo $Iva ?>&Total=<?php echo $Total ?>"><span style=" margin-top: 155px; line-height: 60px; font-weight: bold; font-size: 20px;"><span><img src="../images/Iconos/cancelar.png" alt="" style="width:30px; height:30px;margin-left: -10px;"></span> Cancelar</span></a>
                  </div>
                  <div class="col-xs-4 col-md-4 col-sm-4" style="padding-top:1px;">
                    <a class="btn btn-primary" style= "width: 130px; height: 80px;" href="InsertaitemCuenta.php?user=<?php echo $usuario ?>&action=guardar&idCuenta=<?php echo $idCuenta ?>&Subtotal=<?php echo $Subtotal ?>&Iva=<?php echo $Iva ?>&Total=<?php echo $Total ?>"><span style=" margin-top: 155px; line-height: 60px; font-weight: bold; font-size: 20px;"><span><img src="../images/Iconos/guardar.png" alt="" style="width:25px; height:25px;margin-left: -10px;"></span> Guardar</span></a>
                  </div>
            
            </div> 
            
            <div style="display: <?php echo $muestracancelado ?>">
              
                <img src="../images/Iconos/cancelada.png" alt="Cuenta Cancelada" style="width: 300px; height: 200px;margin-left: 75px;">

            </div>

            <div style="display: <?php echo $muestrapagado ?>">
              
                <img src="../images/Iconos/pagado.png" alt="Cuenta Pagada" style="width: 300px; height: 200px; margin-left: 75px;">

            </div>

           

     </div>

   </div>

  <div class="container">
      <div id="cajaproductos" class="col-xs-12 col-md-12 table-responsive">


            <?php

              if(!empty($action)){
                  
   
                    //Boton Regreso
                    echo '<div class="col-xs-6 col-md-4" style="padding-top: 7px;">';
                    echo '<div class="content-box" style="background:#448AFF; width: 180px;height: 100px; border-radius:5px;">';
                    echo '<a href="pos.php?user='.$usuario.'&idCuenta='.$idCuenta.'&statusCuenta=Por Pagar"><span style="color: white;font-size: xx-large;margin-left: 45px; line-height: 85px; text-transform: uppercase; font-weight:bold;"> Menu </span></a><img src="../images/Iconos/left-arrow.png" style="width: 44px; height:45px;margin-left:70px;margin-top:-40px;">';
                    echo '</div>';
                    echo '</div>';

                 $db = Database::connect();


                 if($delivery == 'si'){

                    $statement = $db->query('SELECT * FROM catplatillos_delivery CP WHERE idcategoria = '.$action.'');

                 }else{

                    $statement = $db->query('SELECT * FROM catplatillos CP WHERE idcategoria = '.$action.'');

                 }

                while($item = $statement->fetch()) 
                {
                   
                    //Catalogo Platillos
                    echo '<div class="col-xs-6 col-md-4" style="padding-top: 7px;">';
                    echo '<div class="content-box" style="background:#757575; width: 180px;height: 100px; border-radius:5px;">';
                    echo '<a href="InsertaitemCuenta.php?user='.$usuario.'&action=insert&idCuenta='.$idCuenta.'&Id='. $item['id'] . '&Platillo='. $item['nombre'] . '&Precio='. $item['precio'] . '&statusCuenta=Por Pagar"><span style="color: white;font-size: medium;margin-left: 10px; line-height: 65px; text-transform: uppercase; font-weight:bold;">'. $item['nombre'] . '</span></a><img src='. $item['imagen'] . ' style="width: 40px; height:40px;margin-left:70px;margin-top:-30px;">  <span style="font-size:18px;font-weight:bold;color:#FFEB3B;">$'. $item['precio'] . '</span>';
                    echo '</div>';
                    echo '</div>';
          
                   
                }

                   Database::disconnect();

              }
              else{

                  $db = Database::connect();

                  $statement = $db->query('SELECT * FROM menucategorias');
                  while($item = $statement->fetch()) 
                  {

                    if ($statusCuenta == 'Cancelada' || $statusCuenta == 'Pagada'){


                        //Menu Categorias Block
                        echo '<div class="col-xs-6 col-md-4" style="padding-top: 7px; display:block;">';
                         echo '<div class="content-box" style="background: '. $item['color'] . '; width: 260px;height: 100px;border-radius:5px;">';
                        echo '<a href="pos.php?action='. $item['id'] . '&user='.$usuario.'&idCuenta='.$idCuenta.'&statusCuenta=Por Pagar"><span style="color: white;font-size: 28px;margin-left: 10px; line-height: 85px; text-transform: uppercase; font-weight:bold;">'. $item['nombre'] . '</span></a>  <img src='. $item['imagen'] . ' style="width: 60px; height:60px;" alt="">';
                        echo '</div>';
                        echo '</div>';
                        


                    }else{

                      if($delivery == 'si'){

                         echo '<div class="col-xs-4 col-md-4 col-sm-4" style="padding-top: 7px;">';
                         echo '<div class="content-box" style="background: '. $item['color'] . '; width: 260px;height: 100px;border-radius:5px;">';
                        echo '<a href="pos.php?action='. $item['id'] . '&user='.$usuario.'&idCuenta='.$idCuenta.'&statusCuenta=Por Pagar&delivery=si"><span style="color: white;font-size: 28px;margin-left: 10px; line-height: 85px; text-transform: uppercase; font-weight:bold;">'. $item['nombre'] . '</span></a>  <img src='. $item['imagen'] . ' style="width: 60px; height:60px;" alt="">';
                        echo '</div>';
                        echo '</div>';

                      }else{

                         echo '<div class="col-xs-4 col-md-4 col-sm-4" style="padding-top: 7px;">';
                         echo '<div class="content-box" style="background: '. $item['color'] . '; width: 260px;height: 100px;border-radius:5px;">';
                        echo '<a href="pos.php?action='. $item['id'] . '&user='.$usuario.'&idCuenta='.$idCuenta.'&statusCuenta=Por Pagar"><span style="color: white;font-size: 28px;margin-left: 10px; line-height: 85px; text-transform: uppercase; font-weight:bold;">'. $item['nombre'] . '</span></a>  <img src='. $item['imagen'] . ' style="width: 60px; height:60px;" alt="">';
                        echo '</div>';
                        echo '</div>';

                      }
              

                    }
  


                  }
                    Database::disconnect();

              }
                   

              ?>

      </div>

    </div>
  </div>

<!--Modal Pagar-->
    <div class="modal fade" id="pagar" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-header">   
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <h2 class="modal-title" id="exampleModalLongTitle" style="font-weight;bold;font-size:x-large;">Pagar Cuenta</h2>
           
            </div>



             

                <div class="col-xs-12 col-md-12 col-sm-12" style="padding-top: 10px;">

                      <a class="btn" class="tablinks" onclick="openCity(event, 'Efectivo')" style= "width: 130px; height: 80px; background-color: #16bfbf; color: white;" href="#"><span style=" margin-top: 155px; line-height: 60px; font-weight: bold; font-size: 15px;"><span><img src="../images/Iconos/pagoefectivo.png" alt="" style="width:50px; height:50px;" id="boton"></span>Efectivo</span></a>

                </div>

                <!-- Tab content -->
                <div class="col-xs-12 col-md-12 col-sm-12" style="padding-top: 1px;">

                  <div id="Efectivo" class="tabcontent">
                    <h3>Pago en Efectivo</h3>

                    <?php 


                           echo '<table class="table table-striped" style="width: 100%; margin-top:15px;">'; 
                            echo '<tr>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td style="font-size:10px;text-align: center; width:500px;" class="border-0"><span>SubTotal: </span><span style="font-size:16px;font-weight:bold;">$'. $Subtotal . '</span></td>';
                            echo '</td>';
           
                            /*echo '<td style="font-size:10px;text-align: center; width:500px;"><span>IVA: </span><span style="font-size:16px;font-weight:bold;">$'. $Iva . '</span></td>';
                            echo '</td>';*/
                          
                            echo '<td style="font-size:10px;text-align: center; width:500px;"><span>Total: </span><span style="font-size:16px;font-weight:bold;color:red;" id="total">$'. $Subtotal . '</span></td>';
                            echo '</td>';

                            echo '<tr>';
                            echo '<td style="font-size:10px;text-align:left;width:500px;line-height:30px;">Monto de pago:<td><input style="width:100px;font-size:20px;font-weight:bold;margin-left:-50px;" type="number" onsubmit="return validar()" class="form-control" id="monto" name="monto" value=0 autofocus required"></td>';
                            echo '</td>';
                  
                            echo '<td style="font-size:10px;text-align:left;width:500px;margin-left:-50px;">Cambio:  <label id="cambio" style="font-size:16px;"></label>';
                            echo '</td>';
                            echo '</tr>';
                            echo '</table>';


                     ?>

                  
                    <a class="btn btn-success" onclick="return validar()" style= "width: 90px; height: 40px; margin-left: 400px;" href="InsertaitemCuenta.php?user=<?php echo $usuario ?>&action=pagar&idCuenta=<?php echo $idCuenta ?>&Subtotal=<?php echo $Subtotal ?>&Iva=<?php echo $Iva ?>&Total=<?php echo $Total ?>&monto=<?php echo $_COOKIE['Pagacon']; ?>" data-toggle="modal" data-target="#pagar"><span style=" font-weight: bold; font-size: 15px;"><span><img src="../images/Iconos/dinero.png" alt="" style="width:20px; height:20px;" id="boton"></span> Pagar</span></a>
                    
                  </div>

              </div>
        

                <div class="col-xs-12 col-md-12 col-sm-12" style="padding-top: 10px;">
                
              </div>
                <form action="InsertaitemCuenta.php?user=<?php echo $usuario ?>&action=TDC&idCuenta=<?php echo $idCuenta ?>&Subtotal=<?php echo $Subtotal ?>&Iva=<?php echo $Iva ?>&Total=<?php echo $Total ?>&monto=<?php echo $_COOKIE['Pagacon']; ?>" method="POST">
                  <script
                    src="https://www.mercadopago.com.mx/integrations/v1/web-tokenize-checkout.js"
                    data-public-key="TEST-2735e776-5790-496a-841b-246f4c659948"
                    data-button-label="Tarjeta"
                    data-transaction-product-label="Pago de Cuenta Javier Mariscos"
                    data-transaction-amount=<?php echo $Subtotal ?>>
                  </script>
                </form>

                <?php

                 if(isset($_REQUEST["token"])) {

                  $token = $_REQUEST["token"];
                  echo $token;
                  $payment_method_id = $_REQUEST["payment_method_id"];
                  echo $payment_method_id;
                  $installments = $_REQUEST["installments"];
                  echo $installments;
                  $issuer_id = $_REQUEST["issuer_id"];
                  echo $issuer_id;

                 }
           
                ?>

                <div class="modal-footer" style="margin-top: 10px;">

                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
           
                </div>

          </div>
        </div>
    </div>

<!--Modal Pagar-->
<!-- Modal -->
</body>
</html>