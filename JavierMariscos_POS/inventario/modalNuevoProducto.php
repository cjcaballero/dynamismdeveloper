 <!--Modal Nuevo item-->
                                      <div class="modal fade" id="nuevoitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle4" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">

                                              <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                <h2 class="modal-title" id="exampleModalCenterTitle4" style="font-weight;bold;font-size:x-large;">Nuevo Item</h2>
                                             
                                              </div>

                                              <div class="modal-body">

                                                
                                                  <form class="form" action="inventariotransact.php?user=<?php echo $usuario; ?>&id=<?php echo $id; ?>&action=nuevoitem&tipoinv=<?php echo $action; ?>" class="form" role="form" method="post" enctype="multipart/form-data">

<!--                                                    <div class="form-group">
                                                            <label for="codigo">Codigo:</label>
                                                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" value="000"required>
                                                            
                                                        </div> -->
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
                                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" value="<?php echo $stock;?>" required>
                                                            
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