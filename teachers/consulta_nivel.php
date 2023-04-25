<?php
ini_set("display_errors","1");
include "../db/var.php";
include "../db/conect.php";

$html = '';
	
$turno = $_POST['turno']; 
     
if ($turno == 0){
    $html .= '<option value="0">"No Hay Niveles!"</option>';
    echo $html;
} else {
    $sq="SELECT * FROM niveles WHERE activo = '0' AND id_turno = '$turno' ";
	$rs=$mysqli->query($sq);					
	echo '<option value="0">Selecciona un nivel</option>';					
	while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {					
	    $html .= '<option value="'.$row['Id'].'">'.$row['nombre'].'</option>';															
    }
echo $html;
}
	 			
?>