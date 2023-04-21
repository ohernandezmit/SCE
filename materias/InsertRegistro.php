<?php  ini_set("display_errors","1");

    include "../db/var.php";
    include "../db/conect.php";
    include "../temp/01.php";

     session_start();

    $cuenta=$_SESSION["cuenta"];

    if(isset($cuenta)){
            $fecha = date('d/m/Y');
            $nivel = $_POST['nivel'];
            $grado = $_POST['grado'];
            $materia = $_POST['materia'];

            $sq1="SELECT * FROM materia WHERE Id_nivel = '$nivel' and Id_grado='$grado' and materia='$materia'";
            $rs1=$mysqli->query($sq1);
            $row_cnt = $rs1->num_rows;
            if ($row_cnt>0){
               echo  "<script>
                            Swal.fire({
                                icon: 'warning',
                                title: '¡Ya existe la materia!',
                                text: 'Favor de verificar',
                                button: 'OK',
                        })
                        .then(function() {
                                location.href = '$server_name/materias/';
                        });
                        </script>";
            }else{
            	$sql = "INSERT INTO materia (Id_nivel, Id_grado, materia, creadox, f_creacion)
                                     VALUES ('$nivel', '$grado', '$materia', '$cuenta', '$fecha')";
 				$res=$mysqli->query($sql);

            	if ($res === false) { echo "SQL Error: " . $mysqli->error; }

                echo "
                	<script>
                    	Swal.fire({
                        	icon: 'success',
                        	title: '¡Materia creada con Exito!',
                        	button: 'OK',
                    	})
                    	.then(function() {
                        	location.href = '$server_name/materias/';
                    	});
                	</script>  ";
            } 
    }  else {
    	echo "<script>
              	Swal.fire({
                	icon: 'warning',
                	title: 'Ocurrio un error',
                	text: 'Favor de iniciar sesión nuevamente',
                	button: 'OK',
            	})
            	.then(function() {
                	location.href = '$server_name';
            	});
            </script>";
    }
?>