<!DOCTYPE html>
<html>
    <head>
		<?php include("head.php");

    require 'database.php';

    $usuario  = $_GET['user'];


    if(isset($_GET['id']))
    {
        $id = checkInput($_GET['id']);
        $action = checkInput($_GET['action']); 
    
      

         if($action== 'Confirmar'){

                  $connection = Database::connect();

                  $statement = $connection->prepare("UPDATE orders set status = 2 WHERE id = ?");
                  $statement->execute(array($id));

              Database::disconnect();
              header("Location: pedidos.php?user=$usuario");

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

    </head>
    
    <body>
        <div class="container">
            <a href="menuadmin.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>           
                <div class="container admin">
                  <div style="text-align: right; font-weight: bold;"><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>
                  <div class="row">
                      <h1><strong>Pedidos</strong></h1>
                      <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Pedido</th>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Direccion</th>
                            <th style="text-align: center;">Telefono</th>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Hora</th>
                            <th style="text-align: center;">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              
                              $db = Database::connect();
                              $statement = $db->query('SELECT A.id,B.name,B.address,B.phone,CONVERT(A.created, DATE) as Fecha, DATE_FORMAT(A.created, "%r") as Hora FROM orders A 
                                                       INNER JOIN customers B on A.customer_id = B.id WHERE CONVERT(A.created, DATE) = CURDATE() AND A.status = 1');
                              
                              while($item = $statement->fetch()) 
                              {
                                  echo '<tr>';
                                  echo '<td align=center>'. $item['id'] . '</td>';
                                  echo '<td align=center>'. $item['name'] . '</td>';
                                  echo '<td align=center>'. $item['address'] . '</td>';
                                  echo '<td align=center>'. $item['phone'] . '</td>';
                                  echo '<td align=center>'. $item['Fecha'] . '</td>';
                                  echo '<td align=center>'. $item['Hora'] . '</td>';
                                  echo '<td width=200>';
                                  echo '<a class="btn btn-default" href="viewpedidos.php?id='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>';
                                  echo ' ';
                                      echo '<a class="btn btn-default" style=color:green; href="pedidos.php?id='.$item['id'].'&action=Confirmar&user='.$usuario.'"><span class="glyphicon glyphicon-ok"></span> Confirmar</a>';
                                  echo ' ';
                                  echo '</td>';
                                  echo '</tr>';
                              }
                              Database::disconnect();
                            ?>
                        </tbody>
                      </table>
                  </div>
                                       <br>
                            <div class="form-actions">
                              <a class="btn btn-primary" href="menuadmin.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                            </div>
               </div>
        </div>
    </body>
</html>
