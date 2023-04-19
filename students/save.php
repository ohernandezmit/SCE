<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$turno = $_POST['select-turno'];
$nivel = $_POST['select-nivel'];
$grado = $_POST['select-grado'];
$curp = $_POST['curp'];

        $query = "INSERT INTO alumnos (nombre, apellidos, id_grado, id_ciclo, curp, turno, activo)
                            VALUE('$nombre','$apellido','$grado','1', '$curp', '$turno', '1')";
            $rts = $mysqli->query($query);
    if ($rts === false) 
        { 
            echo "SQL Error1: " . $mysqli->error; 
        }
    else 
        {
     echo "
     <script>
        Swal.fire({
            icon: 'success',
            title: '¡Capturado correctamente!',
             button: 'OK',
         })
        .then(function() {
            location.href = '$server_name/capture/';
        });
     </script>  ";
         }
?>