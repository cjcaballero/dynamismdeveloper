<!DOCTYPE html>
<html>
    <head>
		<?php include("head.php");

      $usuario  = $_GET['user'];
      
    ?>

    </head>
    
    <body>
        <div class="container">
            <a href="menuadmin.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>           
                <div class="container admin">
                  <div style="text-align: right; font-weight: bold;"><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>
                  <div class="row">
                      <h1><strong>Lista de Productos</strong><a href="insert.php?user=<?php echo $usuario ?>" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Agregar</a></h1>
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              require 'database.php';
                              $db = Database::connect();
                              $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');
                              while($item = $statement->fetch()) 
                              {
                                  echo '<tr>';
                                  echo '<td>'. $item['name'] . '</td>';
                                  echo '<td>'. $item['description'] . '</td>';
                                  echo '<td>'. number_format($item['price'], 2, '.', '') . '</td>';
                                  echo '<td>'. $item['category'] . '</td>';
                                  echo '<td width=300>';
                                  echo '<a class="btn btn-default" href="view.php?id='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>';
                                  echo ' ';
                                  echo '<a class="btn btn-primary" href="update.php?id='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>';
                                  echo ' ';
                                  echo '<a class="btn btn-danger" href="delete.php?id='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>';
                                  echo '</td>';
                                  echo '</tr>';
                              }
                              Database::disconnect();
                            ?>
                        </tbody>
                      </table>
                  </div>
                                      <div class="form-actions">
                        <a class="btn btn-primary" href="menuadmin.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
               </div>
        </div>
    </body>
</html>
