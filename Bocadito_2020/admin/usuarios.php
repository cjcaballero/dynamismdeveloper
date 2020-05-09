    <?php include("head.php");

      $usuario  = $_GET['user'];
      
    ?>

<!doctype html>
<html lang="es">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../images/Favicon/favicon-32x32.png" type="image/png">
        <title>&#8226; Bocadito&#174; &#8226;</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--fontawesome-->
        <script src="https://kit.fontawesome.com/b73bf9ac9d.js"></script>
        <!-- main css -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/responsive.css">


        

    </head>
    <body>

        <!-- HEADER -->
          <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container box_1620">
                        <a class="navbar-brand" href="index.php">
                            <img src="../images/Logo_min.png" alt="Bocadito" style="max-height: 85px;" class="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="menuadmin.php?user=<?php echo $usuario ?>" style="color: red;font-weight: bolder;">Inicio</a></li> 
                                <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/Bocaditomerida/" target="_blank"><i class="fab fa-facebook"></i></a></li> 
                                   <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/bocaditomerida/" target="_blank"><i class="fab fa-instagram"></i></a></li> 
                           


                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>
        <!-- Header/Portada -->
          <section class="content-pedidos section-padding">
                  <div class="content-pedidos-bg banner_inner" data-stellar-background-ratio="0.6">
                      <div class="container"> 
                          <div class="row">
                              
                          <div class="title-pedidos col-md-12 col-xs-6">
                              <p>USUARIOS</p>
                          </div>
                           <div class="col-xs-12 col-md-12 subtitle-emp">

                                    <p><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></p> 

                          </div>

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
                                  echo '<a class="btn btn-primary" href="updateusuarios.php?id='.$item['id'].'&user='.$usuario.'"><i class="fas fa-edit"></i> Modificar</a>';
                                  echo ' ';
                                  echo '<a class="btn btn-danger" href="deleteusuarios.php?id='.$item['id'].'&user='.$usuario.'"><i class="fas fa-trash-alt"></i> Eliminar</a>';
                                  echo '</td>';
                                  echo '</tr>';
                              }
                              Database::disconnect();
                            ?>
                        </tbody>
                      </table>
                     </div>
                  </div>
              </div>
                       <div class="form-actions_d">
                          <a class="btn btn-primary" href="menuadmin.php?user=<?php echo $usuario ?>"><i class="fas fa-arrow-left"></i> Regresar</a>
                          <a href="altausuarios.php?user=<?php echo $usuario ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
                      </div>

          </section>
       <!-- FOOTER -->  
  <footer class="footer-area">
            
                                            
                    <div class="col-md-12 col-xs-12">
                    <a href="mailto:ing.carloscaballero@outlook.com"><div class="derechosfoot">Desarrollado con <i class="fas fa-heart" style="color: red;"> </i> por <b>Dynamism</b> © 2019</div></a>
                    </div>
                    <div class="col-md-12 col-xs-12">
                            <a href="https://www.facebook.com/Bocaditomerida/" alt="Facebook Bocadito" target="_blank"><img src="../images/Iconos/feis.png" alt="Facebook" class="feis"></a>
                    </div>
                    <div class="col-md-12 col-xs-12">
                            <a href="https://www.instagram.com/bocaditomerida/" alt="Instagram Bocadito" target="_blank"><img src="../images/Iconos/instagram.png" alt="Facebook" class="insta"></a>
                    </div>
            
    </footer> 
             <script src="js/jquery-3.2.1.min.js"></script>
             <script src="js/bootstrap.min.js"></script>
    </body>
</html>