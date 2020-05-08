<?php
     
    require '../database.php';


    $usuario  = $_GET['user'];


    if(!empty($_GET['idCuenta'])) 
    {
      $idCuenta = $_GET['idCuenta'];
    }


    if(!empty($_GET['action'])) 
    {
        $action  = $_GET['action'];
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


      <script type="text/javascript">

          function myFunction() {

                var Monto= document.getElementById("monto").value;
                var Total = document.getElementById("monto").innerHTML;
                //var Total = document.getElementById("total").innerHTML;

                var Totales = Total.substring(10,1);

                var redondeo=0;
                alert(Monto);
                alert(Total);

              if (Monto < Totales || Monto == 0 || Monto == ""){

                    alert("El Monto a pagar no puede ser menor al Total");

                    Monto = "";

                    Total = "";

                    document.getElementById("cambio").innerHTML = 0;

              }else if(Monto == '' || Monto == 0){


                  redondeo= "";
                  redondeo= 0;

                  document.getElementById("cambio").innerHTML = 0;


              }else{


                  var Totales = Total.substring(10,1);

                  var resultado = parseFloat(Monto) - parseFloat(Totales);

                  redondeo = Math.round(resultado * 100) / 100;

                  document.getElementById("cambio").innerHTML = "$" + redondeo;

                }

                
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

              }

        #cajaproductos{

              margin-top: 5px;
              border-color:black;
              width:100%; 
              float: right; 
              height: 720px; 
              color: #fff; 
              background-color: #fff;
              border-radius: 5px;
              border-style: solid;
              border-width: 3px;

            }
      .logopos{
       
             margin-top: 5px;
             text-align: center;
        }

    </style>


</head>
<body>
  <div class="container">
  
      <div id="cajaproductos" class="col-xs-12 col-md-12 table-responsive">

           <div class="logopos">
        
              <img src="../images/Logo/Logo_sm.png" alt="JavierMariscos" style="width: 100px;">  

                <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span><span style="color:black;"><?php echo $usuario ?></span><span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="../logout.php"> Cerrar Sesion</a></span></div>

          </div>
          
          <div style="padding-top: 10px; color: black; margin-left: 25px;">

             <h1><strong>Croquis Mesas</strong></h1>

          </div>

           <?php


                 if(!empty($_GET['idCuenta'])) {


                    echo '        
                    <!--Mesas-->
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa5&statusCuenta=Por Pagar"><img src="../images/Iconos/table2.png" alt="Comedor" width="120px" height="120px" style="margin-left: 150px; margin-top: 15px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">5</span>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa4&statusCuenta=Por Pagar"><img src="../images/Iconos/table2.png" alt="Comedor" width="120px" height="120px" style="margin-left: 100px; margin-top: 15px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">4</span>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa3&statusCuenta=Por Pagar"><img src="../images/Iconos/table2.png" alt="Comedor" width="120px" height="120px" style="margin-left: 100px; margin-top: 15px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">3</span>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa2&statusCuenta=Por Pagar"><img src="../images/Iconos/table2.png" alt="Comedor" width="120px" height="120px" style="margin-left: 100px; margin-top: 15px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">2</span>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa6&statusCuenta=Por Pagar"><img src="../images/Iconos/table2.png" alt="Comedor" width="120px" height="120px" style="margin-left: 80px; margin-top: 80px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">6</span>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa1&statusCuenta=Por Pagar"><img src="../images/Iconos/table2.png" alt="Comedor" width="120px" height="120px" style="margin-left: 665px; margin-top: 80px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">1</span>

                    <!--Barras-->
                    <img src="../images/Iconos/barra.png" alt="Comedor" width="120px" height="300px;" style="margin-left: 319px; margin-top: -150px;">
                    <img src="../images/Iconos/barra.png" alt="Comedor" width="120px" height="300px;" style="margin-left: 200px; margin-top: -153px;">

                    <!--Bancos Barra 1 - 1 al 4 --> 
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco13&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -175px;margin-top: -335px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco14&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -200px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco15&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: 70px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco16&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -70px;"></a>
                    
                    <!--Bancos Barra 1 - 1 al 4 --> 
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco9&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: 148px; margin-top: -335px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco10&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -200px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco11&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: 70px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco12&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -70px;"></a>
                  
                    
                  
                    <!--Bancos Barra 2-->
               
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco5&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: 275px;margin-top: -509px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco6&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -374px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco7&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -245px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco8&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -105px;"></a>


                    <!--Bancos Barra 2-->
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco1&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: 153px; margin-top: -509px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco2&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -374px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco3&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -245px;"></a>
                    <a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$idCuenta.'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Banco4&statusCuenta=Por Pagar"><img src="../images/Iconos/banco.png" alt="Comedor" width="35px" height="35px;" style="margin-left: -40px; margin-top: -105px;"></a>';
          

                 }else{


                              $db = Database::connect();

                              $statement = $db->query('SELECT DISTINCT A.id, A.mesaBanco   
                                                       FROM enccuenta A 
                                                       WHERE CONVERT(A.fecha, DATE) = CURDATE() AND A.idestatus = 3 ');

                              while($item = $statement->fetch()) 
                              {

                                  switch($item['mesaBanco']){

                                    case $item [] = 'Mesa5':

                                      
                                      echo '<a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$item['id'].'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa5"><img src="../images/Iconos/tableocupada.png" alt="Comedor" width="120px" height="120px" style="margin-left: 150px; margin-top: 15px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">5</span>';


                                    break;

                                    case $item [] = 'Mesa4':

                                      
                                       echo '<a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$item['id'].'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa4"><img src="../images/Iconos/tableocupada.png" alt="Comedor" width="120px" height="120px" style="margin-left: 100px; margin-top: 15px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">4</span>';


                                    break;

                                    case $item [] = 'Mesa3':

                                      
                                      echo '<a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$item['id'].'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa3"><img src="../images/Iconos/tableocupada.png" alt="Comedor" width="120px" height="120px" style="margin-left: 100px; margin-top: 15px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">3</span>';

                                    break;

                                    case $item [] = 'Mesa2':

                                      
                                      echo '<a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$item['id'].'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa2"><img src="../images/Iconos/tableocupada.png" alt="Comedor" width="120px" height="120px" style="margin-left: 100px; margin-top: 15px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">2</span>';

                                    break;


                                    case $item [] = 'Mesa6':

                                      
                                      echo '<a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$item['id'].'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa6"><img src="../images/Iconos/tableocupada.png" alt="Comedor" width="120px" height="120px" style="margin-left: 80px; margin-top: 80px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">6</span>';

                                    break;


                                    case $item [] = 'Mesa1':

                                      
                                      echo '<a href="InsertaitemCuenta.php?user='.$usuario.'&idCuenta='.$item['id'].'&action=Comedor&delivery=no&transaccion=actualiza&mesaBanco=Mesa1"><img src="../images/Iconos/tableocupada.png" alt="Comedor" width="120px" height="120px" style="margin-left: 665px; margin-top: 80px;"></a><span style="font-weight: bold;font-size: x-large;color: #FF6600;">1</span>';

                                    break;

                                    default :

                                      echo '<img src="../images/Iconos/table2.png" alt="Comedor" width="120px" height="120px" style="margin-left: 100px; margin-top: 15px;"><span style="font-weight: bold;font-size: x-large;color: #FF6600;">Default</span>'; 

                                    break;
 

                                  }
                                 
                                  Database::disconnect();
                                 
                                }

                          }
                                
  
                ?>

      </div>

  </div>

</body>
</html>