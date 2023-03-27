<!-- Modal -->
<div class="modal fade" id="add_" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">AGREGAR GRADO Y GRUPOS</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="InsertRegistro2.php">
					
					<div class="row text-right">
    									<div class="col-md-12">
      										<button class="btn add-btn btn-info">+</button>
    									</div>
 							 </div>
					
						<div class="row form-group">
							<div class="row espacio">
								<div class="col-6">
									<label for="grado">Grado:</label>
									<input type="text" class="form-control" name="grado" id="grado" placeholder="Grado" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>							
								
								<div class="col-6">
									<label for="grupo">Grupo:</label>
									<input type="text" class="form-control" name="grupo[]" id="grupo" placeholder="Grupo" onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
								
								<div class="newData"></div>
								
							<div class="row espacio">
							</div>					
						</div>
						
						<div class="modal-footer">
							<div id="cargando" class="loader" style="display: none" ></div>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" name="editar" class="btn btn-primary" onclick="mostrar(); this.onclick=function(){return false}">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(function () { 
      var i = 1;
      $('.add-btn').click(function (e) {
        e.preventDefault();
          i++;

        $('.newData').append('<div id="newRow'+i+'" class="form-row">'
           +'<div class="col-6">'
              +'<label>Grupo:</label>'
              +'<input type="text" class="form-control" name="grupo[]" id="grupo" '
              +'placeholder="Grupo" onkeyup="javascript:this.value=this.value.toUpperCase();">'
            +'</div>'
            +'<a href="#" class="remove-lnk" id="'+i+'">Eliminar "'+i+'"</a>'
            +'</div>'
          );  
      });
 

       $(document).on('click', '.remove-lnk', function(e) {
         e.preventDefault();

          var id = $(this).attr("id");
           $('#newRow'+id+'').remove();
        });
 
    });
  </script>