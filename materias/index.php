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
					<i class="bi bi-book"></i>
					Materias
					<div class="card-body">
						<div class="row">
							<div class="col-6"></div>
							<div class="col-6">
								<p style="text-align: right">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_" aria-expanded="false">
										<i class="bi bi-file-earmark-plus"></i>&nbsp;Agregar Materia</button>

								</p>
							</div>
						</div>

						<table id="datatablesSimple">
							<thead>
								<tr>
									<th class="text-center">Nivel</th>
									<th class="text-center">Grado</th>
									<th class="text-center">Materia</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sq="SELECT a.*, b.nombre 
									 FROM materia as a
									 INNER JOIN niveles as b on b.Id = a.Id_nivel
									 INNER JOIN grados_grupos as g on g.Id = a.Id_grado
									 WHERE a.activo='0'";
								$rs=$mysqli->query($sq);
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
									//if ($row['estatus']==1) { $activo = "Activo"; } else { $activo = "Inactivo"; }
									
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
									<th><?php echo $row['grado'].'° '.$row['grupos']; ?></th>
									<td><?php echo $row['Id_grado']; ?></td>
									<td><?php echo $row['materia']; ?></td>
									<td class="text-center"><?php echo $edit.'&nbsp;&nbsp;'.$delete; ?></td>
									 <?php include "EditarMateria.php"; include "DeleteModal.php";  ?>
								</tr>
								<?php 
							} ?>
							</tbody>
							<tfoot>
								<tr>
									<th class="text-center">Nivel</th>
									<th class="text-center">Grado</th>
									<th class="text-center">Materia</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</main>
		<?php include('AgregarMateria.php');  include "../temp/03.php"; ?>
			<script type="text/javascript">
			$(document).ready(function(){
				recargarNivel();
				
				$('#nivel').change(function(){
					recargarNivel();
				});
				

			})

			function recargarNivel(){
				$.ajax({
					type:"POST",
					url: "select_grado.php",
					data:"nivel=" + $('#nivel').val(),
					success:function(r){
						$('#SelectNivel').html(r);
					}
				});
			}
			</script>
			
			<script type="text/javascript">
			$(document).ready(function(){
				recargarGrado();
				
				$('#nivel2').change(function(){
					recargarGrado();
				});
				

			})

			function recargarGrado(){
				var nivel2 = document.getElementById("nivel2").value; //(nivel2);
				
				$.ajax({
					type:"POST",
					url: "select_grado2.php",
					data:"nivel=" + nivel2,
					success:function(r){
						$('#SelectGrado').html(r);
					}
				});
			}
			</script>
	
	</div>
</div>