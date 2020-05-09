<?php
    require 'database.php';

    $usuario  = $_GET['user'];

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT B.name,B.address,B.phone,CONVERT(A.created, DATE) as Fecha, B.email FROM orders A 
                              INNER JOIN customers B on A.customer_id = B.id
                              WHERE CONVERT(A.created, DATE) = CURDATE()");
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
                            <h1><strong>Detalle de Pedido</strong></h1>
                            <br>
                            <form>
                              <div class="form-group">
                                <label>Nombre:</label><?php echo '  '.$item['name'];?>
                              </div>
                              <div class="form-group">
                                <label>Direccion:</label><?php echo '  '.$item['address'];?>
                              </div>
                              <div class="form-group">
                                <label>Telefono:</label><?php echo '  '.$item['phone'];?>
                              </div>
                              <div class="form-group">
                                <label>Email:</label><?php echo '  '.$item['email'];?>
                              </div>
                            </form>
                        </div> 
                        <div class="col-sm-12 site">
                          <div style="text-align: right;"><a class="btn btn-default" style="color:green;font-family: Montserrat;" href="pedidos.php?id=<?php echo $id ?>&action=Confirmar&user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-ok"></span> Confirmar</a></div>
                          <br>
                        <table class="table table-striped table-bordered table-responsive" style="font-family: Montserrat">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Descripcion</th>
                            <th style="text-align: center;">Precio</th>
                            <th style="text-align: center;">Cantidad</th>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Hora</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                               $db = Database::connect();
                              $statement = $db->query('SELECT A.Id,C.name,C.email,C.phone,C.address, CONVERT(A.created, DATE) as Fecha,DATE_FORMAT(A.created, "%r") as Hora, A.total_price, D.name, D.description, D.price,B.quantity 
                                                      FROM orders A
                                                      INNER JOIN order_items B ON A.id = B.order_id
                                                      INNER JOIN customers C ON A.customer_id = C.id
                                                      INNER JOIN items D ON B.product_id = D.id
                                                      WHERE A.Id = '.$id.'');
                                    
                              while($item = $statement->fetch()) 
                              {
                                  echo '<tr>';
                                  echo '<td align=center>'. $item['name'] . '</td>';
                                  echo '<td align=center>'. $item['description'] . '</td>';
                                  echo '<td align=center>'. number_format($item['price'], 2, '.', '') . '</td>';
                                  echo '<td align=center>'. $item['quantity'] . '</td>';
                                  echo '<td align=center>'. $item['Fecha'] . '</td>';
                                  echo '<td align=center>'. $item['Hora'] . '</td>';
                                  echo '</tr>';
                              }
                            ?>
                        </tbody>
                      </table>
                        </div>  
                    </div>
                                <br>
                            <div class="form-actions">
                              <a class="btn btn-primary" href="pedidos.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                            </div>
                </div>   
            </div>  
                            
    </body>
</html>

