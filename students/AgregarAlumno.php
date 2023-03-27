<!-- Modal -->
<div class="modal fade" id="add_" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">AGREGAR ALUMNO</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="InsertRegistro.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="row espacio">
								<div class="col-6">
									<label for="nombre">Nombre:</label>
									<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre(s) del alumno" required="required">
								</div>
								<div class="col-6">
									<label for="apellido">Apellido:</label>
									<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido(s) del alumno" required="required">
								</div>
							</div>
							
							<div class="row espacio">
								<div class="col-3">
									<label for="grado">Grado:</label>
									<input type="text" class="form-control" name="grado" id="grado" placeholder="Grado del alumno" required="required">
								</div>
								<div class="col-3">
									<label for="grupo">Grupo:</label>
									<input type="text" class="form-control" name="grupo" id="grupo" placeholder="Grupo del alumno" required="required">
								</div>
								<div class="col-6">
									<label for="turno">Turno:</label>
									<select name="turno" id="urno" class="form-select">
										<option value="">Selecciona el turno<option
										<option value="Matutino">Matutino</option>
										<option value="Vespertino">Vespertino</option>
									</select>
								</div>
							</div>
							
							<div class="row">
								<div class="col-12">
									<label for="curp">CURP:</label>
									<input type="text" class="form-control" name="curp" id="curp" placeholder="CURP del alumno" required="required">	
								</div>
							</div>
							
						</div>
						<div class="modal-footer">
							<div id="cargando" class="loader" style="display: none" ></div>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="editar" class="btn btn-primary" onclick="mostrar(); this.onclick=function(){return false}">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>