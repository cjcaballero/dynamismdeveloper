<?php
     
    
    require '../database.php';
    include '../dbConfig.php';

    $user  = $_GET['user'];
 
    $concepto = $total = $abono= $tipogasto = $comentarios = $conceptoError = $totalError = $abonoError = $tipogastoError = $comentariosError = "";

    if(!empty($_POST)) 
    {
        $concepto           = checkInput($_POST['concepto']);
        $total              = checkInput($_POST['total']);
        $abono              = checkInput($_POST['abono']);
        $tipogasto          = checkInput($_POST['tipogasto']); 
        $comentarios        = checkInput($_POST['comentarios']); 

       
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($concepto)) 
        {
            $nameError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        elseif(empty($total)) 
        {
            $emailError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
        elseif($tipogasto == 'Seleccione') 
        {
            $passwordError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        else{

             $isSuccess = true;
        }
       
        if($isSuccess) 
        {


         //===================================================================================================//


               //Obtenemos el Id del Cajero
               $query = $db->query("SELECT id FROM catUsers WHERE name = '".$user."'");

               $custRow = $query->fetch_assoc();

               $idCajero = $custRow['id']; 


         //===================================================================================================//


            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO gastosdiarios (idcajero,concepto,total,abono,pago,comentarios,idTipoGasto) values(?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($idCajero,$concepto,$total,$abono,($total - $abono),$comentarios,$tipogasto));
            Database::disconnect();
            
            if( $statement ){
                
                 $return = "ok";

            } else{

                 $return = "fail";
            }

            
            header("Location:gastos.php?user=$user&return=$return");
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
    
    <body>
        <div class="container">
            <a href="../index.php?user=<?php echo $user ?>"><div class="logo"></div></a>
         <div class="container admin">
                         <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $user ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="../logout.php">Cerrar Sesion</a></span></div>
            <div class="row">
                <h1><strong>Nuevo Gasto</strong></h1>
                <br>
                <form class="form" action="generagasto.php?user=<?php echo $user ?>" class="form" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="concepto">Concepto:</label>
                        <input type="text" class="form-control" id="concepto" name="concepto" placeholder="Concepto" value="<?php echo $concepto;?>">
                        <span class="help-inline"><?php echo $conceptoError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="total">Total:</label>
                        <input type="number" class="form-control" id="total" name="total" placeholder="Total" value="<?php echo $total;?>">
                        <span class="help-inline"><?php echo $totalError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="abono">Abono:</label>
                        <input type="number" class="form-control" id="abono" name="abono" placeholder="Abono" value="<?php echo $abono;?>">
                        <span class="help-inline"><?php echo $abonoError;?></span>
                    </div>
                      <div class="form-group">
                            <label for="tipogasto">Tipo Gasto:
                            <select class="form-control" id="tipogasto" name="tipogasto"  style="width:500px; margin-left: -1px;">
                            <?php
                            $db = Database::connect();
                            
                            foreach ($db->query('SELECT * FROM catTipoGastos ORDER BY id DESC') as $row) 
                            {
                                
                                echo '<option selected="selected" value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                
                            }
                            Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $tipogastoError;?></span>
                        </div>
                   <div class="form-group">
                        <label for="comentarios">Comentarios:</label>
                        <input type="text" class="form-control" id="comentarios" name="comentarios" placeholder="Comentarios" value="<?php echo $comentarios;?>">
                        <span class="help-inline"><?php echo $comentariosError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Agregar</button>
                        <a class="btn btn-primary" href="gastos.php?user=<?php echo $user ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
                </form>
            </div>
        </div>   
    </div>
    </body>
</html>