<?php
ini_set("display_errors","1");
include "../db/var.php";
include "../db/conect.php";

$html = '';
	
$nivel = $_POST['nivel']; 
     
if ($nivel == 0){
     $html .= '<option value="0">"No Hay Grados!"</option>';
     echo $html;
} else {
    $sq="SELECT * FROM grados_grupos WHERE activo = '0' AND id_nivel = '$nivel' ";
	$rs=$mysqli->query($sq);
								
	echo '<option value="0">Selecciona un grado</option>';
								
	while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {						
	     $html .= '<option value="'.$row['Id'].'">'.$row['grado'].'° '.$row['grupos'].'</option>';															
     }
     echo $html;
}
	 			
?>