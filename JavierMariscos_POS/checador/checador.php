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
                      <h1><strong>Inventario <?php echo $action; ?></strong>  <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#nuevoitem"><span class="glyphicon glyphicon-plus"></span> Agregar</a> <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Insumos" class="btn btn-primary btn-lg" style="background-color:#FFCC00;"><img src="../images/Iconos/insumos.png" style="width: 25px; height:25px; padding: 0;" alt=""> Insumos</a> <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Mariscos" class="btn btn-primary btn-lg" style="background-color:#1978F7;"><img src="../images/Iconos/mariscos.png" style="width: 25px; height:25px; padding: 0;" alt=""> Mariscos</a> <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Mobiliario" class="btn btn-primary btn-lg" style="background-color:#BFFF00;"><img src="../images/Iconos/Cubiertos.png" style="width: 25px; height:25px; padding: 0;" alt=""> Mobiliario</a> <a href="muestrainventario.php?user=<?php echo $usuario ?>&action=Bebidas" class="btn btn-primary btn-lg" style="background-color:#D7023C;"><img src="../images/Iconos/invbebidas.png" style="width: 25px; height:25px; padding: 0;" alt=""> Bebidas</a></h1> 

                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th style="text-align: center; width: 10px;">#ID</th>
                            <th style="text-align: center;width: 10px;">Codigo</th>
                            <th style="text-align: center;">Producto</th>
                            <th style="text-align: center;width: 10px;">Precio</th>
                            <th style="text-align: center;width: 100px;">Stock</th>
                            <th style="text-align: center;width: 150px;">Categoria</th>
                            <th style="text-align: center;">Proveedor</th>
                            <th style="text-align: center;width: 80px;">Estado</th>
                            <th style="text-align: center;width: 100px;">Fecha</th>
                            <th style="text-align: center;width: 150px;">Acciones</th>
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


                              $statement = $db->query('SELECT A.id,A.codigo, A.nombre, A.precio, A.stock, B.nombre as categoria, C.razonsocial as proveedor, D.nombre as     unidad, E.nombre as estado, CONVERT(A.fecha, DATE) fecha
                                                      FROM catproductos A
                                                      INNER JOIN catcategorias B ON A.idcategoria = B.id
                                                      INNER JOIN catproveedores C ON A.idproveedor = C.id
                                                      INNER JOIN catunidades D ON A.idunidad = D.id
                                                      INNER JOIN catstatus E ON A.idstatus = E.id WHERE idcategoria = '.$categoryinv.'');



                              while($item = $statement->fetch()) 
                              {

                                    if ($item['id'] > 0){

                                      $Producto = $item['nombre'];                      
                                      $Precio = $item['precio'];   
                                      $Stock = $item['stock'];   
                                      $id = $item['id'];   
                              
                                      echo '<tr>';
                                      echo '<td style="font-weight:bold;text-align:center;">'. $item['id'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['codigo'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['nombre'] . '</td>';
                                      echo '<td style="text-align:center;">$'. $item['precio'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['stock'] . ' ' . $item['unidad'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['categoria'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['proveedor'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['estado'] . '</td>';
                                      echo '<td style="text-align:center;">'. $item['fecha'] . '</td>';
                                      
                                      echo '<td width=100>';

                                      //Botones Acciones
                                        echo '<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#edicioninventario"><span class="glyphicon glyphicon-edit"></span></a>  <a class="btn btn-success" href="#" data-toggle="modal" data-target="#historial"><span class="glyphicon glyphicon-time"></span></a>     <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#eliminaritem"><span class="glyphicon glyphicon-trash"></span></a>';

                                      
                                      echo '</td>';
                                      echo '</tr>';


                                  echo '   <!--Modal Edicion-->
                                            <div class="modal fade" id="edicioninventario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">

                                                    <div class="modal-header">   
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                      <h2 class="modal-title" id="exampleModalLongTitle" style="font-weight;bold;font-size:x-large;">'.$item['nombre'].' </h2>
                                                   
                                                    </div>

                                                    <div class="modal-body">
                                                      

                                                      <form class="form" action="inventariotransact.php?user='.$usuario.'&id='.$id.'&action=actualizainventario&tipoinv='. $action.'" class="form" role="form" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="precio">Precio:</label>
                                                            <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" value="'.$Precio.'">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stock">Stock:</label>
                                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" value="'.$Stock.'">
                                                        </div>
                                                       
                                                        <br>
                                                
                                                        <div class="modal-footer">
                                                          <button type="submit" class="btn btn-success">Guardar</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>

                                                      </form>


                                                    </div>

                                                  </div>
                                                </div>
                                            </div>
                                          <!--Modal Edicion-->     

                                              </tbody>
                                          </table>';
                                                }
                                              }

                                            ?>
                                            </div>

                                              <div class="form-actions" style="padding-top: 10px;">
                                                  <a class="btn btn-primary" href="../inventario/inventario.php?user=<?php echo $usuario ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                                             </div>

                                        </div>

                                  </div>

                                  
                                    <!--Modal Historial-->
                                    <div class="modal fade" id="historial" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">

                                            <div class="modal-header">   
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                              <h2 class="modal-title" id="exampleModalLongTitle2" style="font-weight;bold;font-size:x-large;">Historial Movimientos</h2>
                                           
                                            </div>

                                            <div class="modal-body">
                                                   <?php

                                              if ($id > 0) {

                                                  echo '
                                                  <table class="table table-striped table-bordered">
                                                  <thead>
                                                    <tr>
                                                      <th style="text-align: center;font-size: small;">Codigo</th>
                                                      <th style="text-align: center;font-size: small;">Producto</th>
                                                      <th style="text-align: center;font-size: small;">Precio</th>
                                                      <th style="text-align: center;font-size: small;">Stock</th>
                                                      <th style="text-align: center;font-size: small;">Categoria</th>
                                                      <th style="text-align: center;font-size: small;">Proveedor</th>
                                                      <th style="text-align: center;font-size: small;">Fecha</th>
                                                    </tr>
                                                  </thead>
                                                   <tbody>';
                                                       

                                                           $history = $db->query('SELECT A.idcatproductos,A.codigo, A.nombre, A.precio, A.stock, B.nombre as categoria, C.razonsocial as proveedor, D.nombre as     unidad, E.nombre as estado, CONVERT(A.fecha, DATE) fecha
                                                            FROM historialinventario A
                                                            INNER JOIN catcategorias B ON A.idcategoria = B.id
                                                            INNER JOIN catproveedores C ON A.idproveedor = C.id
                                                            INNER JOIN catunidades D ON A.idunidad = D.id
                                                            INNER JOIN catstatus E ON A.idstatus = E.id where idcatproductos = '.$id.'');


                                                           while($rows = $history->fetch()) 
                                                            {

                                                              
                                                                 echo '
                                                                <tr>
                                                                <td style="text-align:center;font-size: small;">'. $rows['codigo'] . '</td>
                                                                <td style="text-align:center;font-size: small;">'. $rows['nombre'] . '</td>
                                                                <td style="text-align:center;font-size: small;">$'.$rows['precio'] . '</td>
                                                                <td style="text-align:center;font-size: small;">'. $rows['stock'] . ' ' . $rows['unidad'] . '</td>
                                                                <td style="text-align:center;font-size: small;">'. $rows['categoria'] . '</td>
                                                                <td style="text-align:center;font-size: small;">'. $rows['proveedor'] . '</td>
                                                                <td style="text-align:center;font-size: small;">'. $rows['fecha'] . '</td>

                                                                </tr>';

                                                                
                                                              }
                                                             Database::disconnect();
                                                       echo '
                                                   </tbody>
                                               
                                                  </table>
                                        
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    </div>';
                                                        
                                                      }
                                                       ?>
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                  <!--Modal Historial-->

                                <!--Modal Eliminar-->
                                      <div class="modal fade" id="eliminaritem" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle3" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">

                                              <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                <h2 class="modal-title" id="exampleModalLongTitle3" style="font-weight;bold;font-size:x-large;">Eliminar Item</h2>
                                             
                                              </div>

                                              <div class="modal-body">

                                                 <span style="font-size: large;font-weight: bold; color: red;">¿Seguro que desea eliminar? </span><span style="font-size: xx-large;font-weight: bold;"><?php echo $Producto; ?></span>
                                          
                                                  <div class="modal-footer">
                                                    <a class="btn btn-danger" href="inventariotransact.php?user=<?php echo $usuario ?>&id=<?php echo $id; ?>&action=eliminaritem&tipoinv=<?php echo $action; ?>">Eliminar</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                  </div>
                                                      
                                              </div>

                                            </div>
                                          </div>
                                      </div>

                                <!--Modal Eliminar-->

                                <!--Modal Nuevo item-->
                                      <div class="modal fade" id="nuevoitem" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle4" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">

                                              <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                <h2 class="modal-title" id="exampleModalCenterTitle4" style="font-weight;bold;font-size:x-large;">Nuevo Item</h2>
                                             
                                              </div>

                                              <div class="modal-body">

                                                
                                                  <form class="form" action="checadortransact.php?user=<?php echo $usuario; ?>&id=<?php echo $id; ?>&action=nuevoitem&tipoinv=<?php echo $action; ?>" class="form" role="form" method="post" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                            <label for="codigo">Codigo:</label>
                                                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" value="<?php echo $codigo;?>"required>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="producto">Producto:</label>
                                                            <input type="text" class="form-control" id="producto" name="producto" placeholder="Producto" value="<?php echo $producto;?>" required>
                                                            
                                                        </div>
                                                          <div class="form-group">
                                                            <label for="precio">Precio:</label>
                                                            <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" value="<?php echo $precio;?>" required>
                                                            
                                                        </div>
                                                          <div class="form-group">
                                                            <label for="stock">Stock:</label>
                                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" value="'.$Stock.'" required>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="unidad">Unidad:
                                                            <select class="form-control" id="unidad" name="unidad"  style="width:500px; margin-left: -1px;" required>
                                                            <?php
                                                            $db = Database::connect();

                                                              echo '<option selected="selected" value="Seleccione">Seleccione</option>';
                                                            
                                                            foreach ($db->query('SELECT * FROM catunidades ORDER BY id ASC') as $row) 
                                                            {
                                                          
                                                                echo '<option  value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                                                
                                                            }
                                                            Database::disconnect();
                                                            ?>
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="categoria">Categoria:
                                                            <select class="form-control" id="categoria" name="categoria"  style="width:500px; margin-left: -1px;" required>
                                                            <?php
                                                            $db = Database::connect();

                                                            echo '<option selected="selected" value="Seleccione">Seleccione</option>';
                                                            
                                                            foreach ($db->query('SELECT * FROM catcategorias ORDER BY id DESC') as $row) 
                                                            {
                                                                
                                                                echo '<option value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                                                
                                                            }
                                                            Database::disconnect();
                                                            ?>
                                                            </select>
                                                            
                                                        </div>
                                                         <div class="form-group">
                                                            <label for="proveedor">Proveedor:
                                                            <select class="form-control" id="proveedor" name="proveedor"  style="width:500px; margin-left: -1px;" required>
                                                            <?php
                                                            $db = Database::connect();
                                                            
                                                            echo '<option selected="selected" value="Seleccione">Seleccione</option>';

                                                            foreach ($db->query('SELECT * FROM catproveedores ORDER BY id DESC') as $row) 
                                                            {
                                                                
                                                                echo '<option value="'. $row['id'] .'">'. $row['razonsocial'] . '</option>';
                                                                
                                                            }
                                                            Database::disconnect();
                                                            ?>
                                                            </select>
                                                            
                                                        </div>
                                                     
                                                        <div class="modal-footer">
                                                          <button type="submit" class="btn btn-success">Guardar</button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>

                                                  </form>
                    
                                                  </div>
                                                      
                                              </div>

                                            </div>

                                          </div>
                                      </div>

                                <!--Modal Nuevo item-->
                        
    </body>
</html>
