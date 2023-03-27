<?php
ini_set("display_errors","1");
include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";

session_start();

$cuenta = $_SESSION['cuenta'];
$fecha = date('Y/m/d');


if(isset($_POST["grado"]))
{
		$grados = $_POST["grado"];
 		$grupo_array = $_POST["grupo"];
 		$turno = $_POST['turno'];
 }
 else
 {
 echo  "<script>
                            Swal.fire({
                                icon: 'warning',
                                title: '¡El campo GRADO no puede estar vacio!',
                                text: 'Vuelve a Intentar',
                                button: 'OK',
                        })
                        .then(function() {
                                location.href = '$server_name/grades_groups/';
                        });
                        </script>";
 }		 
 
 	 foreach($grupo_array  as $grupo )
 	 {
 	 		$sql = "SELECT * FROM grados_grupos WHERE grado = '$grados' AND grupos = '$grupo'";
	 	 		$res=$mysqli->query($sql);
	 	 			$row_cnt = $res->num_rows;
	 	  	if ($row_cnt>0)
	 	 {
               echo  "<script>
                            Swal.fire({
                                icon: 'warning',
                                title: '¡Este grado y este grupo ya existe!',
                                text: 'Favor de verificar',
                                button: 'OK',
                        })
                        .then(function() {
                                location.href = '$server_name/grades_groups/';
                        });
                        </script>";
          } 
          		else 
            {
 	 
	 				$query = "INSERT INTO grados_grupos	(grado, grupos, turno, creadox, f_creacion )  VALUES ('$grados', '$grupo', '$turno', '$cuenta', '$fecha' )	";
	 	 				$statement=$mysqli->query($query);
	 	
	 	if ($statement === false) 
	 	{
			echo "SQL Error1: " . $mysqli->error;
		} 
			else 
			{
				echo "
						<script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡Registro Correcto!',
                        button: 'OK',
                    })
                    .then(function() {
                        location.href = '$server_name/grades_groups/';
                    });
                </script>  ";	
			}	
		}
	}

?>