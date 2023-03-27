<!-- Modal -->
<div class="modal fade" id="editT_<?php echo $rowT['Id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">EDITAR TURNO</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="EditRegistro2.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col-3">
								<label for="nombre">Nombre:</label>
							</div>
							<div class="col-6">
								<input type="hidden" class="form-control" name="idT" id="idT" value="<?php echo $rowT['Id']; ?>">
								<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $rowT['turno']; ?>" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();">
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