<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";

session_start();
if (empty($_SESSION["cuenta"])) {

	header("Location: $server_name");

	exit();
}
	
  include "../temp/01.php"; 
       echo '<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>';    
  include "../temp/02.php";
  $cuenta = $_SESSION['cuenta'];
  $fecha = date('Y/m/d');
  
?>

<div id="layoutSidenav">
<?php include "../temp/menu.php"; ?>
<div id="layoutSidenav_content">
    <main>        		
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <div class="card mb-4">
				<div class="card-header">
					<i class="bi bi-chevron-double-up"></i> &nbsp;&nbsp;
						 Agregar Grados y Grupos        

  							<div class="card-body">
								<span id="success_result"></span>
                    					<form method="post" id="repeater_form">
                        					<div class="row form-group">
                        						<div class="col-3">
                            							<label class="form-label">Grado:</label>
                            								<input type="text" name="grado" id="grado" class="form-control" placeholder="Grado" required />
                            					</div>
                            					<div class="col-3">
                            							<label class="form-label">Turno:</label>
                            								<input type="text" name="turno" id="turno" class="form-control" placeholder="Turno" required />
                            					</div>
                        					</div>
                        				<hr>
                        				<div class="row">
                        					<div id="repeater">                        
                            						<div class="position-absolute top-0 start-100 translate-middle">
                                					<button type="button" class="btn btn-primary repeater-add-btn"> + </button>		
                        			</div>
                            			<div class="clearfix"></div>                        
                           					 <div class="items">
                                        			<div class="row">
                                            			<div class="col-3">
                                                			<label class="form-label"></label>
                                                 					<input type="text" required data-skip-name="true" name="grupo[]" id="grupo" class="form-control" placeholder="Grupo" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                                            			</div>
                                            	<div class="col-md-3" style="margin-top:24px;" >
                                                		<button onclick="$(this).parents('.items').remove()" class="remove-btn btn btn-danger">Eliminar</button>
                                            	</div>
                                        	</div>
                            		</div>
                        	</div>
                        	</div>	
                        		<div class="clearfix"></div>
                        			<div class="form-group" align="center">
                            			<br /><br />
                            				<button type="submit" name="insertar" class="btn btn-success">Guardar</button>
                        		</div>
                    	</form>
  					</div>
				</div>
			</div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="card mb-4">
			<div class="card-header">
				<i class="bi bi-chevron-double-up"></i> &nbsp;&nbsp;
					Grados y Grupos																 
 						<div class="card-body">
 							
 							<form class="row" action="" method="post">
 								<div class="row">
 								
 							<div class="row text-center" id="loader" style="position: absolute;top: 140px;left: 50%"> </div>
 							
 									<div class="col-sm-6" style="padding-bottom: 20px;">
 										<p>Turno:</p>
 											<select id="select-turno" name="select-turno" class="form-control">
 								
 								<?php																
								
								$sq="SELECT * FROM turnos WHERE activo = '0' ";
								$rs=$mysqli->query($sq);
								
								echo '<option value="0">Selecciona un turno</option>';
								
								while ($row=$rs->fetch_array(MYSQLI_ASSOC)) {
															
								echo '<option value="'.$row['Id'].'">'.$row['turno'].'</option>';
															
 								}	
 								?>
 							</select>
 							 </div>
 							 
 							 <div class="col-sm-6" style="padding-bottom: 20px;">
 							<p>Grado:</p>
 							<select id="select-grado" name="select-grado" class="form-control" onchange="load();" >

 							</select>
 							 </div>
 							 
 							 </div>
 							 </form>
 							
							<div class="tabla-ajax">							
			</div>
      </div>
    </div>
  </div>
</div>
	</main>
     
 <script> 		
$(document).ready(function(){

// Funcion para llenado de select  
    
    $("#select-turno").on('change', function () {
        $("#select-turno option:selected").each(function () {
            var turno = $(this).val();
            //alert(turno);
            $.post("consulta.php", { turno: turno }, function(data) {
                $("#select-grado").html(data);
            });			
        });
 });
 
 // Funcion para agregar mas grupos
       	  	
        $('#repeater').createRepeater();    

        $('#repeater_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"agregar.php",
                method:"POST",
                data:$(this).serialize(),
                success:function(data)
                {
                    $('#repeater_form')[0].reset();
                    $('#repeater').createRepeater();                  
                    $('#success_result').html(data);
                    // setTimeout(function() {
//         					$(".content").fadeOut(1500);
//     					},1500);
//                     setTimeout(function(){ location.reload(); }, 3000);
                }
            })
        });

    });
    
// Funcion para llenar la tabla     
     	
	function load(){
	
			var turno = document.getElementById("select-turno").value
			var grado = document.getElementById("select-grado").value					
			
			var parametros = {'turno':turno,'grado':grado};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".tabla-ajax").html(data).fadeIn('slow');
					$("#loader").html("");
				}
 			})
			
		} 
        
    </script>
    
<?php include "../temp/03.php";  ?>
	</div>
</div>