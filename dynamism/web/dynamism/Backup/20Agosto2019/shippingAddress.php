<?php
     
    require 'admin/database.php';
 
    $nameError = $emailError = $phoneError = $addressError = $listboxError= $name = $email = $phone = $address = "";
                

    if(!empty($_POST)) 
    {
        $name              = checkInput($_POST['name']);
        $email             = checkInput($_POST['email']);
        $phone             = checkInput($_POST['phone']);
        $address           = checkInput($_POST['address']); 
        $listbox           = checkInput($_POST['medios']); 
       
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($name)) 
        {
            $nameError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        if(empty($email)) 
        {
            $emailError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
        if(empty($phone)) 
        {
            $phoneError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
        if(empty($address)) 
        {
            $addressError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        if($listbox == 'Seleccione')
        {
            $listboxError = 'Debe Seleccionar una Opcion';
            $isSuccess = false;
        }
        else{

             $isSuccess = true;
        }
       
        if($isSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO customers (name,email,phone,address,medio,status) values(?, ?, ?, ?, ?, ?)");
            $statement->execute(array($name,$email,$phone,$address,$listbox,1));
            Database::disconnect();
            header("Location: checkout.php");


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
        <title>Bocadito | Hechos con Amor&#174;</title>
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
        <link rel="manifest" href="images/Favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images/Favicon/ms-icon-144x144.png">
       

    </head>
    
    <body>
        <div class="container">
      <a href="index.php"><div class="logo"></div></a>
         <div class="container admin">
            <div class="row">
                <h1><strong>Datos de Envio</strong></h1>
                <br>
                <form class="form" action="shippingAddress.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nombre Completo:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email;?>">
                        <span class="help-inline"><?php echo $emailError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono Celular</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefono" value="<?php echo $phone;?>">
                        <span class="help-inline"><?php echo $phoneError;?></span>
                    </div>
                   <div class="form-group">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Direccion" value="<?php echo $address;?>">
                        <span class="help-inline"><?php echo $addressError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="medios">&#191;Como te enteraste de nosotros?</label>
                            <select name="medios">
                              <option value="Seleccione">Seleccione</option>
                              <option value="Facebook">Facebook</option>
                              <option value="Instagram">Instagram</option>
                              <option value="Google">Google</option>
                            </select>
                        <span class="help-inline"><?php echo $listboxError;?></span>
                    </div>

                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Continuar</button>
                        <a class="btn btn-primary" href="viewCart.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
                </form>
            </div>
        </div>   
         </div> 
    </body>
</html>