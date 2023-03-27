<!-- Modal -->
<div class="modal fade" id="add_" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">AGREGAR NIVEL</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="InsertRegistro.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="row espacio">
								<div class="col-6">
									<label for="nombre">Nombre del nivel:</label>
									<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del nivel" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
								<div class="col-6">
									<label for="turno">Turno:</label>
									<select name="turno" id="turno" class="form-select" required="required">
										<option selected>Selecciona el turno</option>
										<?php $sqlN = "SELECT Id, turno FROM turnos WHERE activo = '0'";
											  $resN = $mysqli->query($sqlN);
											  While($rowN = $resN->fetch_array(MYSQLI_ASSOC)){ 
											  	echo "<option value=".$rowN['Id'].">".$rowN['turno']."</option>";
											  } ?>
									</select>
								</div>
							<div class="row espacio">
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