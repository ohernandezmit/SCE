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
					Alumnos
					
					<div class="card-body">
						<div class="row">
							<div class="col-6"></div>
							<div class="col-6">
								<p style="text-align: right">
									<a type="button" class="btn btn-primary" href="alumnoNuevo.php"><i class="bi bi-file-earmark-plus"></i>&nbsp;Agregar Alumno</a>
								</p>
							</div>
						</div>
					
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th>Matricula</th>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Grado</th>
									<th>Grupo</th>
									<th>Curp</th>
									<th>Turno</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Matricula</th>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Grado</th>
									<th>Grupo</th>
									<th>Curp</th>
									<th>Turno</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
								$sq="SELECT A.*, G.* FROM alumnos A
								     JOIN grados_grupos G
								     ON A.id_grado = G.Id";
								$rs=$mysqli->query($sq);
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
								?>
								<tr>
									<th scope="row"><?php echo $row['matricula']; ?></th>
									<td><?php echo $row['nombre']; ?></td>
									<td><?php echo $row['apellidos']; ?></td>
									<td><?php echo $row['grado']; ?></td>
									<td><?php echo $row['grupos']; ?></td>
									<td><?php echo $row['curp']; ?></td>
									<td><?php echo $row['turno']; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
<?php include('AgregarAlumno.php'); include "../temp/03.php"; ?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatablesSimple').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
			}
		});
	});
</script>