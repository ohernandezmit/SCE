<?php 
sleep(1);
$resultado = $_POST['valorCaja1'] + $_POST['valorCaja2']; 
if ($_POST['valorCaja1']==1){
echo '<div class="alert alert-success" role="alert">
  Guardado!
</div>';
}
else {
echo '<div class="alert alert-danger" role="alert">
  Error!
</div>';
}
?>