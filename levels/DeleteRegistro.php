<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

session_start();
$cuenta=$_SESSION["cuenta"];
if(isset($cuenta)) {
	$Id = $_GET['id'];
	$fecha = date('d/m/Y');

	$sqlP = "UPDATE turnos SET activo='1', creadox='$cuenta', f_creacion='$fecha' WHERE Id = $Id";
	$rst = $mysqli->query($sqlP);

	if ($rst === false) {
		echo "SQL Error1: " . $mysqli->error;
	} else {  ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡El turno ha sido eliminado con exito!',
                        button: 'OK',
                    })
                    .then(function() {
						location.href = '<?php echo $server_name; ?>levels/';
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