
<!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edicion Producto</h4></center>
                </div>
                <div class="modal-body"> 	
					<div class="container-fluid">
						<form class="form" action="inventariotransact.php?action=actualizainventario" class="form" role="form" method="post" enctype="multipart/form-data"> 
							<div class="form-group input-group" style="display: none">
								<input type="text" style="width:350px;" class="form-control" id="user" name="user" value="user">
							</div>	
							<div class="form-group input-group" style="display: none">
								<input type="text" style="width:350px;" class="form-control" id="tipoinv" name="tipoinv" value="tipoinv">
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon" style="width:150px;">Codigo:</span>
								<input type="text" style="width:350px;" class="form-control" id="id" name="id" value="id">
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon" style="width:150px;">Producto:</span>
								<input type="text" style="width:350px;font-weight: bold" class="form-control" id="nombre" name="nombre" value="nombre" disabled>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon" style="width:150px;">Precio:</span>
								<input type="text" style="width:350px;" class="form-control" id="precio" name="precio" value="precio">
							</div>		
							<div class="form-group input-group">
								<span class="input-group-addon" style="width:150px;">Stock:</span>
								<input type="text" style="width:350px;" class="form-control" id="stock" name="stock" value="stock">
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