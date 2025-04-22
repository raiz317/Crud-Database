<?php
$koneksi = mysqli_connect("localhost", "root", "", "kuliah");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
