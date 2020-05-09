<?php
    require 'database.php';

    $usuario  = $_GET['user'];

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT B.name,B.address,B.phone,CONVERT(A.created, DATE) as Fecha, B.email 
                               FROM orders A 
                               INNER JOIN customers B on A.customer_id = B.id
                               WHERE CONVERT(A.created, DATE) = CURDATE() AND A.Id = ".$id."");
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
          <section class="content-pedidos section-padding_vp">
                  <div class="content-pedidos-bg banner_inner" data-stellar-background-ratio="0.6">
                      <div class="container"> 
                          <div class="row">
                              
                          <div class="title-pedidos col-md-12 col-xs-6">
                              <p>PEDIDOS</p>
                          </div>
                           <div class="col-xs-12 col-md-12 subtitle-emp">

                                    <p><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></p> 

                          </div>
                        <div class="detalle-pedido">
                       <form>
                              <div class="form-group">
                                <label>Nombre:</label><div class="desc-product"><?php echo '  '.$item['name'];?></div>
                              </div>
                              <div class="form-group">
                                <label>Direccion:</label><div class="desc-product"><?php echo '  '.$item['address'];?></div>
                              </div>
                              <div class="form-group">
                                <label>Telefono:</label><div class="desc-product"><?php echo '  '.$item['phone'];?></div>
                              </div>
                              <div class="form-group">
                                <label>Email:</label><div class="desc-product"><?php echo '  '.$item['email'];?></div>
                              </div>
                            </form>
                        </div> 
                        <div class="col-sm-12 site_det">

                          <div class="btn_confirmar"><a class="btn btn-success" href="pedidos.php?id=<?php echo $id ?>&action=Confirmar&user=<?php echo $usuario ?>"><i class="fas fa-check-circle"></i> Confirmar</a></div>
                          <br>
                        <table class="table table-striped table-bordered .table-responsive" style="font-family: Montserrat">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Descripcion</th>
                            <th style="text-align: center;">Precio</th>
                            <th style="text-align: center;">Cantidad</th>
                            <th style="text-align: left;font-size: 25px;">Fecha</th>
                            <th style="text-align: center;font-size: 35px;">Hora</th>
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
                     </div>
                  </div>
              </div>
                       <div class="form-actions_d" style="margin-top: -200px;">
                          <a class="btn btn-primary" href="pedidos.php?user=<?php echo $usuario ?>"><i class="fas fa-arrow-left"></i> Regresar</a>
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