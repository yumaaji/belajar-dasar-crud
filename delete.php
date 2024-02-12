<?php 
// Menghubungkan dengan database & function guna CRUD
include "database.php";

// Menyimpan id terkait yang ditangkap di URL, setelah memilih data
$id = $_GET['id'];

// Jika ada baris data bertambah/berkurang 
if (deleteData($id) > 0){

  echo "<script>
          alert('Data Berhasil Dihapus');
        </script>";
  header("location: index.php");
// Jika ada kesalahan dalam eksekusi
}else{
  echo "<script>
          alert('Data Gagal Dihapus');
        </script>";
  header("location: index.php");
}
?>