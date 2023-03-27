<?php
$mysqli = new mysqli($MySQL_server, $MySQL_user, $MySQL_pass, $MySQL_DB);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>