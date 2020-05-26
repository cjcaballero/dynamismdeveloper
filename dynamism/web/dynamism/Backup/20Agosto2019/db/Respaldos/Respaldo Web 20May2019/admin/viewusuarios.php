<?php
    require 'database.php';

    $usuario  = $_GET['user'];

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

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
        <?php include("head.php");?>
    </head>
    
    <body>
      <div class="container">
            <a href="index.php?user=<?php echo $usuario ?>"><div class="logo"></div></a> 
                 <div class="container admin">
                        <div style="text-align: right; font-weight: bold;"><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>
                    <div class ="row">
                       <div class="col-sm-6">
                            <h1><strong>Ver producto</strong></h1>
                            <br>
                            <form>
                              <div class="form-group">
                                <label>Nombre:</label><?php echo '  '.$item['name'];?>
                              </div>
                              <div class="form-group">
                                <label>Descripción:</label><?php echo '  '.$item['description'];?>
                              </div>
                              <div class="form-group">
                                <label>Precio:</label><?php echo '  $ '.number_format((float)$item['price'], 2). ' ';?>
                              </div>
                              <div class="form-group">
                                <label>Categoría:</label><?php echo '  '.$item['category'];?>
                              </div>
                              <div class="form-group">
                                <label>Imagen:</label><?php echo '  '.$item['image'];?>
                              </div>
                            </form>
                            <br>
                            <div class="form-actions">
                              <a class="btn btn-primary" href="index.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                            </div>
                        </div> 
                        <div class="col-sm-6 site">
                            <div class="thumbnail">
                                <img src="<?php echo '../images/Productos/'.$item['image'];?>" alt="...">
                                <div class="price"><?php echo number_format((float)$item['price'], 2). ' $';?></div>
                                  <div class="caption">
                                    <h4><?php echo $item['name'];?></h4>
                                    <p><?php echo $item['description'];?></p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Ordenar</a>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>  
    </body>
</html>

