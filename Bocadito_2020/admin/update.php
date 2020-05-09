<?php

    require 'database.php';

    $usuario  = $_GET['user'];

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    $nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $price              = checkInput($_POST['price']);
        $category           = checkInput($_POST['category']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
       
        if(empty($name)) 
        {
            $nameError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        if(empty($description)) 
        {
            $descriptionError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
        if(empty($price)) 
        {
            $priceError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
         
        if(empty($category)) 
        {
            $categoryError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        if(empty($image)) // le input file est vide, ce qui signifie que l'image n'a pas ete update
        {
            $isImageUpdated = false;
        }
        else
        {
            $isImageUpdated = true;
            $isUploadSuccess =true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Los archivos permitidos son: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
           /* if(file_exists($imagePath)) 
            {
                $imageError = "El archivo ya existe";
                $isUploadSuccess = false;
            }
            */
            if($_FILES["image"]["size"] > 1000000) 
            {
                $imageError = "El archivo no puede ser mayor de 1000KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Se ha producido un error al subir el archivo";
                    $isUploadSuccess = false;
                } 
            } 
        }
         
        if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) 
        { 
            $db = Database::connect();
            if($isImageUpdated)
            {
                $statement = $db->prepare("UPDATE items  set name = ?, description = ?, price = ?, category = ?, image = ? WHERE id = ?");
                $statement->execute(array($name,$description,$price,$category,$image,$id));
            }
            else
            {
                $statement = $db->prepare("UPDATE items  set name = ?, description = ?, price = ?, category = ? WHERE id = ?");
                $statement->execute(array($name,$description,$price,$category,$id));
            }
            Database::disconnect();
            header("Location: index.php?user=$usuario");
        }
        else if($isImageUpdated && !$isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM items where id = ?");
            $statement->execute(array($id));
            $item = $statement->fetch();
            $image          = $item['image'];
            Database::disconnect();
           
        }
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM items where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name           = $item['name'];
        $description    = $item['description'];
        $price          = $item['price'];
        $category       = $item['category'];
        $image          = $item['image'];
        Database::disconnect();
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
                              <p>EDITAR PRODUCTOS</p>
                          </div>
                           <div class="col-xs-12 col-md-12 subtitle-emp">

                                    <p><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></p> 

                          </div>

                   <form class="form" action="update.php?id=<?php echo $id ?>&user=<?php echo $usuario ?>" role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Nombre:
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $name;?>">
                                    <span class="help-inline"><?php echo $nameError;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="description">Descripción:
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Descripción" value="<?php echo $description;?>">
                                    <span class="help-inline"><?php echo $descriptionError;?></span>
                                </div>
                                <div class="form-group">
                                <label for="price">Precio: (MXN)
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Precio" value="<?php echo $price;?>">
                                    <span class="help-inline"><?php echo $priceError;?></span>
                                </div>


                                <div class="form-group">
                                    <label for="category">Categoría:
                                    <select class="form-control" id="category" name="category">
                                    <?php
                                       $db = Database::connect();
                                       foreach ($db->query('SELECT * FROM categories') as $row) 
                                       {
                                            if($row['id'] == $category)
                                                echo '<option selected="selected" value="'. $row['id'] .'">'. $row['name'] . '</option>';
                                            else
                                                echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                                       }
                                       Database::disconnect();
                                    ?>
                                    </select>
                                    <span class="help-inline"><?php echo $categoryError;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="image">Imagen:</label>
                                    <p><?php echo $image;?></p>
                                    <label for="image">Selecciona una nueva imagen::</label>
                                    <input type="file" id="image" name="image"> 
                                    <span class="help-inline"><?php echo $imageError;?></span>
                                </div>
                                <br>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>
                                    <a class="btn btn-primary" href="index.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                               </div>
                            </form>
                        </div>
                        <div class="col-sm-6 site">
                            <div class="thumbnail">
                                <img src="<?php echo '../images/'.$image;?>" alt="...">
                                <div class="price"><?php echo number_format((float)$price, 2). ' $';?></div>
                                  <div class="caption">
                                    <h4><?php echo $name;?></h4>
                                    <p><?php echo $description;?></p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Ordenar</a>
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