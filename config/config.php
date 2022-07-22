<?php
$conn = mysqli_connect("localhost", "root", "", "db_rentalmobil");
if (mysqli_connect_errno()) {
    echo "koneksi gagal" . mysqli_connect_error();
}
