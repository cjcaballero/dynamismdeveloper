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



<!DOCTYPE html>
<html>
    <head>
        <?php include("head.php")?>
    </head>
    
    <body>
         <div class="container">
            <a href="index.php?user=<?php echo $usuario ?>"><div class="logo"></div></a>
                 <div class="container admin">
                        <div style="text-align: right; font-weight: bold;"><span style="color: #3BBFE5;">Bienvenido: </span> <?php echo $usuario ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="logout.php">Cerrar Sesion</a></span></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h1><strong>Editar producto</strong></h1>
                            <br>
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
                                <img src="<?php echo '../images/Productos/'.$image;?>" alt="...">
                                <div class="price"><?php echo number_format((float)$price, 2). ' $';?></div>
                                  <div class="caption">
                                    <h4><?php echo $name;?></h4>
                                    <p><?php echo $description;?></p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Ordenar</a>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>   
        </div>
    </body>
</html>
