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
                      <h1><strong>Usuarios registrados</strong><a href="altausuarios.php?user=<?php echo $usuario ?>" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Agregar</a></h1>
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Correo electronico</th>
                            <th>Usuario</th>
                            <th>Password</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              require 'database.php';
                              $db = Database::connect();
                              $statement = $db->query('SELECT * FROM users');
                              while($item = $statement->fetch()) 
                              {
                                  echo '<tr>';
                                  echo '<td>'. $item['name'] . '</td>';
                                  echo '<td>'. $item['email'] . '</td>';
                                  echo '<td>'. $item['user'] . '</td>';
                                  echo '<td>'. $item['password'] . '</td>';
                                  echo '<td width=300>';
                                  echo '<a class="btn btn-primary" href="updateusuarios.php?id='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>';
                                  echo ' ';
                                  echo '<a class="btn btn-danger" href="deleteusuarios.php?id='.$item['id'].'&user='.$usuario.'"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>';
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
