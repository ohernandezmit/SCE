<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Projects</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="" rel="icon">
<link href="" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<?php
include "../db/var.php";
include "../db/conect.php";
?>

<!-- CSS Files -->
<link href="<?php echo $server_name; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $server_name; ?>lib/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?php echo $server_name; ?>lib/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="<?php echo $server_name; ?>lib/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?php echo $server_name; ?>lib/bootstrap/css/sidebars.css" rel="stylesheet">
<link href="<?php echo $server_name; ?>lib/css/simple-datatables/style.css" rel="stylesheet">
<link href="<?php echo $server_name; ?>lib/css/styles.css" rel="stylesheet">
<script src="<?php echo $server_name; ?>lib/js/all.js"> </script>

<script src="<?php echo $server_name; ?>lib/js/sweetalert2.all.min.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/sweetalert2.min.js"> </script>
<link rel="stylesheet" type="text/css" href="<?php echo $server_name; ?>lib/css/sweetalert2.min.css">

<!-- Template Main CSS File -->
<link href="<?php echo $server_name; ?>lib/css/style.css" rel="stylesheet">


<!-- Vendor JS Files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="<?php echo $server_name; ?>lib/bootstrap/js/bootstrap.bundle.min.js"> </script>
<script src="<?php echo $server_name; ?>lib/js/jquery.dataTables.min.js"> </script>
<script src="<?php echo $server_name; ?>lib/tinymce/tinymce.min.js"> </script>
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



<!--<script>
$(document).ready(function () {
$('#table').DataTable();
});
</script>-->
</head>

<body class="sb-nav-fixed">