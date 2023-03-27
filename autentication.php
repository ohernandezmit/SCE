<?php
include "db/var.php";
include "db/conect.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<script src="<?php echo $server_name; ?>lib/js/sweetalert2.all.min.js"> </script>
		<script src="<?php echo $server_name; ?>lib/js/sweetalert2.min.js"> </script>
		<link rel="stylesheet" type="text/css" href="<?php echo $server_name; ?>lib/css/sweetalert2.min.css">
    </head>
<body>
<?php
session_start();

$errors = array();

if (isset($_POST['username']) and isset($_POST['password'])) {
    # code...
    $usuario = $mysqli->real_escape_string($_POST['username']);
    $pass = $mysqli->real_escape_string($_POST['password']);

    $query = 'SELECT * FROM usuarios WHERE cuenta="'.$usuario.'" ';
    $res = $mysqli->query($query);

    if ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        # code...
        if ($row["clave"] == $pass) {
            # code...
			$_SESSION["cuenta"]= $row['cuenta'];
            $_SESSION["nombre"]= $row['nombre'];
            $_SESSION["turno"]=$row['turno'];

            header("Location: $server_name");
        }else{
            echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: '¡La contraseña es incorrecta!',
                                button: 'OK',
                                })
                        .then(function() {
                                location.href = 'index.php';
                                });
                        </script>";
        }

    }else{
        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: '¡El nombre de usuario es incorrecto!',
                                button: 'OK',
                                })
                        .then(function() {
                                location.href = 'index.php';
                                });
                        </script>";
    }
    $res->free();

}else{
	header("Location: $server_name");
}

$mysqli->close();
?>
</body>
</html>