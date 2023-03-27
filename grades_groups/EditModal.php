<!-- Modal -->
<div class="modal fade" id="edit_<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">EDITAR NIVEL</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="EditRegistro.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="row espacio" style="display: none">
								<div class="col-6">
									<label for="id">Id:</label>
									<input type="text" class="form-control" name="id" id="id" value="<?php echo $row['Id']; ?>" required="required">
								</div>
							</div>
							<div class="row espacio">
								<div class="col-6">
									<label for="nombre">Nombre:</label>
									<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
								<div class="col-6">
									<label for="turno">Turno:</label>
									<select name="turno" id="turno" class="form-select" required="required">
										<option value="<?php echo $row['turno']; ?>"><?php echo $row['turno']; ?></option>
										<?php
												$turno = $row['turno'];
          										$query = $mysqli -> query ("SELECT DISTINCT turno FROM niveles WHERE turno != '$turno' ");
          												while ($valores = mysqli_fetch_array($query)) { ?>
            												<option value="<?php echo $valores['turno']; ?>"><?php echo $valores['turno']; ?></option>
          												<?php }
        									?>
										<!-- 
<option value="Matutino">Matutino</option>
										<option value="Vespertino">Vespertino</option>
 -->
									</select>
								</div>
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