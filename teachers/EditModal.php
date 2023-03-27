
<div class="modal fade" id="edit_<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">EDITAR DOCENTE</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="EditRegistro.php?id=<?php echo $row['Id']; ?>" enctype="multipart/form-data">
						<div class="row form-group">					
							<div class="row espacio">
								<div class="col-6">
									<label for="nombre">Nombre(s):</label>
									<input type="text" class="form-control" name="nombre" id="nombre" required="required" value="<?php echo $row['name']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" >
								</div>
								<div class="col-6">
									<label for="apellidos">Apellidos:</label>
									<input type="text" class="form-control" name="apellidos" id="apellidos" required="required" value="<?php echo $row['apellidos']; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" >
								</div>
							</div>

							<div class="row espacio">
								<div class="col-6">
									<label for="email">Correo:</label>
									<input type="text" class="form-control" name="email" id="email" required="required" value="<?php echo $row['correo']; ?>" onchange="validacorreo();">
								</div>
								<div class="col-6">
									<label for="rol">Rol:</label>
									<select class="form-select" name="rol" id="rol">
									<?php if($row['rol']=='Administrador'){ ?>
										<option value="Administrador">Administrador</option>
										<option value="Docente">Docente</option>
									<?php }else{ ?>
										<option value="Docente">Docente</option>
										<option value="Administrador">Administrador</option>
									<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<div id="cargando" class="loader" style="display: none" ></div>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" name="editar" class="btn btn-primary" onclick="mostrar(); this.onclick=function(){return false}">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>