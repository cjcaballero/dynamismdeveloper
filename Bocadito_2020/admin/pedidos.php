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


        <!--Función actualizar-->
        <script type="text/javascript">
          function actualizar(){location.reload(true);}
        //Función para actualizar cada 4 segundos(4000 milisegundos)
          setInterval("actualizar()",4000);
        </script>

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
                              <p>PEDIDOS</p>
                          </div>
                           <div class="col-xs-12 col-md-12 subtitle-emp">

                                    <p><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></p> 

                          </div>

                          <table class="table table-striped table-bordered .table-responsive">
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
                                  echo '<td align=center style="text-transform: capitalize;">'. $item['name'] . '</td>';
                                  echo '<td align=center>'. $item['address'] . '</td>';
                                  echo '<td align=center>'. $item['phone'] . '</td>';
                                  echo '<td align=center>'. $item['Fecha'] . '</td>';
                                  echo '<td align=center>'. $item['Hora'] . '</td>';
                                  echo '<td width=190>';
                                  echo '<a class="btn btn-primary" href="viewpedidos.php?id='.$item['id'].'&user='.$usuario.'"><i class="fas fa-eye"></i> Ver</a>';
                                  echo ' ';
                                      echo '<a class="btn btn-success" href="pedidos.php?id='.$item['id'].'&action=Confirmar&user='.$usuario.'"><i class="fas fa-check-circle"></i> Confirmar</a>';
                                  echo ' ';
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