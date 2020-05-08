<!DOCTYPE html>
<html>
    <head>
		 <?php 

      $return = "";

      $usuario  = $_GET['user'];

      if(isset($_GET['return'])){


          $return  = $_GET['return'];

          if ($return == 'ok'){

            echo '<div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  El Usuario(a) fue registrado<strong> Exitosamente!</strong>
                 </div>';

                $return ='success';
            } 

      }

      
    ?>
        <title>Bocadito | Hechos con Amor&#174;</title>
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

        <script>
          
          window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
          }, 4000);
      
        </script>


    </head>
    
    <body>
        <div class="container">
            <a href="../menuadmin.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>           
                <div class="container admin">
                  <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="../logout.php">Cerrar Sesion</a></span></div>
                  <div class="row">
                      <h1><strong>Usuarios registrados</strong>  <a href="altaUsuarios.php?user=<?php echo $usuario ?>" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Agregar</a></h1>
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Correo electronico</th>
                            <th>Usuario</th>
                            <th>Password</th>
                            <th>Puesto</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              require '../database.php';
                              $db = Database::connect();
                              $statement = $db->query('SELECT A.id,name,email,user,password,B.nombre FROM catusers A INNER JOIN catPuestos B ON A.idPuesto = B.id ');
                              while($item = $statement->fetch()) 
                              {
                                  echo '<tr>';
                                  echo '<td>'. $item['name'] . '</td>';
                                  echo '<td>'. $item['email'] . '</td>';
                                  echo '<td>'. $item['user'] . '</td>';
                                  echo '<td>'. $item['password'] . '</td>';
                                  echo '<td>'. $item['nombre'] . '</td>';
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
                        <a class="btn btn-primary" href="admin.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
               </div>
        </div>
    </body>
</html>
