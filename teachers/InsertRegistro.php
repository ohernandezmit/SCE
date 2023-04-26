<?php  ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

session_start();

$cuenta=$_SESSION["cuenta"];

if(isset($cuenta)){
	$nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['email'];
    $rol = $_POST['name_format'];
    $turno = $_POST['select_turno'];
    if(empty($_POST['select_nivel'])){ $nivel = 0; } else { $nivel = $_POST['select_nivel']; }
    if(empty($_POST['select_grado'])){ $grado = 0; } else { $grado = $_POST['select_grado']; }
    
    $sql = "INSERT INTO usuarios (nombre, apellidos, correo, rol, id_grado, id_nivel, id_turno, id_ciclo, estatus)
                        VALUES ('$nombre', '$apellidos', '$correo', '$rol', '$grado','$nivel ', '$turno','1', '1')";
    $rst = $mysqli->query($sql);
    
    if($rst === false){
    	echo "SQL Error: ".$mysqli->error;
    }else{ ?>
    	<script>
        	Swal.fire({
            	icon: 'success',
                title: '¡Docente creado con exito!',
                button: 'OK',
            })
            .then(function() {
				location.href = '<?php echo $server_name; ?>teachers/';
            });
        </script>	
<?php }
} else{ ?>
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
<?php } ?>      



