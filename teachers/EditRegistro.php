<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

if (empty($_SESSION["cuenta"])) {
	$Id = $_GET['id'];
	$nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

	$sqlP = "UPDATE teachers SET name='$nombre', apellidos='$apellidos', correo='$email', rol='$rol' WHERE Id = $Id";
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
						location.href = '<?php echo $server_name; ?>teachers/';
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