<?php
ini_set("display_errors","1");
include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

session_start();

$cuenta = $_SESSION['cuenta'];
$fecha = date('Y/m/d');
$html = '';
	

     $turno = $_POST['turno']; 
     
     if ($turno == 0){
     $html .= '<option value="0">"No Hay Grados!"</option>';
     echo $html;
     }
     else
     {
        
         
 
    $sq="SELECT * FROM grados_grupos WHERE activo = '0' AND id_turno = '$turno'  GROUP BY grado";
								$rs=$mysqli->query($sq);
								
								echo '<option value="">Selecciona un grado</option>';
								
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
								
								$html .= '<option value="'.$row['grado'].'">'.$row['grado'].'</option>';															
   
}
echo $html;
}
	 			
?>