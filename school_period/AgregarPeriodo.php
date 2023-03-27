<!-- Modal -->
<div class="modal fade" id="add_" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">AGREGAR PERIODO</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="InsertRegistro.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="row espacio">
								<div class="col-6">
									<label for="periodo">Periodo:</label>
									<input type="text" class="form-control" name="periodo" id="periodo" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();" >
								</div>
								<div class="col-6">
									<label for="nombre">Nombre:</label>
									<input type="text" class="form-control" name="nombre" id="nombre" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();" >
								</div>
							</div>

							<div class="row espacio">
								<div class="col-4">
									<label for="fecha_ini">Fecha Inicio:</label>
									<input type="date" class="form-control" name="fecha_ini" id="fecha_ini" required="required">
								</div>
								<div class="col-4">
									<label for="fecha_fin">Fecha Fin:</label>
									<input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required="required">
								</div>
								<div class="col-4">
									<label for="activo">Activo</label>
									<select name="activo" id="activo" class="form-select" >
										<option value="0">No</option>
										<option value="1">Si</option>
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