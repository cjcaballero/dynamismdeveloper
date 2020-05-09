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
                              <p>DETALLES PRODUCTO</p>
                          </div>
                           <div class="col-xs-12 col-md-12 subtitle-emp"  style="padding-bottom: 5%;">

                                    <p><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></p> 

                          </div>
                          <div class="col-sm-6 decription-pedidos">
                            <form>
                              <div>
                                <label>Nombre:</label><div class="desc-product"><?php echo '  '.$item['name'];?></div>
                              </div>
                              <div class="form-group">
                                <label>Descripción:</label><div class="desc-product"><?php echo '  '.$item['description'];?></div>
                              </div>
                              <div class="form-group">
                                <label>Precio:</label><div class="desc-product"><?php echo '  $ '.number_format((float)$item['price'], 2). ' ';?></div>
                              </div>
                              <div class="form-group">
                                <label>Categoría:</label><div class="desc-product"><?php echo '  '.$item['category'];?></div>
                              </div>
                              <div class="form-group">
                                <label>Imagen:</label><div class="desc-product"><?php echo '  '.$item['image'];?></div>
                              </div>
                            </form>
                            
                        </div> 

                        <div class="col-sm-6 site">
                            <div class="thumbnail">
                                <img src="<?php echo '../images/'.$item['image'];?>" alt="...">
                                <div class="price"><?php echo number_format((float)$item['price'], 2). ' $';?></div>
                                  <div class="caption">
                                    <h4><?php echo $item['name'];?></h4>
                                    <p><?php echo $item['description'];?></p>
                                  </div>
                     </div>
                  </div>
              </div>
            </div>
          </div>
                       <div class="form-actions_d">
                          <a class="btn btn-primary" href="index.php?user=<?php echo $usuario ?>"><i class="fas fa-arrow-left"></i> Regresar</a>
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