<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

if (empty($_SESSION["cuenta"])) {
	$Id = $_POST['idp'];
	$periodo = $_POST['periodo'];
	$nombre = $_POST['nombre'];
	$fecha_ini = $_POST['fecha_ini'];
	$fecha_fin = $_POST['fecha_fin'];
	$activo = $_POST['activo'];

	$sqlP = "UPDATE periodo
		SET periodo='$periodo', nombre='$nombre', fecha_ini='$fecha_ini', fecha_fin='$fecha_fin', activo='$activo'
		WHERE Id = $Id";
	$rst = $mysqli->query($sqlP);

	if ($rst === false) {
		echo "SQL Error1: " . $mysqli->error;
	} else {  ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡Actualizado con exito!',
                        button: 'OK',
                    })
                    .then(function() {
						location.href = '<?php echo $server_name; ?>school_period/';
                    });
                </script> 
<?php	}
	} else { ?>
				<script>
              		Swal.fire({
                		icon: 'warning',
                		title: '¡Tu sesión expiro!',
                		text: 'Favor de hacer login nuevamente',
                		button: 'OK',
            		})
            		.then(function() {
                		location.href = '<?php echo $server_name; ?>';
           			 });
            	</script>
<?php 
		}
?>