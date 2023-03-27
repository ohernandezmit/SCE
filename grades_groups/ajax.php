<?php
ini_set("display_errors","1");
include "../db/var.php";
include "../db/conect.php";
include "../temp/01.php";
?>
					<table id="datatablesSimple" class="table table-striped align-middle">
							<thead>
								<tr>
									<th class="text-center">Grado</th>
									<th class="text-center">Grupo</th>
									<th class="text-center">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
								$turno=strip_tags($_REQUEST['turno']);
								$grado=strip_tags($_REQUEST['grado']);
																							
								
								$sq="SELECT * FROM grados_grupos WHERE activo = '0' AND id_turno = '$turno' AND grado = '$grado' ";
								$rs=$mysqli->query($sq);
								$row_cnt = $rs->num_rows+1;
								 
								?>
								<th class="text-center" rowspan="<?php echo $row_cnt; ?>" > <?php echo $grado; ?> </th>
								
								<?php
								
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
								
								$edit = '<div class="btn-group">
		                                <button type="button" class="btn btn-outline-success btn2" data-bs-toggle="dropdown" aria-expanded="false" >
		                                    <i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#edit_'.$row['Id'].'"></i>
		                                </button>
		                            </div>';
		                            
								?>
								
								<tr>								 									
									<td class="text-center"><?php echo $row['grupos']; ?></td>
									<td class="text-center"><?php echo $edit; ?></td>
									<?php include "EditModal.php"; ?>
								</tr>
								<?php } ?>
							</tbody>
					</table>
<!-- class="table table-striped table-info" -->