<?php  ini_set("display_errors","1");

    include "../db/var.php";
    include "../db/conect.php";
    include "../temp/01.php";

     session_start();

    $cuenta=$_SESSION["cuenta"];

    if(isset($cuenta)){
            $fecha = date('d/m/Y');
            $nombre = $_POST['nombre'];
            $turno = $_POST['turno'];

            $sq1="SELECT * FROM niveles WHERE nombre = '$nombre'";
            $rs1=$mysqli->query($sq1);
            $row_cnt = $rs1->num_rows;
            if ($row_cnt>0){
               echo  "<script>
                            Swal.fire({
                                icon: 'warning',
                                title: '¡Este nombre de Nivel ya existe!',
                                text: 'Favor de verificar',
                                button: 'OK',
                        })
                        .then(function() {
                                location.href = '$server_name/levels/';
                        });
                        </script>";
            }else{

            $sql = "INSERT INTO niveles (nombre, turno, creadox, f_creacion)
                                  VALUES ('$nombre', '$turno', '$cuenta', '$fecha')";
            $res=$mysqli->query($sql);

            if ($res === false) {
                echo "SQL Error: " . $mysqli->error;
            }

                echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡Nivel creado con Exito!',
                        button: 'OK',
                    })
                    .then(function() {
                        location.href = '$server_name/levels/';
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