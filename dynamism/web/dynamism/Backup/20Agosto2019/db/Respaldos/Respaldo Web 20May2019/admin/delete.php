<?php
    require 'database.php';

    $usuario  = $_GET['user'];
 
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php?user=$usuario"); 
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
                        <h1><strong>Eliminar elemento</strong></h1>
                        <br>
                        <form class="form" action="delete.php?user=<?php echo $usuario ?>" role="form" method="post">
                            <input type="hidden" name="id" value="<?php echo $id;?>"/>
                            <p class="alert alert-warning">Estas seguro que deseas eliminar este elemento?</p>
                            <div class="form-actions">
                              <button type="submit" class="btn btn-warning">Aceptar</button>
                              <a class="btn btn-default" href="index.php?user=<?php echo $usuario ?>">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>    
    </body>
</html>

