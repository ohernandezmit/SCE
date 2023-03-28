<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";

foreach($_POST['materia'] as $materia) {
    echo "<p>Materia recibida: $materia</p>";
}


//$sqlP = "INSERT periodo (periodo, nombre, fecha_ini, fecha_fin, activo) 
//VALUES ('$periodo', '$nombre', '$fecha_ini', '$fecha_fin', '$activo')";
//$rst = $mysqli->query($sqlP);
//if ($rst === false) {
//	echo "SQL Error1: " . $mysqli->error;
//}

?>