<?php ini_set("display_errors","1");

  include "../db/var.php";
  include "../db/conect.php";
  include "../temp/session.php";	
  include "../temp/01.php";
  include "../temp/02.php";

?>
<div id="layoutSidenav">
  <?php include "../temp/menu.php"; ?>
	<div id="layoutSidenav_content">
	 <main>
		<div class="card mb-4">
			<div class="card-header">
				<i class="bi bi-pencil-square"></i>
					Captura de calificaciones
					
					<div class="card-body">
					
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th class="text-center">Matricula</th>
									<th class="text-center">Nombre Completo</th>
									<th class="text-center">Grado</th>
									<th class="text-center">Grupo</th>
									<th class="text-center">Capturar Calificaciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sq="SELECT A.*, G.* FROM alumnos A
								     JOIN grados_grupos G
								     ON A.id_grado = G.Id";
								$rs=$mysqli->query($sq);
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) 
								    {
								        $capture = '<div class="btn-group">
		                                            <button type="button" class="btn btn-info btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                                <i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#capture_'.$row['matricula'].'">  Captura</i>
		                                            </button>
		                                        </div>';
								?>
								<tr>
									<th scope="row" class="text-center"><?php echo $row['matricula']; ?></th>
									<td class="text-center"><?php echo $row['nombre'].' '.$row['apellidos']; ?></td>
									<td class="text-center"><?php echo $row['grado']; ?></td>
									<td class="text-center"><?php echo $row['grupos']; ?></td>
									<td class="text-center"><?php echo $capture; ?></td>
									<?php include "CaptureModal.php"; ?>
								</tr>
								<?php 
								     } 
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
<?php include "../temp/03.php"; ?>
	</div>
</div>