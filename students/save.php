<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

echo $nombre = $_POST['nombre'];
echo '-';
echo $apellido = $_POST['apellido'];
echo '-';
echo $turno = $_POST['select-turno'];
echo '-';
echo $nivel = $_POST['select-nivel'];
echo '-';
echo $grado = $_POST['select-grado'];
echo '-';
echo $curp = $_POST['curp'];

    // $i=0;
    // foreach($id_materia_array as $value){
    //     //echo $value.' - '.$materia_array[$i].'<br>';
    //     $query = "INSERT INTO calificaciones (matricula, id_materia, id_ciclo, calificacion)
    //                         VALUE('$matricula','$value','$id_ciclo','$materia_array[$i]')";
    //     $rts = $mysqli->query($query);
    //     if ($rts === false) { echo "SQL Error1: " . $mysqli->error; }

    //     $i++;
    // }
    // echo "
    // <script>
    //     Swal.fire({
    //         icon: 'success',
    //         title: '¡Capturado correctamente!',
    //         button: 'OK',
    //     })
    //     .then(function() {
    //         location.href = '$server_name/capture/';
    //     });
    // </script>  ";
?>