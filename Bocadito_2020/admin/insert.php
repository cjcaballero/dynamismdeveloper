<?php
     
    require 'database.php';

    $usuario  = $_GET['user'];
 
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
        $isUploadSuccess    = false;
        
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
        if(empty($image)) 
        {
            $imageError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Los archivos permitidos son: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }

            if($_FILES["image"]["size"] > 1000000) 
            {
                $imageError = "El archivo no debe exceder el 500 KB";
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
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO items (name,description,price,category,image) values(?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description,$price,$category,$image));
            Database::disconnect();
            //if( $statement ) return $return = "ok" : $return = "fail";


            header("Location: index.php?user=$usuario");
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
                    <h1><strong>Agregar producto</strong></h1>
                    <br>
                    <form class="form" action="insert.php?user=<?php echo $usuario ?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $name;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción:</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Descripción" value="<?php echo $description;?>">
                            <span class="help-inline"><?php echo $descriptionError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="price">Precio: (MXN)</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Precio" value="<?php echo $price;?>">
                            <span class="help-inline"><?php echo $priceError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="category">Categoría:</label>
                            <select class="form-control" id="category" name="category">
                            <?php
                               $db = Database::connect();
                               foreach ($db->query('SELECT * FROM categories') as $row) 
                               {
                                    echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                               }
                               Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $categoryError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="image">Selecciona una imagen:</label>
                            <input type="file" id="image" name="image"> 
                            <span class="help-inline"><?php echo $imageError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Agregar</button>
                            <a class="btn btn-primary" href="index.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                       </div>
                    </form>
                </div>
            </div>   

        </div>
    </body>
</html>