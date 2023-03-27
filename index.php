<?php include "temp/01.php";
include "db/var.php";
include "db/conect.php";
 
session_start();
if (empty($_SESSION["cuenta"])) {

header("Location: login.php");

exit();

}
include "temp/02.php";
?>
<div id="layoutSidenav">
	<?php include "temp/menu.php"; ?> 
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Estadisticas</h1>
			<div class="row">
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-chart-area me-1"></i>
							Alumnos por grado
						</div>
						<?php
						$sq1="SELECT * FROM alumnos WHERE id_grado = '1' AND activo = 1";
						$rs1=$mysqli->query($sq1);
						$primero = $rs1->num_rows;
						json_encode($primero);
						$sq2="SELECT * FROM alumnos WHERE id_grado = '2' AND activo = 1";
						$rs2=$mysqli->query($sq2);
						$segundo = $rs2->num_rows;
						json_encode($segundo);
						$sq3="SELECT * FROM alumnos WHERE id_grado = '3' AND activo = 1";
						$rs3=$mysqli->query($sq3);
						$tercero = $rs3->num_rows;
						json_encode($tercero);
						?>
						<input type="text" id="segundo" value="<?php echo $segundo ?>" hidden="hidden" >
						<div class="card-body">
							<canvas id="alumnosxgrado" width="100%" height="40"></canvas></div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-chart-bar me-1"></i>
							Bajas y Activos
						</div>
						<div class="card-body">
							<canvas id="myBarChart" width="100%" height="40"></canvas></div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include "temp/03.php"; ?>
  </div>
</div>
<script>
	// Set new default font family and font color to mimic Bootstrap's default styling
	Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	Chart.defaults.global.defaultFontColor = '#292b2c';

	// Area Chart Example
	var ctx = document.getElementById("alumnosxgrado");

	var myLineChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["1°", "2°", "3°"],
			datasets: [{
					label: "Alumnos",
					lineTension: 0.3,
					backgroundColor: "rgba(2,117,216,0.2)",
					borderColor: "rgba(2,117,216,1)",
					pointRadius: 5,
					pointBackgroundColor: "rgba(2,117,216,1)",
					pointBorderColor: "rgba(255,255,255,0.8)",
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(2,117,216,1)",
					pointHitRadius: 50,
					pointBorderWidth: 2,
					data: [5, 15, 10],
				}],
		},
		options: {
			scales: {
				xAxes: [{
						time: {
							unit: 'date'
						},
						gridLines: {
							display: false
						},
						ticks: {
							maxTicksLimit: 7
						}
					}],
				yAxes: [{
						ticks: {
							min: 0,
							max: 20,
							maxTicksLimit: 5
						},
						gridLines: {
							color: "rgba(0, 0, 0, .125)",
						}
					}],
			},
			legend: {
				display: false
			}
		}
	});
</script>
