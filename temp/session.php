<?php
session_start();
if (empty($_SESSION["cuenta"])) {

	header("Location: $server_name");

	exit();
}
$cuenta = $_SESSION['cuenta'];
?>