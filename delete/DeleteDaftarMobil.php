<?php
include '../config/config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM daftarMobil WHERE id='$id' ");
header("location: ../admin/DaftarMobil.php");
