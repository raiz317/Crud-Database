<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];
    mysqli_query($koneksi, "INSERT INTO matakuliah VALUES('$kodemk','$nama','$jumlah_sks')");
}

$data = mysqli_query($koneksi, "SELECT * FROM matakuliah");
?>

<h2>Tambah Matakuliah</h2>
<form method="post">
    Kode MK: <input type="text" name="kodemk"><br>
    Nama MK: <input type="text" name="nama"><br>
    Jumlah SKS: <input type="number" name="jumlah_sks"><br>
    <input type="submit" name="submit" value="Tambah">
</form>

<h2>Data Matakuliah</h2>
<table border="1">
<tr><th>Kode</th><th>Nama</th><th>SKS</th></tr>
<?php while ($row = mysqli_fetch_array($data)) { ?>
<tr>
    <td><?= $row['kodemk'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['jumlah_sks'] ?></td>
</tr>
<?php } ?>
</table>
