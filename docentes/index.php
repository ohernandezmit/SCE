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
					Usuarios

					<div class="card-body">
						<div class="row">
							<div class="col-6"></div>
							<div class="col-6">
								<p style="text-align: right">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_" aria-expanded="false">
										<i class="bi bi-file-earmark-plus"></i>&nbsp;Agregar Usuario</button>
								</p>
							</div>
						</div>

						<table id="dataDocente">
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
						</table>
					</div>
				</div>
			</div>
		</main>
		<?php include "../temp/03.php"; ?>
	</div>
</div>

<script> 	
// Initialize DataTables API object and configure table
var table = $('#dataDocente').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "fetchData.php",
    "columnDefs": [
        { "orderable": false, "targets": 5 }
    ]
});

$(document).ready(function(){
    // Draw the table
    table.draw();
});
 </script>

