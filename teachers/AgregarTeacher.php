<!-- Modal -->
<script type="text/javascript">
	function validacorreo(){
		var email = document.getElementById("email").value;
		
		var validEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if (!validEmail.test(email)){
        	alert("Error: La dirección de correo " + email + " es incorrecta.");
		}
	}

	function validar(){
		if (document.form_usuarios.nombre.value == "") {
			window.alert("The Comments are required.");
			return false
		}
   	}
</script>
<div class="modal fade" id="add_" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">AGREGAR DOCENTE</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form name="form_usuarios" method="POST" onSubmit="return valida()" action="InsertRegistro.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="row espacio">
								<div class="col-6">
									<label for="nombre">Nombre(s):</label>
									<input type="text" class="form-control" name="nombre" id="nombre" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();" >
								</div>
								<div class="col-6">
									<label for="apellidos">Apellidos:</label>
									<input type="text" class="form-control" name="apellidos" id="apellidos" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();" >
								</div>
							</div>

							<div class="row espacio">
								<div class="col-6">
									<label for="correo">Correo:</label>
									<input type="email" class="form-control" name="email" id="email" required="required" onchange="validacorreo();">
								</div>

								<div class="col-6">
									<label for="rol">Rol:</label>
									<select class="form-select" name="name_format" id="name_format">
										<option value="Administrador">Administrador</option>
										<option value="Docente">Docente</option>
									</select>
								</div>
							</div>

							<div class="masElementos" style="display: none">
								<div class="row espacio">
									<div class="col-4">
										<label for="grado">Turno:</label>
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

									<div class="col-4">
										<label for="nivel">Nivel:</label>
										<select id="select-nivel" name="select-nivel" class="form-control"> </select>
									</div>

									<div class="col-4">
										<label for="grado">Grados y Grupos</label>
										<select id="select-grado" name="select-grado" class="form-control"> </select>
									</div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<div id="cargando" class="loader" style="display: none" ></div>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" name="editar" class="btn btn-primary" onclick="mostrar();">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>