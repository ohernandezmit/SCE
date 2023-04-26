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
				<i class="fas fa-table me-1"></i>
					Filtro
					<div class="card-body">
						<div class="row espacio">
							<div class="col-sm-3" style="padding-bottom: 20px;">
									<p>Grado y Grupo:</p>
										<select id="select-grado" name="select-grado" class="form-control">
											<?php																
											
											$sq="SELECT * FROM grados_grupos WHERE activo = '0' ";
											$rs=$mysqli->query($sq);
											
											echo '<option value="0">Selecciona un grado y un grupo</option>';
											
											while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
																		
											echo '<option value="'.$row['Id'].'">'.$row['grado'].'°'.$row['grupos'].'</option>';
																		
											}	
											?>
										</select>
							</div>
						</div>
					</div>
				</div>
			</div>

		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i>
					Filtro
					<div class="card-body">
						<div class="row espacio">
							<div class="col-sm-3" style="padding-bottom: 20px;">
									<p>Grado y Grupo:</p>
										<select id="select-grado" name="select-grado" class="form-control">
											<?php																
											
											$sq="SELECT * FROM grados_grupos WHERE activo = '0' ";
											$rs=$mysqli->query($sq);
											
											echo '<option value="0">Selecciona un grado y un grupo</option>';
											
											while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
																		
											echo '<option value="'.$row['Id'].'">'.$row['grado'].'°'.$row['grupos'].'</option>';
																		
											}	
											?>
										</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
<?php include "../temp/03.php"; ?>
	</div>
</div>