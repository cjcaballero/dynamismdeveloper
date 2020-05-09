<?php

    require 'database.php';

    $usuario  = $_GET['user'];

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    $nameError = $emailError = $userError = $passwordError = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $email              = checkInput($_POST['email']);
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

        else
        {
            
            $isUploadSuccess =true;
            $isSuccess = true;
  
        }
         
        if (($isSuccess && $isUploadSuccess)) 
        { 
            $db = Database::connect();

                $statement = $db->prepare("UPDATE users  set name = ?, email = ?, user = ?, password = ? WHERE id = ?");
                $statement->execute(array($name,$email,$login,$password,$id));
            
            Database::disconnect();
            header("Location: usuarios.php?user=$usuario");
        }

    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT user as login, name,email,password FROM users where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name           = $item['name'];
        $email          = $item['email'];
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
        <?php include("head.php")?>
    </head>
    
    <body>
         <div class="container">
            <a href="index.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>
               <div class="container admin">
                         <div style="text-align: right; font-weight: bold;"><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>
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
