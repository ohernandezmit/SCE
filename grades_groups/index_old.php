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
				<i class="bi bi-flag-fill"></i>
					Grados y Grupos
					
					<div class="card-body">
						<div class="row">
							<div class="col-6"></div>
							<div class="col-6">
								<p style="text-align: right">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_" aria-expanded="false">
										<i class="bi bi-file-earmark-plus"></i>&nbsp;Agregar</button>
								</p>
							</div>
						</div>
					
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Turno</th>
									<th class="text-center">Opciones</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Turno</th>
									<th class="text-center">Opciones</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
								$sq="SELECT * FROM niveles WHERE activo = '0'";
								$rs=$mysqli->query($sq);
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
								
								$edit = '<div class="btn-group">
		                                <button type="button" class="btn btn-outline-success btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                    <i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#edit_'.$row['Id'].'"></i>
		                                </button>
		                            </div>';
								?>
								<tr>
									<th scope="row" class="text-center"><?php echo $row['Id']; ?></th>
									<td class="text-center"><?php echo $row['nombre']; ?></td>
									<td class="text-center"><?php echo $row['turno']; ?></td>
									<td class="text-center"><?php echo $edit; ?></td>
									<?php include "EditModal.php"; ?>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
<?php include('AgregarGrade.php'); include "../temp/03.php"; ?>
	</div>
</div>