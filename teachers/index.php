<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";

session_start();
if (empty($_SESSION["cuenta"])) {

	header("Location: $server_name");

	exit();
}

include "../temp/01.php";
include "../temp/02.php";
$cuenta = $_SESSION['cuenta'];
$fecha = date('Y/m/d');
?>
<div id="layoutSidenav">
	<?php include "../temp/menu.php"; ?>
	<div id="layoutSidenav_content">
		<main>
			<div class="card mb-4">
				<div class="card-header">
					<i class="bi bi-person-workspace"></i>
					Docentes

					<div class="card-body">
						<div class="row">
							<div class="col-6"></div>
							<div class="col-6">
								<p style="text-align: right">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_" aria-expanded="false">
										<i class="bi bi-file-earmark-plus"></i>&nbsp;Agregar Docente</button>
								</p>
							</div>
						</div>

						<table id="datatablesSimple">
							<thead>
								<tr>
									<th class="text-center">Nombre(s)</th>
									<th class="text-center">Apellidos</th>
									<th class="text-center">Correo</th>
									<th class="text-center">Rol</th>
									<th class="text-center">Estatus</th>
									<th class="text-center">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sq="SELECT * FROM teachers WHERE estatus='1'";
								$rs=$mysqli->query($sq);
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
									if ($row['estatus']==1) { $activo = "Activo"; } else { $activo = "Inactivo"; }
									
									$edit = '<div class="btn-group">
		                                <button type="button" class="btn btn-outline-success btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                    <i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#edit_'.$row['Id'].'"></i>
		                                </button>
		                            </div>';
		                            
									$delete = '<div class="btn-group">
		                                <button type="button" class="btn btn-outline-danger btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                    <i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#delete_'.$row['Id'].'"></i>
		                                </button>
		                            </div>';
								?>
								<tr>
									<th scope="row"><?php echo $row['name']; ?></th>
									<td><?php echo $row['apellidos']; ?></td>
									<td><?php echo $row['correo']; ?></td>
									<td class="text-center"><?php echo $row['rol']; ?></td>
									<td class="text-center"><?php echo $activo; ?></td>
									<td class="text-center"><?php echo $edit.'&nbsp;&nbsp;'.$delete; ?></td>
									<?php include "EditModal.php"; include "DeleteModal.php"; ?>
								</tr>
								<?php 
							} ?>
							</tbody>
							<tfoot>
								<tr>
									<th class="text-center">Nombre(s)</th>
									<th class="text-center">Apellidos</th>
									<th class="text-center">Correo</th>
									<th class="text-center">Rol</th>
									<th class="text-center">Estatus</th>
									<th class="text-center">Opciones</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</main>
		<?php include('AgregarTeacher.php');  include "../temp/03.php"; ?>
	</div>
</div>

<script> 		
$(document).ready(function(){

// Funcion para mostrar u ocultar div con los campos turno, nivel, grado y grupo
	$('#rol').on('change',function(){
            var selectvalor = $(this).val(); //alert(selectvalor);
            if (selectvalor == 'Administrador') {
                $('.masElementos').css('display','none');
            } else {
                $('.masElementos').css('display','block');
            }
        });	

// Funcion para llenado de niveles  
    
$("#select-turno").on('change', function () {
        $("#select-turno option:selected").each(function () {
            var turno = $(this).val();
            //alert(turno);
            $.post("consulta_nivel.php", { turno: turno }, function(data) {
                $("#select-nivel").html(data);
            });			
        });
 });

 // Funcion para llenado de grado y grupo 

 $("#select-nivel").on('change', function () {
        $("#select-nivel option:selected").each(function () {
            var nivel = $(this).val();
            //alert(nivel);
            $.post("consulta_grado.php", { nivel: nivel }, function(data) {
                $("#select-grado").html(data);
            });			
        });
 });

});
 </script>