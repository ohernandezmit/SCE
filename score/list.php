<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";
include "../temp/session.php";	
include "../temp/01.php";
include "../temp/02.php";

?>
<div id="layoutSidenav">
  <?php include "../temp/menu.php"; ?>
	<div id="layoutSidenav_content">
	 <main>
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i>
					Lista
					<div class="card-body">
						<table id="datatablesSimple">
							<thead>
									<?php
								        $sqt="SELECT M.*, G.* FROM materia M
											  INNER JOIN grados_grupos G ON G.Id = M.Id_grado";
								            $rst=$mysqli->query($sqt);
								    ?>
								        <tr>
								            <th scope="row">#</th>
									        <th scope="row">Matricula</th>
									        <th>Nombre</th>
									        <th>Apellidos</th>
									<?php 
									    while ($rowt=$rst->fetch_array(MYSQLI_ASSOC)) 
								                {
									?>
									        <th><?php echo $rowt['abrev']; ?></th>
									<?php       
								                } 
								    ?>
								        </tr>
							</thead>
							<tbody>
								    <?php
								        $sq="SELECT * FROM alumnos";
								            $rs=$mysqli->query($sq);
											$num_lista = 0;
								             while ($row=$rs->fetch_array(MYSQLI_ASSOC)) 
								             {												
												$num_lista++;   
									?>
								<tr>
									
								    <th scope="row"><?php echo $num_lista;  ?></th>
									<th scope="row"><?php echo $row['matricula']; ?></th>
									<td><?php echo $row['nombre']; ?></td>
									<td><?php echo $row['apellidos']; ?></td>
									
									    <?php  
									            $matricula = $row['matricula'];
								               
									            $sqc="SELECT * FROM calificaciones
								                      WHERE matricula='$matricula'";
								                $rsc=$mysqli->query($sqc);
									            while ($rowc=$rsc->fetch_array(MYSQLI_ASSOC)) 
									          { 
									    ?>
									
									<td> <?php echo $rowc['calificacion']; ?></td>
									
									     <?php 
									              
									          }
								             }
									     ?>
									
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
<?php include "../temp/03.php"; ?>
	</div>
</div>