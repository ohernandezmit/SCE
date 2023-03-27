<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";

echo $periodo = $_POST['periodo'];
echo $nombre = $_POST['nombre'];
echo $fecha_ini = $_POST['fecha_ini'];
echo $fecha_fin = $_POST['fecha_fin'];
echo $activo = $_POST['activo'];

$sqlP = "INSERT periodo (periodo, nombre, fecha_ini, fecha_fin, activo) 
VALUES ('$periodo', '$nombre', '$fecha_ini', '$fecha_fin', '$activo')";
$rst = $mysqli->query($sqlP);
if ($rst === false) {
	echo "SQL Error1: " . $mysqli->error;
}




?>