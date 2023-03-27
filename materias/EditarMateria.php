<!-- Modal -->
<div class="modal fade" id="edit_<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">EDITAR MATERIA</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="InsertRegistro.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="row espacio">
								<div class="col-6">
									<label class="form-label" for="nivel2">Nivel:</label>
									<select class='form-control' name="nivel2" id="nivel2" style="text-align: left" required="required" onchange="javascript: recargarGrado();">
										<option selected disabled value=""> - Seleccione - </option>
										<?php $queryN = "SELECT DISTINCT nombre, Id FROM niveles";
											  $rstN = $mysqli->query($queryN);
											  while($rowN = $rstN->fetch_array(MYSQLI_ASSOC)) {
											  	echo '<option value="'.$rowN['Id'].'">'.$rowN['nombre'].'</option>';
											  }
										 ?>
                                    </select>
								</div>
								<div class="col-6">
                                    <label class="form-label" for="grado2">Grade:</label>
                                    <!-- SELECT grado -->
                                	<div id="SelectGrado"></div>
                                	<!-- END SELECT grado -->
                                </div>

							</div>
							
							<div class="row espacio">
								<div class="col-2">
									<label class="form-label" for="materia">Materia:</label>
								</div>
								<div class="col-10">
									<input type="text" name="materia" id="materia" class='form-control' required="required" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
