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
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i>
					Alumnos
					<div class="card-body">
						<div class="row">
							<div class="col-6"></div>
							<div class="col-6">
								<p style="text-align: right">
									<a type="button" class="btn btn-primary" href="StudentNew.php"><i class="bi bi-file-earmark-plus"></i>&nbsp;Agregar Alumno</a>
								</p>
							</div>
						</div>
					
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th class="text-center">Matricula</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Apellidos</th>
									<th class="text-center">Nivel</th>
									<th class="text-center">Grado</th>
									<th class="text-center">Grupo</th>
									<th class="text-center">Curp</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sq=" SELECT A.*, G.*, N.Id, N.nombre as nombre_nivel FROM alumnos A
								      JOIN grados_grupos G ON A.id_grado = G.Id
									  INNER JOIN niveles N ON N.Id = G.id_nivel ";
								$rs=$mysqli->query($sq);
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
								?>
								<tr>
									<th scope="row" class="text-center"><?php echo $row['matricula']; ?></th>
									<td><?php echo $row['nombre']; ?></td>
									<td><?php echo $row['apellidos']; ?></td>
									<td class="text-center"><?php echo $row['nombre_nivel']; ?></td>
									<td class="text-center"><?php echo $row['grado']; ?></td>
									<td class="text-center"><?php echo $row['grupos']; ?></td>
									<td class="text-center"><?php echo $row['curp']; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
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