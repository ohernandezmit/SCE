<?php ini_set("display_errors","1");
include "../db/var.php";
include "../db/conect.php";
include "../temp/session.php";	
include "../temp/01.php";
include "../temp/02.php";
?>
<script>

function pdf(destino){
	//var grado = document.getElementById("grado").value; alert(grado);
	document.formulario.action = destino;
	document.formulario.submit();	
}

function excel(destino){
	document.formulario.action = destino;
	document.formulario.submit();
}
</script>
<div id="layoutSidenav">
  <?php include "../temp/menu.php"; ?>
	<div id="layoutSidenav_content">
	 <main>
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i> Listas de Alumnos
					<div class="card-body">
						<div class="row">
                            <div class="col-2"></div>
							<div class="col-8">
							    <div class="container-fluid">
                					<form name="formulario" method="POST" enctype="multipart/form-data">
                						<div class="row form-group" style="padding-bottom: 10px;" >
                						    <div class="row espacio">
                						        <h5>Elija el grado y grupo del que desea consultar sus resultados.</h5>
                						    </div>
                							<div class="row espacio">
                							    <div class="col-2">
                							        <label for="grado">Grado:</label>
                							    </div>
                								<div class="col-10">
                									<select name="grado" id="grado" class="form-select" required="required">
                									    <option value=" ">Selecciona una grado</option>
                									    <?php
                									        $gueryG = $mysqli->query("Select Id, grado, grupos FROM grados_grupos WHERE activo='0'");
                									        While ($row=mysqli_fetch_array($gueryG)){ ?>
                									            <option value="<?php echo $row['Id']; ?>"> <?php echo $row['grado'].''.$row['grupos']; ?></option>
                									   <?php } ?>
                									</select>
                								</div>
                							</div>
                						</div>
                						<div class="modal-footer">
                							<div id="cargando" class="loader" style="display: none" ></div>
                							<button type="button" name="editar" class="btn btn-primary" onclick="pdf('print.php');">
											 <i class="bi bi-file-earmark-pdf"></i> PDF</button> 
											
											<!-- <input type="button" name="enviar1" id="enviar1" value="PDF" class="btn btn-primary" onclick="pdf('print.php')">
											<input type="button" name="enviar2" id="enviar2" value="Excel" class="btn btn-success"  onclick="excel('excel.php')">							 -->
											<button type="button" name="editar" class="btn btn-success" onclick="excel();">
											<i class="bi bi-file-earmark-excel"></i> Excel</button>
                						</div>
                					</form>
				                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
<?php include "../temp/03.php"; ?>
	</div>
</div>