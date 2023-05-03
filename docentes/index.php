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
                    </div>

                    <table id="dataList" class="display compact" style="width:100%; font-size 12px;">
                        <thead>
                            <tr>
                                <th>Nombre(s)</th>
								<th>Apellidos</th>
								<th>Correo</th>
								<th>Rol</th>
								<th>Estatus</th>
								<th>Opciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre(s)</th>
								<th>Apellidos</th>
								<th>Correo</th>
								<th>Rol</th>
								<th>Estatus</th>
								<th>Opciones</th>
                            </tr>    
                        </tfoot>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>


<?php include "../temp/03.php"; ?>