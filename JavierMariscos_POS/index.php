<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
     
    require 'database.php';
    include 'dbConfig.php';
    require_once 'extensiones/vendor/autoload.php';

         $Fecha = date("d/m/Y");  
         
         $dias= 1; // los días a restar 

         $FechaCorte =  date("d/m/Y", strtotime('-1 day')); 
         
     
    $usuarioError = $passwordError = $datosError = $usuario = $password = "";

    if(!empty($_POST)) 
    {

        $usuario            = checkInput($_POST['usuario']);
        $password           = checkInput($_POST['password']); 
       
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($usuario)) 
        {
            $usuarioError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        elseif(empty($password)) 
        {
            $passwordError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 

        else{

             $isSuccess = true;
        }
       
            if($isSuccess) 
            {
            
                $db = Database::connect();

                $sql= "SELECT id,name FROM catusers WHERE user = '". $usuario ."' AND password = '".$password."'";
             
                try 
                {
                    $stmt = $db->prepare($sql);
                    $result = $stmt->execute();
                    $rows = $stmt->fetch();
    
                    //$n = count($rows); 
                    
                    if($rows > 0){

                         $_SESSION['tipo_usuario'] = $rows['name'];   
                         $UserLogin = $_SESSION['tipo_usuario'];


                         $statement = $db->query('SELECT SUM(A.total) as Total, CONVERT(A.fecha, DATE) AS Fecha
                                                   FROM enccuenta A
                                                   WHERE CONVERT(A.fecha, DATE) = CURDATE() - 1 AND idestatus = 4');

                         $ventadiaantes = $statement->fetch(PDO::FETCH_ASSOC);

                         $TotalVenta = $ventadiaantes['Total'];   
                         $FechaVenta = $ventadiaantes['Fecha'];   


                         if($TotalVenta == null && $FechaVenta == null || empty($TotalVenta) && empty($FechaVenta)){


                             header("location: menuAdmin.php?user=".$UserLogin."&return=sinventas");


                         }else{


                          //Validamos si el cierre se realizo ayer
                              $query = $db->query("SELECT id FROM cierrediario WHERE CONVERT(fecha, DATE) = date('d-m-Y')");

                              $idcierre = 0;

                              while($custRow = $query->fetch()) 
                              {
                            
                                $idcierre = $custRow['id']; 

                              }
                      
                       
                             if($idcierre > 0 || !empty($idcierre)){


                                   header("location: menuAdmin.php?user=".$UserLogin."");


                             }
                             else{
                              
                                    header("location: modalCierre.php?user=".$UserLogin."&Fecha=".$Fecha."&FechaCorte=".$FechaCorte."");

                             }

                            }
                    }else{

                           $datosError = 'Usuario y/o Password Incorrectos';
                    }
                    
                    $db =Database::disconnect();
                    $stmt->closeCursor(); 

                }       
                catch (Exception $e)
                {
                    die ($e->getMessage() ); 
                }
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

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
<title>Javier Mariscos | Los Originales desde 1980&#174;</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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
        <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

</head>
<!--Coded with love by Mutiullah Samim-->
<body>
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="images/Logo/Logo.png" class="brand_logo" alt="Logo">
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
          <form class="form" action="index.php" role="form" method="post" enctype="multipart/form-data">
            <div style="color: white;text-align: center;  font-family: 'Montserrat', sans-serif; font-size: 25px;"><span>Bienvenido</span></div>
            <br>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control input_user" id="usuario" name="usuario" value="<?php echo $usuario;?>" placeholder="Usuario">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" id="password" name="password" class="form-control input_pass" value="<?php echo $password;?>" placeholder="Password">
            </div>
              <div class="d-flex justify-content-center mt-3 login_container">
                <button type="submit" name="button" class="btn login_btn">Entrar</button>
              </div>
              <div class=" justify-content-center">
              <span class="help-inline" style="color: red; font-weight: bold;"><?php echo $datosError;?></span>
              </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
