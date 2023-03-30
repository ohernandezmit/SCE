<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";

$matricula = $_POST['matricula'];
$id_ciclo = $_POST['id_ciclo'];
$id_materia_array = $_POST['id_materia'];
$materia_array = $_POST['materia'];

    $i=0;
    foreach($id_materia_array as $value){
        echo $value.' - '.$materia_array[$i].'<br>';
        $query = "INSERT INTO calificaciones (matricula, id_materia, id_ciclo, calificacion)
                            VALUE('$matricula','$value','$id_ciclo','$materia_array[$i]')";
        $rts = $mysqli->query($query);
        if ($rts === false) { echo "SQL Error1: " . $mysqli->error; }

        $i++;
    }

?>