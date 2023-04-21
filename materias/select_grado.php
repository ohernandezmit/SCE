<?php 
include "../db/var.php";
include "../db/conect.php";

$nivel = $_POST['nivel'];

	$queryG = "SELECT Id, grado, grupos FROM grados_grupos WHERE Id_nivel = '$nivel'";
	$rstG = $mysqli->query($queryG);
	
	$cadena = "<select id='grado' name='grado' class='form-control'>";
	
	if($nivel=='0' || $rstG->num_rows == 0){
		echo $cadena = $cadena."<option selected disabled value=''>Sin registros</option>";
	}else{
		while($rowG = $rstG->fetch_array(MYSQLI_ASSOC)) {
			$cadena = $cadena.'<option value='.$rowG['Id'].'>'.$rowG['grado'].'° '.$rowG['grupos'].'</option>';
		}
		echo $cadena."</select>";
	}
?>