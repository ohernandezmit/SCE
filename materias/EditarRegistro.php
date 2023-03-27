<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

session_start();

$cuenta=$_SESSION["cuenta"];

 if(isset($cuenta)){
	$Id = $_POST['id'];
	$fecha = date('d/m/Y');
    $nivel = $_POST['nivel2'];
    $grado = $_POST['grado2'];
    $materia = $_POST['materia'];

	$sql = "UPDATE materia
		SET Id_nivel='$nivel', n_grado='$grado', materia='$materia', creadox='$cuenta', f_creacion='$fecha'
		WHERE Id = $Id";
	$rst = $mysqli->query($sql);

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
						location.href = '<?php echo $server_name; ?>materias/';
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