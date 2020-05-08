  
                                    <div class="modal fade" id="salidaitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle4" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">

                                              <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                <h2 class="modal-title" id="exampleModalCenterTitle4" style="font-weight;bold;font-size:x-large;">Hoy Sacaron </h2>
                                             
                                              </div>

                                                <div class="modal-body">
                                                                                              
                                                  <form class="form" action="inventariotransact.php?user=<?php echo $usuario; ?>&id=<?php echo $id; ?>&action=salidaitem&tipoinv=<?php echo $action; ?>" class="form" role="form" method="post" enctype="multipart/form-data">

                                                        <div class="form-group col-sm-6">
                                                          
                                                               <label for="unidad">Tipo Inventario:</label>
                                                                <select class="form-control" id="categoria" name="categoria"  style="width:250px; margin-left: -1px;" required>
                                                                <?php
                                                                $db = Database::connect();

                                                                  echo '<option selected="selected" value="Seleccione">Seleccione</option>';
                                                                
                                                                foreach ($db->query('SELECT * FROM catcategorias WHERE nombre <> "MOBILIARIO" ORDER BY id ASC') as $row) 
                                                                {
                                                              
                                                                    echo '<option  value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                                                    
                                                                }
                                                                Database::disconnect();
                                                                ?>
                                                                </select>
                                                            
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                     
                                                              <label for="unidad">Producto:</label>
                                                              <select class="form-control" id="producto" name="producto"  style="width:250px; margin-left: -1px;" required>
                                                              <?php
                                                              $db = Database::connect();

                                                                echo '<option selected="selected" value="Seleccione">Seleccione</option>';
                                                              
                                                              foreach ($db->query('SELECT * FROM catproductos WHERE stock > 1 ORDER BY id ASC') as $row) 
                                                              {
                                                            
                                                                  echo '<option  value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                                                  
                                                              }
                                                              Database::disconnect();
                                                              ?>
                                                              </select>
                                                            
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            
                                                              <label for="concepto">Cantidad:</label>
                                                              <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                                                            
                                                        </div>
                                                        <div class="form-group col-sm-6">

                                                                <label for="unidad">Unidad:</label>
                                                                <select class="form-control" id="unidad" name="unidad"  style="width:250px; margin-left: -1px;" required>
                                                                <?php
                                                                $db = Database::connect();

                                                                  echo '<option selected="selected" value="Seleccione">Seleccione</option>';
                                                                
                                                                foreach ($db->query('SELECT * FROM catunidades WHERE idstatus = 1 ORDER BY id ASC') as $row) 
                                                                {
                                                              
                                                                    echo '<option  value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                                                    
                                                                }
                                                                Database::disconnect();
                                                                ?>
                                                                </select>
                                                            
                                                        </div>
                                        <button type="submit" class="btn btn-success" style="margin-left: 470px;">Guardar</button>

                                        <table class="table table-striped table-bordered" style="margin-top:15px;">
                                            <thead>
                                              <tr>
                                                <th style="text-align: center;">Producto</th>
                                                <th style="text-align: center;">Cantidad</th>
                                                <th style="text-align: center;width: 100px;">Unidad</th>
                                                <th style="text-align: center;width: 100px;">Fecha Salida</th>
                                                <th style="text-align: center;width: 50px;">Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php


                                                  $db = Database::connect();


                                                  $statement = $db->query('SELECT A.id,b.nombre as Categoria, c.nombre AS Producto, d.nombre as                              Unidad, E.name as Usuario,A.cantidad,CONVERT(A.fechasalida, DATE) AS fechasalida
                                                                          FROM salidainventario A
                                                                          INNER JOIN catcategorias B ON A.idcategoria = B.id
                                                                          INNER JOIN catproductos C ON A.idproducto = C.id
                                                                          INNER JOIN catunidades D ON A.idunidad = D.id
                                                                          INNER JOIN catusers E ON A.idusuario = E.id 
                                                                          WHERE CONVERT(A.fechasalida, DATE) = CURDATE() ORDER BY id ASC');



                                                  while($item = $statement->fetch()) 
                                                  {


                                                    ?>
                                                          <tr>
                                                            <td style="display: none"><span id="user<?php echo $item['id']; ?>"><?php echo $usuario; ?></span></td>
                                                            <td style="display: none"><span id="tipoinv<?php echo $item['id']; ?>"><?php echo $action; ?></span></td>
                                                            <td style="text-align: center;font-weight: bold;"><span id="Categoria<?php echo $item['id']; ?>"><?php echo $item['Producto']; ?></span></td>
                                                            <td style="text-align: center;font-weight: bold;"><span id="Cantidad<?php echo $item['id']; ?>"><?php echo $item['cantidad']; ?></span></td>
                                                            <td style="text-align: center;"><span id="Unidad<?php echo $item['id']; ?>"><?php echo $item['Unidad']; ?></span></td>
                                                            <td style="text-align: center;"><span id="fechasalida<?php echo $item['id']; ?>"><?php echo $item['fechasalida']; ?></span></td>

                                                            <td style="text-align: center;">
                                                              <button type="button" class="btn btn-primary edit" value="<?php echo $item['id']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                                                            </td>

                                                          </tr>
                                                    
                                                    <?php

                                                        }
                                                      ?>
                                                    
                                                      </tbody>
                                                      </table>
                                                     
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>

                                                  </form>
                    
                                                  </div>
                                                      
                                            </div>

                                          </div>
                                      </div>

                                <!--Modal Nuevo item-->