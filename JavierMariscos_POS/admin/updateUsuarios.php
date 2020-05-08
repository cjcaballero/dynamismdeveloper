<?php

    require '../database.php';

    $usuario  = $_GET['user'];

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    $puestoError = $nameError = $emailError = $userError = $passwordError = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $email              = checkInput($_POST['email']);
                $puesto              = checkInput($_POST['puesto']);
        $login               = checkInput($_POST['login']);
        $password           = checkInput($_POST['password']); 
        $isSuccess          = true;
       
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
        if(empty($login)) 
        {
            $userError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
         
        if(empty($password)) 
        {
            $passwordError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }

        if($puesto == 'Seleccione') 
        {
            $puestoError = 'Debe seleccionar un Puesto/Rol';
            $isSuccess = false;
        }
        else
        {
            
            $isUploadSuccess =true;
            $isSuccess = true;
  
        }
         
        if (($isSuccess && $isUploadSuccess)) 
        { 
            $db = Database::connect();

                $statement = $db->prepare("UPDATE catusers  set name = ?, email = ?, user = ?, password = ?, idpuesto = ? WHERE id = ?");
                $statement->execute(array($name,$email,$login,$password,$puesto,$id));
            
            Database::disconnect();
            header("Location: usuarios.php?user=$usuario");
        }

    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT user as login, name,email,password, B.id as puesto 
                                    FROM catusers A
                                    INNER JOIN catpuestos B ON A.idpuesto = B.id 
                                    WHERE A.id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name           = $item['name'];
        $email          = $item['email'];
        $puesto          = $item['puesto'];
        $login          = $item['login'];
        $password       = $item['password'];
        Database::disconnect();
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
            <a href="index.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>
               <div class="container admin">
                         <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>
            <div class="row">
                <h1><strong>Editar Usuario</strong></h1>
                <br>
                 <form class="form" action="updateusuarios.php?id=<?php echo $id ?>&user=<?php echo $usuario ?>" class="form" role="form" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                        <label for="name">Nombre Completo:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email;?>">
                        <span class="help-inline"><?php echo $emailError;?></span>
                    </div>
                    <div class="form-group">
                            <label for="puesto">Puesto/Rol:
                            <select class="form-control" id="puesto" name="puesto"  style="width:500px; margin-left: -1px;">
                            <?php
                            $db = Database::connect();

                            echo '<option selected="selected" value="Seleccione">Seleccione</option>';
                            
                            foreach ($db->query('SELECT * FROM catpuestos ORDER BY id ASC') as $row) 
                            {
                                
                                echo '<option value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                
                            }
                            Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $puestoError;?></span>
                    </div>
                      <div class="form-group">
                        <label for="login">Usuario:</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Usuario" value="<?php echo $login;?>">
                        <span class="help-inline"><?php echo $userError;?></span>
                    </div>
                      <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password;?>">
                        <span class="help-inline"><?php echo $passwordError;?></span>
                    </div>
                   <br>
                   <div class="form-actions">
                       <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>
                       <a class="btn btn-primary" href="usuarios.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                  </div>
                </form>
            </div> 
        </div>
    </body>
</html>
