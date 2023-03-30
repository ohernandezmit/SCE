<div class="modal fade" id="capture_<?php echo $row['matricula']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">CAPTURAR CALIFICACIONES</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="save.php" enctype="multipart/form-data">
					    <input type="text" class="form-control" name="matricula" id="matricula" value="<?php echo $row['matricula']; ?>" hidden>
					    <input type="text" class="form-control" name="id_ciclo" id="id_ciclo" value="<?php echo $row['id_ciclo']; ?>" hidden>
					    <?php
					        $grado = $row['id_grado'];
					        $sqm="SELECT * FROM materia WHERE Id_grado = '$grado' ";
					            $rsm=$mysqli->query($sqm);
					                while ($rowm=$rsm->fetch_array(MYSQLI_ASSOC))
					                {
					    ?>
						<div class="row form-group">
							<div class="row espacio">
							    <div class="col-4">
							        <label for="materia"><?php echo $rowm['materia']; ?></label>
							        <input type="text" class="form-control" name="id_materia[]" id="id_materia" value="<?php echo $rowm['Id']; ?>" hidden>
							    </div>
							    <div class="col-2">
								    <input type="text" class="form-control" name="materia[]" id="materia" value="0">
								</div>
							</div>
						</div>
						<?php
					                }
						?>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" name="save" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>