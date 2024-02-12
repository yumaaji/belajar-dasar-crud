<?php 

// mengonfigurasi koneksi ke database MySQL
// menggunakan ekstensi MySQLi (MySQL Improved)
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "wpu_phpmysql_dasar";

$db = mysqli_connect($hostname, $username, $password, $database_name);

// Jika database tidak terkoneksi
if ($db->connect_error){
  echo "koneksi database eror";
  die("gagal");
}

// READ - Mengambil Data
function ambilData ($query){
  // Mengambil variabel dari global scope ($db) yang mengarah ke koneksi database
  global $db;
  
  // Diartikan sebagai
  // Menyimpan hasil pengambilan data di variabel $result
  // Dari database yang telah dikonfigurasi ($db)
  // Dimana data data ditangkap oleh parameter $query pada index.php
  $result = mysqli_query($db, $query);

  // Menyiapkan variabel untuk menyimpan data array
  $rows = [];
  
  // Data sementara disimpan di variabel $row
  // Melakukan pengulangan guna memasukkan seluruh data array di $rows
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }

  return $rows;
}

// CREATE - Menambahkan Data
function tambahData ($data){
  global $db;

  // Menyimpan data yang diambil dari parameter function tambahData
  // Contoh variabel : $nisn_siswa, $nama_siswa, $kelas_siswa, dst
  // Setiap variabel menyimpan data berdasarkan value dari array yang tertarget
  // Contoh : 
  // $data = parameter 
  // ['nisn'] = value dari salah satu data
  $nisn_siswa = htmlspecialchars($data['nisn']);
  $nama_siswa = htmlspecialchars($data['nama']);
  $kelas_siswa = htmlspecialchars($data['kelas']);
  $foto_siswa = htmlspecialchars($data['foto']);

  // Penggunaan "?" untuk nilai true
  // Penggunaan ":" untuk nilai false
  $agama_siswa = isset($data['agama']) ? htmlspecialchars($data['agama']) : "";
  $telepon_siswa = htmlspecialchars($data['telepon']);

  // Melakukan penambahan data dengan mengacu pada nama field di database
  // Dan variabel yang memiliki nilai dari parameter function tambahData
  $sql = "INSERT INTO data_siswa (nisn_siswa, nama_siswa, kelas_siswa, foto_siswa, agama_siswa, telepon_siswa) 
  VALUES ('$nisn_siswa', '$nama_siswa', '$kelas_siswa', '$foto_siswa', '$agama_siswa', '$telepon_siswa' )";

  // Melakukan tindakan query yang terhubung di database dengan variabel $db (lihat konfigurasi database di atas)
  // Berdasarkan perintah dengan variabel $sql (lihat kode sebelum ini)
  mysqli_query($db, $sql);

  // Mengembalikan nilai, dengan memastikan apakah ada baris yang berubah pada database
  return mysqli_affected_rows($db);
}

// DELETE - Menghapus Data
function deleteData($id){
  global $db;

  // Melakukan penghapusan data dengan mengacu (WHERE) pada id 
  // Id ditanggap melalui URL dengan $_GET
  $sql = "DELETE FROM data_siswa WHERE id = $id";

  // Melakukan tindakan query yang terhubung di database dengan variabel $db (lihat konfigurasi database di atas)
  // Berdasarkan perintah dengan variabel $sql (lihat kode sebelum ini)
  mysqli_query($db, $sql);

  // Mengembalikan nilai, dengan memastikan apakah ada baris yang berubah pada database
  return mysqli_affected_rows($db);
}

// UPDATE - Mengubah Data
function updateData($data){
  global $db;

  $id = $data['id'];
  $nisn_siswa = htmlspecialchars($data['nisn']);
  $nama_siswa = htmlspecialchars($data['nama']);
  $kelas_siswa = htmlspecialchars($data['kelas']);
  $foto_siswa = htmlspecialchars($data['foto']);
  $agama_siswa = htmlspecialchars($data['agama']);
  $telepon_siswa = htmlspecialchars($data['telepon']);

  // Melakukan perintah update data dengan mengacu (WHERE)pada Id salah satu data
  // Id didapat dengan menangkap di URL 
  $sql = "UPDATE data_siswa SET 
          nisn_siswa = '$nisn_siswa',
          nama_siswa = '$nama_siswa',
          kelas_siswa = '$kelas_siswa',
          foto_siswa = '$foto_siswa',
          agama_siswa = '$agama_siswa',
          telepon_siswa = '$telepon_siswa'
          WHERE id = '$id'";

  // Melakukan tindakan query yang terhubung di database dengan variabel $db (lihat konfigurasi database di atas)
  // Berdasarkan perintah dengan variabel $sql (lihat kode sebelum ini)
  mysqli_query($db, $sql);

  // Mengembalikan nilai, dengan memastikan apakah ada baris yang berubah pada database
  return mysqli_affected_rows($db);
}
?>