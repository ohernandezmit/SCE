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
                $num_palabras = str_word_count($materia, 0);

                switch ($num_palabras) {
                        case 1:
                            echo substr($materia, 0, 3);
                            break;
                        case 2:
                            list($primera, $segunda) = explode(' ', $materia);
                            echo $abrev1 = substr($primera, 0, 1). '<br>';
                            echo $abrev2 = substr($segunda, 0, 3). '<br>';

                                echo $abrev1 . $abrev2;
                            
                            break;
                        case 3:
                            list($primera, $segunda, $tercera) = explode(' ', $materia);
                            echo $abrev1 = substr($primera, 0, 1). '<br>';
                            echo $abrev2 = substr($segunda, 0, 1). '<br>';
                            echo $abrev3 = substr($tercera, 0, 3). '<br>';
    
                                echo $abrev1 . $abrev2 . $abrev3;
                                
                            break;
                        case 4:
                            list($primera, $segunda, $tercera, $cuarta) = explode(' ', $materia);
                            echo $abrev1 = substr($primera, 0, 1). '<br>';
                            echo $abrev2 = substr($segunda, 0, 1). '<br>';
                            echo $abrev3 = substr($tercera, 0, 1). '<br>';
                            echo $abrev4 = substr($cuarta, 0, 3). '<br>';
        
                                echo $abrev1 . $abrev2 . $abrev3 . $abrev4;
                            break;
                        case 5:
                            list($primera, $segunda, $tercera, $cuarta, $quinta) = explode(' ', $materia);
                            echo $abrev1 = substr($primera, 0, 1). '<br>';
                            echo $abrev2 = substr($segunda, 0, 1). '<br>';
                            echo $abrev3 = substr($tercera, 0, 1). '<br>';
                            echo $abrev4 = substr($cuarta, 0, 1). '<br>';
                            echo $abrev5 = substr($quinta, 0, 3). '<br>';
            
                                    echo $abrev1 . $abrev2 . $abrev3 . $abrev4 . $abrev5;
                            break;
                    }


            	$sql = "INSERT INTO materia (Id_nivel, Id_grado, materia, creadox, f_creacion)
                                     VALUES ('$nivel', '$grado', '$materia', '$cuenta', '$fecha')";
 				//$res=$mysqli->query($sql);

            	//if ($res === false) { echo "SQL Error: " . $mysqli->error; }

                // echo "
                // 	<script>
                //     	Swal.fire({
                //         	icon: 'success',
                //         	title: '¡Materia creada con Exito!',
                //         	button: 'OK',
                //     	})
                //     	.then(function() {
                //         	location.href = '$server_name/materias/';
                //     	});
                // 	</script>  ";
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