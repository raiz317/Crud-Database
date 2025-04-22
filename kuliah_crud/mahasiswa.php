<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES('$npm','$nama','$jurusan','$alamat')");
}

$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<h2>Tambah Mahasiswa</h2>
<form method="post">
    NPM: <input type="text" name="npm"><br>
    Nama: <input type="text" name="nama"><br>
    Jurusan: 
    <select name="jurusan">
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Operasi">Sistem Operasi</option>
    </select><br>
    Alamat: <textarea name="alamat"></textarea><br>
    <input type="submit" name="submit" value="Tambah">
</form>

<h2>Data Mahasiswa</h2>
<table border="1">
<tr>
    <th>NPM</th>
    <th>Nama</th>
    <th>Jurusan</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>
<?php while ($row = mysqli_fetch_array($data)) { ?>
<tr>
    <td><?= $row['npm'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['jurusan'] ?></td>
    <td><?= $row['alamat'] ?></td>
    <td><a href="hapus_mahasiswa.php?npm=<?= $row['npm'] ?>">Hapus</a></td>
</tr>
<?php } ?>
</table>
