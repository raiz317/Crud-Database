<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];
    mysqli_query($koneksi, "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES('$npm','$kodemk')");
}

$data = mysqli_query($koneksi, "
SELECT k.id, m.nama AS mahasiswa, mk.nama AS matakuliah, mk.jumlah_sks 
FROM krs k
JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk
");
?>

<h2>Tambah KRS</h2>
<form method="post">
    Mahasiswa:
    <select name="mahasiswa_npm">
        <?php
        $mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        while ($m = mysqli_fetch_array($mhs)) {
            echo "<option value='$m[npm]'>$m[nama]</option>";
        }
        ?>
    </select><br>

    Mata Kuliah:
    <select name="matakuliah_kodemk">
        <?php
        $mk = mysqli_query($koneksi, "SELECT * FROM matakuliah");
        while ($k = mysqli_fetch_array($mk)) {
            echo "<option value='$k[kodemk]'>$k[nama]</option>";
        }
        ?>
    </select><br>

    <input type="submit" name="submit" value="Tambah">
</form>

<h2>Data KRS</h2>
<table border="1">
<tr><th>No</th><th>Nama Lengkap</th><th>Mata Kuliah</th><th>Keterangan</th></tr>
<?php
$no = 1;
while ($row = mysqli_fetch_array($data)) {
    echo "<tr>
        <td>$no</td>
        <td>$row[mahasiswa]</td>
        <td>$row[matakuliah]</td>
        <td><span style='color:red;'>$row[mahasiswa]</span> Mengambil Mata Kuliah <span style='color:purple;'>$row[matakuliah]</span> ($row[jumlah_sks] SKS)</td>
    </tr>";
    $no++;
}
?>
</table>
