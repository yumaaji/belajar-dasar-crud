<?php
// Menghubungkan dengan database & function guna CRUD
include "database.php";

// $siswa guna menampung array yang diperoleh dari tabel data_siswa
// Dengan menggunakan function "ambilData()"
$siswa = ambilData ("SELECT * FROM data_siswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/index.css">
  <title>Index</title>
</head>
<body>
  <h1>Selamat Datang <span>Admin</span></h1>
  <a href="insert.php"><button>Tambah Data Siswa</button></a>
  <table border="1" cellpading="10" cellspacing="0">
    <tr>
      <th>Nomer</th>
      <th>Gambar</th>
      <th>NISN</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Agama</th>
      <th>Telepon</th>
      <th>Aksi</th>
    </tr>

    <!-- Untuk penomoran yang akan di (++) saat ditampilkan di tabel -->
    <?php $i=1 ?>

    <!-- Pengulangan untuk mengambil & menampilkan data dari array $siswa -->
    <?php foreach($siswa as $row): ?>
    
    <tr>
      <td><?= $i ?></td>
      <td><img src="img/<?= $row['foto_siswa'] ?>" width="70" style="border-radius: 50%" alt=""></td>
      <td><?= $row['nisn_siswa'] ?></td>
      <td><?= $row['nama_siswa'] ?></td>
      <td><?= $row['kelas_siswa'] ?></td>
      <td><?= $row['agama_siswa'] ?></td>
      <td><?= $row['telepon_siswa'] ?></td>
      <td>
        <a href="update.php?id=<?=$row['id']?>" class="ubah">ubah</a>
        <a href="delete.php?id=<?= $row['id']?>" onclick="return confirm ('Yakin Ingin Menghapus Data?');" class="hapus">hapus</a>
      </td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
  </table>


</body>
</html>