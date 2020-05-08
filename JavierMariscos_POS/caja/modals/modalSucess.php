<!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edicion Producto</h4></center>
                </div>
                <div class="modal-body">  
          <div class="container-fluid">
            <form class="form" action="InsertaitemCuenta.php?user=<?php echo $usuario ?>&action=pagar&idCuenta=<?php echo $idCuenta ?>&Subtotal=<?php echo $Subtotal ?>&Iva=<?php echo $Iva ?>&Total=<?php echo $Total ?>" class="form" role="form" method="post" enctype="multipart/form-data"> 
              <div class="form-group input-group">
                <span class="input-group-addon" style="width:150px;">Monto:</span>
                <input type="text" style="width:350px;" class="form-control" id="monto" name="monto" disabled>
              </div>
 

              <div class="modal-footer">
                       <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Actualizar</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
                    </div>      
            </form>
          </div>
        </div>
         
            </div>
        </div>
    </div>
<!-- /.modal -->