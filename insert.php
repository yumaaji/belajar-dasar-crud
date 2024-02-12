<?php 
// Menghubungkan dengan database & function guna CRUD
include "database.php";

// Validasi untuk apakah 'submit' pada form telah ditekan - isset
if (isset($_POST['submit'])){

  // Mengeksekusi perintah SQL
  try{
    // Jika baris data bertambah
    // Dengan memvalidasi function "tambahData"
    // Mengirim melalui parameter $_POST, dan ditangkap oleh $data
    if (tambahData($_POST) > 0){
      echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'index.php';
          </script>";
    // Jika baris data tidak bertambah
    }else{
      echo "<script>
            alert('Data Gagal Ditambahkan');
            document.location.href = 'index.php';
          </script>";
    }
  // Menangani kesalahan SQL - alih alih menampilkan eror
  }catch(mysqli_sql_exception){
    echo "<script>
            alert('NISN Sudah Terdaftar');
            document.location.href = 'insert.php';
          </script>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/insert.css">
  <title>Tambah Data Siswa</title>
</head>
<body>
  <h1>Tambah Data Siswa</h1>

  <form action="" method="POST">
    <input type="text" name="nisn" id="nisn" maxlength="10" placeholder="nisn" required>
    <input type="text" name="nama" id="nama" placeholder="nama siswa" required>
    <input type="text" name="kelas" id="kelas" placeholder="kelas siswa" required>
    <select name="agama" id="agama">
      <option value="" selected disabled >Pilih Agama</option>
      <option value="Islam">islam</option>
      <option value="Kristen">kristen</option>
      <option value="Katolik">katolik</option>
      <option value="Hindu">hindu</option>
      <option value="Budha">budha</option>
      <option value="Konghucu">konghucu</option>
    </select>
    <input type="text" name="telepon" id="telepon" placeholder="telepon siswa" required>
    <input type="text" name="foto" id="foto" placeholder="foto siswa" required>

    <button type="submit" name="submit">Submit</button>
  </form>
  <a href="./index.php"><button class="back-home">Home</button></a>

</body>
</html>