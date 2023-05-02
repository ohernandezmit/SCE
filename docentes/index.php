<?php ini_set("display_errors","1");

include "../db/var.php";
include "../db/conect.php";

session_start();
if (empty($_SESSION["cuenta"])) {
	header("Location: $server_name");
	exit();
}

include "../temp/01.php";
include "../temp/02.php";
$cuenta = $_SESSION['cuenta'];
$fecha = date('Y/m/d');
?>

<div id="layoutSidenav">
    <?php include "../temp/menu.php"; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="card mb-4">
                <div class="card-header"> 
                    <i class="bi bi-person-workspace"></i>
					Usuarios
                </div>
            </div>
        </main>
    </div>
</div>


<?php include "../temp/03.php"; ?>