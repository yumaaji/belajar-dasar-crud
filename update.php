<?php 
// Menghubungkan dengan database & function guna CRUD
include "database.php";

// Menyimpan id terkait yang ditangkap di URL, setelah memilih data
$id = $_GET['id'];

// $dataSiswa guna menampung array yang diperoleh dari tabel data_siswa
// Dengan menggunakan function "ambilData()"
$dataSiswa = ambilData("SELECT * FROM data_siswa WHERE id = $id")[0];

// Validasi untuk melakukan redirect
// Guna tetap ada data yang dipilih untuk diubah/update
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// Validasi untuk apakah 'submit' pada form telah ditekan - isset
if (isset($_POST['submit'])){

  // Mengeksekusi perintah SQL
  try{
    // Jika baris data bertambah
    // Dengan memvalidasi function "updateData"
    // Mengirim melalui parameter $_POST, dan ditangkap oleh $data
    if (updateData($_POST) > 0){
      echo "<script>
            alert('Data Berhasil Diupdate');
            document.location.href = 'index.php';
          </script>";
    // Jika baris data tidak bertambah
    }else{
      echo "<script>
            alert('Tidak Ada Data Diupdate');
            document.location.href = 'index.php';
          </script>";
    }
  // Menangani kesalahan SQL - alih alih menampilkan eror
  }catch(mysqli_sql_exception){
    echo "<script>
            alert('NISN Sudah Terdaftar');
            document.location.href = 'index.php';
          </script>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/update.css">
  <title>Ubah Data Siswa</title>
</head>
<body>
  <h1>Ubah Data Siswa</h1>

  <form action="" method="POST">
    <input type="hidden" name="id" value="<?=$dataSiswa['id'] ?>" maxlength="10">
    <input type="text" name="nisn" id="nisn" maxlength="10" value="<?=$dataSiswa['nisn_siswa'] ?>" required>
    <input type="text" name="nama" id="nama" value="<?=$dataSiswa['nama_siswa'] ?>" required>
    <input type="text" name="kelas" id="kelas" value="<?=$dataSiswa['kelas_siswa'] ?>" required>
    <select name="agama" id="agama">
      <option value="" selected disabled>Pilih Agama</option>
       <?php

         $agama_siswa = $dataSiswa['agama_siswa'];
         $agama_options = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
         foreach ($agama_options as $agama) {
         $selected = ($agama === $agama_siswa) ? 'selected' : '';
         echo "<option value=\"$agama\" $selected>$agama</option>";
        }

       ?>
    </select>

    <input type="text" name="telepon" id="telepon" value="<?=$dataSiswa['telepon_siswa'] ?>" required>
    <input type="text" name="foto" id="foto" value="<?=$dataSiswa['foto_siswa'] ?>" required>

    <button type="submit" name="submit">Simpan Perubahan</button>
  </form>
  <a href="./index.php"><button class="back-home">Home</button></a>

</body>
</html>