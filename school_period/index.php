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
					<i class="fas fa-table me-1"></i>
					Ciclo Escolar

					<div class="card-body">
						<div class="row">
							<div class="col-6"></div>
							<div class="col-6">
								<p style="text-align: right">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_" aria-expanded="false">
										<i class="bi bi-file-earmark-plus"></i>&nbsp;Agregar Nuevo Ciclo</button>
								</p>
							</div>
						</div>

						<table id="datatablesSimple">
							<thead>
								<tr>
									<th class="text-center">Ciclo Escolar</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Fecha Inicio</th>
									<th class="text-center">Fecha Fin</th>
									<th class="text-center">Activo</th>
									<th class="text-center">Opciones</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th class="text-center">Periodo Escolar</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Fecha Inicio</th>
									<th class="text-center">Fecha Fin</th>
									<th class="text-center">Activo</th>
									<th class="text-center">Opciones</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
								$sq="SELECT * FROM periodo WHERE activo='1'";
								$rs=$mysqli->query($sq);
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
									if ($row['activo']==0) { $activo = "No"; } else { $activo = "Si"; }
									
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
									<th scope="row"><?php echo $row['periodo']; ?></th>
									<td><?php echo $row['nombre']; ?></td>
									<td class="text-center"><?php echo $row['fecha_ini']; ?></td>
									<td class="text-center"><?php echo $row['fecha_fin']; ?></td>
									<td class="text-center"><?php echo $activo; ?></td>
									<td class="text-center"><?php echo $edit.'&nbsp;&nbsp;'.$delete; ?></td>
									<?php include "EditModal.php"; include "DeleteModal.php"; ?>
								</tr>
								<?php 
							} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
		<?php include('AgregarPeriodo.php');  include "../temp/03.php"; ?>
	</div>
</div>