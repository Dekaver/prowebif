<?php
//Tempat untuk mengeksekusi semua event baik itu input data, edit data dan hapus data.

//membuat objek database mysql dengan format (link_server, username_mysql, password_mysql, database_mysql)
$mysqli = new mysqli("localhost", "root", "", "database");

//setiap request yang datang akan dicek methodnya apakah post atau get. 
//$_POST['aksi'] valuenya diperoleh dari tag <input type="hidden" value=""> karena kl metod post, data yang dikirim dr suatu form, tdk ditampilkan di url/link.
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $jeniskelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
	
	//eksekusi query mysql dalam hal ini input data ke tabel
    $query = "INSERT INTO mahasiswa (nim, nama, prodi, jenis_kelamin, alamat) VALUES ('$nim', '$nama', '$prodi', '$jeniskelamin', '$alamat')";
    $result = $mysqli->query($query);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $jeniskelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];

    $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi=' $prodi', jenis_kelamin='$jeniskelamin', alamat='$alamat' WHERE nim='$nim'";
    $result = $mysqli->query($query);
} else if ($_GET['aksi'] == "hapus") {
    $query = "DELETE FROM mahasiswa WHERE nim='" . $_GET['nim'] . "'";

    $result = $mysqli->query($query);
} 
header("Location: index.php?f=student_index");
$mysqli->close();
