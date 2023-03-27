<?php //ini_set("display_errors","1");
	include "../db/var.php";
	include "../db/conect.php";
  	include "../temp/01.php";
  	include "../temp/02.php";
  	include "../temp/session.php";
?>

<div id="layoutSidenav">
  	<?php include "../temp/menu.php"; ?>
	<div id="layoutSidenav_content">
<main>
	<div class="row">
	<!-- START TURNO -->
		<div class="col-sm-6 mb-3 mb-sm-0">
			<div class="card">
				<div class="card-body">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table me-1"></i>Turnos
							<div class="card-body">
								<div class="row">
									<div class="col-6"> </div>
									<div class="col-6">
										<p style="text-align: right">
											<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_turno" class="enlace">Agregar Turno</a>		
										</p>
									</div>
								</div>
								
								<span id="resultado"></span>
								<table id="datatablesSimple2">
									<thead>
										<tr>
											<th class="text-center">Nombre</th>
											<th class="text-center">Opciones</th>
										</tr>
									</thead>
									<tbody>
									<tr><td><?php include 'AgregarNivel.php'; ?></td></tr>
										<?php
											$sqT="SELECT * FROM turnos WHERE activo='0'";
											$rsT=$mysqli->query($sqT);
											while ($rowT=$rsT->fetch_array(MYSQLI_ASSOC)) {
								            	$editT = '<div class="btn-group">
		                                					  <button type="button" class="btn btn-outline-primary btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                    					  <i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#editT_'.$rowT['Id'].'"></i>
		                                					  </button>
		                           						</div>';
		                            
												$deleteT = '<div class="btn-group">
		                                						<button type="button" class="btn btn-outline-danger btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                    						<i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#deleteT_'.$rowT['Id'].'"></i>
		                                						</button>
		                            						</div>';							
										?>
										<tr>
											<td class="text-center"><?php echo $rowT['turno']; ?></td>
											<td class="text-center"><?php echo $editT.'&nbsp;&nbsp;'.$deleteT; ?></td>	
											<?php include "EditTurno.php"; include "DeleteModal.php"; ?>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>			
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- END TURNO -->
	
	<!-- START NIVEL -->
		<div class="col-sm-6 mb-3 mb-sm-0">
			<div class="card">
				<div class="card-body">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table me-1"></i>Niveles
							
							<div class="card-body">
								<div class="row">
									<div class="col-6"></div>
									<div class="col-6">
										<p style="text-align: right">
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_" aria-expanded="false">
												<i class="bi bi-file-earmark-plus"></i>&nbsp;Agregar Nivel
											</button>
										</p>
									</div>
								</div>
								<table id="datatablesSimple">
									<thead>
										<tr>
											<th class="text-center">Nombre</th>
											<th class="text-center">Turno</th>
											<th class="text-center">Opciones</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$sqN="SELECT N.Id as id_nivel, N.nombre, N.id_turno, T.Id as id_turno, T.turno 
												FROM niveles N
												JOIN turnos T ON N.id_turno = T.Id";
											$rsN=$mysqli->query($sqN);
											while ($rowN=$rsN->fetch_array(MYSQLI_ASSOC)) {
												$edit = '<div class="btn-group">
		                                					<button type="button" class="btn btn-outline-primary btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                    					<i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#edit_'.$rowN['id_nivel'].'"></i>
		                                					</button>
		                           						</div>';
		                            
												$delete = '<div class="btn-group">
		                                					<button type="button" class="btn btn-outline-danger btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                    					<i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#delete_'.$rowN['id_nivel'].'"></i>
		                                					</button>
		                            					</div>';
		                            								
										?>
										<tr>
											<td class="text-center"><?php echo $rowN['nombre']; ?></td>
											<td class="text-center"><?php echo $rowN['turno']; ?></td>
											<td class="text-center"><?php echo $edit.'&nbsp;&nbsp;'.$delete; ?></td>
											<?php include "EditModal.php"; ?>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div>
	<!-- END NIVEL -->
	</div>
</main>
  <?php 
  	 
  	include 'AgregarTurno.php';
  	include "../temp/03.php"; 
  ?>
		</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){
    
});

var openBtn = document.getElementById("open-dialog-btn");

//Query for dialog element
var dialog = document.getElementById("modal_turno");

//Add event listener to open dialog on click
openBtn.addEventListener("click", () => {
  dialog.showModal();
});

dialog.addEventListener("close", () => {
  console.log(dialog.returnValue);
});

function guardarTurno(){
		var modal_turno = document.getElementById('modal_turno');
		var nombre_turno = document.getElementById("nombre_turno").value;        
        
        $.ajax({
                
                data: { nombre_turno: nombre_turno},
                url:   'guardar_turno.php',
                type:  'post',
                beforeSend: function () {
                		modal_turno.close();
                        $("#resultado").html('<div class="loading"><img src="../img/loader.gif" alt="loading" /><br/>Guardando...</div>');
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        setTimeout(function(){
    					$("#resultado").fadeOut();           
  						},1600);
  						setTimeout(() => {
  						document.location.reload();
						}, 1600);
                }
        });
}

	function save_turno(){				
		
		$.ajax({
            type: 'POST',
            url: 'guardar_turno.php',
            data: $('#formulario').serialize(),
            success: function(data) {
            $('.result').html(data);
            alert(data);
            }
            
        });
	}
	
	(function() {
    var cancelButton = document.getElementById('cancel');
    var modal_turno = document.getElementById('modal_turno');

    // Form cancel button closes the dialog box
    cancelButton.addEventListener('click', function() {
      modal_turno.close();
    });

  });
</script>