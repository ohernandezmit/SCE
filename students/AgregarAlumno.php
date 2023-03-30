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
								<div class="col-sm-3" style="padding-bottom: 20px;">
											<p>Turno:</p>
												<select id="select-turno" name="select-turno" class="form-control">
									
									<?php																
									
									$sq="SELECT * FROM turnos WHERE activo = '0' ";
									$rs=$mysqli->query($sq);
									
									echo '<option value="0">Selecciona un turno</option>';
									
									while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
																
									echo '<option value="'.$row['Id'].'">'.$row['turno'].'</option>';
																
									}	
									?>
								</select>
								</div>
								<div class="col-sm-6" style="padding-bottom: 20px;">
									<p>Nivel:</p>
										<select id="select-nivel" name="select-nivel" class="form-control" >
										</select>
 							 	</div>
								<div class="col-3">
									
								</div>
								<div class="col-3">
									
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
<script> 		
$(document).ready(function(){

// Funcion para llenado de select  
    
    $("#select-turno").on('change', function () {
        $("#select-turno option:selected").each(function () {
            var turno = $(this).val();
            alert(turno);
            $.post("consulta_nivel.php", { turno: turno }, function(data) {
                $("#select-nivel").html(data);
            });			
        });
 });
 </script>