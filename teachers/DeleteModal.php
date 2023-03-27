<!-- Modal -->
<div class="modal fade" id="delete_<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">SUSPENDER DOCENTE</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="DeleteRegistro.php?id=<?php echo $row['Id']; ?>" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col-lg" style="text-align: center;">
								<a style="font-size: 8em; border-color: #facea8; color: #f8bb86;">
									<i class="bi bi-exclamation-circle warning"></i>
								</a>
								<h1>¿Estás seguro?</h1>
								<h5>¡No podrás revertir esto!</h5>
							</div>					
						</div>
						<div class="modal-footer">
							<div id="cargando" class="loader" style="display: none" ></div>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" name="editar" class="btn btn-danger" onclick="mostrar(); this.onclick=function(){return false}">Eliminar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>