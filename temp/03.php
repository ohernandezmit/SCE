<!-- <footer class="py-4 bg-light mt-auto">
	<div class="container-fluid px-4">
		<div class="d-flex align-items-center justify-content-between small">
			<div class="text-muted">Copyright &copy; Technology MIT 2023</div>
			<div>
				<a href="#">Privacy Policy</a>
				&middot;
				<a href="#">Terms &amp; Conditions</a>
			</div>
		</div>
	</div>
</footer> -->
<!-- Vendor JS Files -->
<script src="<?php echo $server_name; ?>lib/bootstrap/js/bootstrap.bundle.min.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/jquery.dataTables.min.js"> </script>
<script src="<?php echo $server_name; ?>lib/tinymce/tinymce.min.js"> </script>
<!-- <script src="<?php echo $server_name; ?>lib/js/jquery-3.5.1.js"> </script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="<?php echo $server_name; ?>lib/bootstrap/js/sidebars.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/scripts.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/simple-datatables.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/datatables-simple-demo.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/Chart.min.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/chart-area-demo.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/chart-bar-demo.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/duplicador.js"> </script>

<!-- Template Main JS File -->
<script src="<?php echo $server_name; ?>lib/js/main.js"> </script>
<script type="text/javascript">
    $(document).ready(function() {
		$('#datatablesSimple').DataTable({
            "language": {
				"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                    }
                });
             });
</script>	
	</body>
</html>