  <?php 

      require '../database.php';
      include '../dbConfig.php';


   
      $codigo = $producto = $precio= $stock = $categoria = $proveedor = $unidad = "";


      $usuario  = $_GET['user'];

      $action = $_GET['action'];

      $id = 0;


         if(!empty($_GET['return'])) {

          $return  = $_GET['return'];

           if ($return == 'ok'){

              echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    ¡Inventario actualizado con Exito!</strong>
                   </div>';

                  $return ='success';


              } 

            elseif ($return == 'fail'){

              echo '<div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    ¡No existen cambios por realizar en el Inventario!</strong>
                   </div>';

                  $return ='success';
              }  

              if ($return == 'elimina'){

                  echo '<div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    ¡El item fue eliminado correctamente!</strong>
                   </div>';

                  $return ='success';


              } 

              if ($return == 'new'){

                  echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    ¡El item fue registrado correctamente!</strong>
                   </div>';

                  $return ='success';


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

  

        <title>Javier Mariscos | Los Originales desde 1980&#174;</title>
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
                      <h1><strong>Inven. <?php echo $action; ?></strong>  <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#nuevoitem"><span class="glyphicon glyphicon-plus"></span> Alta</a> <a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#salidaitem"><span class="glyphicon glyphicon-log-out"></span> Hoy Sacaron</a> <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Insumos" class="btn btn-primary btn-lg" style="background-color:#FFCC00;"><img src="../images/Iconos/insumos.png" style="width: 25px; height:25px; padding: 0;" alt=""> Insumos</a> <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Mariscos" class="btn btn-primary btn-lg" style="background-color:#1978F7;"><img src="../images/Iconos/mariscos.png" style="width: 25px; height:25px; padding: 0;" alt=""> Mariscos</a> <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Bebidas" class="btn btn-primary btn-lg" style="background-color:#D7023C;"><img src="../images/Iconos/invbebidas.png" style="width: 25px; height:25px; padding: 0;" alt=""> Bebidas</a></h1> 

                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th style="text-align: center; width: 10px;">Codigo</th>
                            <th style="text-align: center;">Producto</th>
                            <th style="text-align: center;width: 10px;">Precio</th>
                            <th style="text-align: center;width: 100px;">Stock</th>
                            <th style="text-align: center;width: 100px;">Unidad</th>
                            <th style="text-align: center;">Proveedor</th>
                            <th style="text-align: center;width: 80px;">Estado</th>
                            <th style="text-align: center;width: 100px;">Fecha Alta</th>
                            <th style="text-align: center;width: 50px;">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php


                              $db = Database::connect();

                              if ($action == 'Mariscos'){

                                 $categoryinv = 1;

                              }
                              elseif ($action == 'Insumos'){

                                 $categoryinv = 2;

                              }

                              elseif ($action == 'Bebidas'){

                                 $categoryinv = 3;

                              }

                              else{

                                  $categoryinv = 4;

                              }


                              $statement = $db->query('SELECT A.id,A.codigo, A.nombre, A.precio, A.stock, B.nombre as categoria, C.razonsocial as proveedor, D.nombre as     unidad, E.nombre as estado, CONVERT(A.fecha, DATE) fecha, idcajero
                                                      FROM catproductos A
                                                      INNER JOIN catcategorias B ON A.idcategoria = B.id
                                                      INNER JOIN catproveedores C ON A.idproveedor = C.id
                                                      INNER JOIN catunidades D ON A.idunidad = D.id
                                                      INNER JOIN catstatus E ON A.idstatus = E.id WHERE idcategoria = '.$categoryinv.' ORDER BY id ASC');



                              while($item = $statement->fetch()) 
                              {



                                    if ($item['id'] > 0){

                                      $Producto = $item['nombre'];                      
                                      $Precio = $item['precio'];   
                                      $Stock = $item['stock'];   

                                      if ($Stock <= 1){

                                        $color = 'red;font-weight:bold;'; 

                                      }else{

                                        $color = 'black;'; 

                                      }


                                      $id = $item['id'];   

                                ?>
                                      <tr>
                                        <td style="display: none"><span id="user<?php echo $item['id']; ?>"><?php echo $usuario; ?></span></td>
                                        <td style="display: none"><span id="tipoinv<?php echo $item['id']; ?>"><?php echo $action; ?></span></td>
                                        <td style="text-align: center;"><span id="id<?php echo $item['id']; ?>"><?php echo $item['id']; ?></span></td>
                                        <td style="text-align: center;font-weight: bold;"><span id="nombre<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></span></td>
                                        <td style="text-align: center;"><span id="precio<?php echo $item['id']; ?>"><?php echo $item['precio']; ?></span></td>
                                        <td style="text-align: center;color:<?php echo $color;?>;"><span id="stock<?php echo $item['id']; ?>"><?php echo $item['stock']; ?></span></td>
                                        <td style="text-align: center;"><span id="categoria<?php echo $item['id']; ?>"><?php echo $item['unidad']; ?></span></td>
                                        <td style="text-align: center;"><span id="proveedor<?php echo $item['id']; ?>"><?php echo $item['proveedor']; ?></span></td>
                                        <td style="text-align: center;"><span id="estado<?php echo $item['id']; ?>"><?php echo $item['estado']; ?></span></td>
                                        <td style="text-align: center;"><span id="fecha<?php echo $item['id']; ?>"><?php echo $item['fecha']; ?></span></td>

                                        <td style="text-align: center;">
                                          <button type="button" class="btn btn-primary edit" value="<?php echo $item['id']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                                        </td>

                                      </tr>
                                
                                <?php
                                   }

                                  }
                                  ?>
                                
                                  </tbody>
                                </table>
                              </div>

                              <div class="form-actions" style="padding-top: 10px;">
                                  <a class="btn btn-primary" href="../inventario/inventario.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                             </div>

                                        </div>

                                  </div>
                        
<?php include('../inventario/modalEditProducto.php'); ?>
<?php include('../inventario/modalNuevoProducto.php'); ?>
<?php include('../inventario/modalSalidaProducto.php'); ?>
<script src="../js/custom.js"></script>        


     



</body>
</html>
