<?php
//Tempat untuk mengeksekusi semua event baik itu input data, edit data dan hapus data.

//membuat objek database mysql dengan format (link_server, username_mysql, password_mysql, database_mysql)
$mysqli = new mysqli("localhost", "root", "", "database");

//setiap request yang datang akan dicek methodnya apakah post atau get. 
//$_POST['aksi'] valuenya diperoleh dari tag <input type="hidden" value=""> karena kl metod post, data yang dikirim dr suatu form, tdk ditampilkan di url/link.
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $nama_matkul = $_POST["nama_matkul"];
    $sks = $_POST["sks"];
	
	//eksekusi query mysql dalam hal ini input data ke tabel
    $query = "INSERT INTO mata_kuliah (kode_matakuliah, nama_matkul, sks) VALUES ('$kode_matakuliah', '$nama_matkul', '$sks')";
    $result = $mysqli->query($query);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $nama_matkul = $_POST["nama_matkul"];
    $sks = $_POST["sks"];

    $query = "UPDATE mata_kuliah SET kode_matakuliah='$kode_matakuliah', nama_matkul='$nama_matkul', sks=' $sks' WHERE kode_matakuliah='$kode_matakuliah'";
    $result = $mysqli->query($query);
} else if ($_GET['aksi'] == "hapus") {
    $query = "DELETE FROM mata_kuliah WHERE kode_matakuliah='" . $_GET['kode_matakuliah'] . "'";

    $result = $mysqli->query($query);
} 
header("Location: index.php?f=subject_index");
$mysqli->close();
