<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<title>Document</title>
</head>

<body>
	<nav>
	<a href="index.php">Home</a>	
	<a href="?f=lecturer_index">Data Dosen</a>
		<a href="?f=student_index">Data Mahasiswa</a>
		<a href="?f=subject_index">Data Matakuliah</a>
	
	<?php
	//memulai session
	session_start();
	//isset akan mengecek apakah variabel ada isinya atau tidak 
	//dalam hal ini variabel $_SESSION["username"] diinisiasi/diisikan value-nya waktu proses login
	//sehingga dipakai untuk mengecek apakah sudah login atau belum.
	//kl variabel $_SESSION["username"] kosong berarti belum login sehingga tdk akan ditampilkan link logout
	
	if (isset($_SESSION["username"])) {
		echo "<a id='logout' href='?f=logout'>Logout</a>";
	}else{
		header("Location: login.php");
	}
	?>
	</nav>
	<br>

	<?php
	//mekanisme/trik untuk menjalankan file php dari url/link tampa ekstensi php dengan menggunakan get
	//trik seperti ini akan sering digunakan pada framework laravel untuk membedakan halaman utama (home page) dengan page yang lain.
	//pertama akan mengecek apakah variabel $_GET['f'] ada value-nya atau tidak. value get berupa 
	//kl ada, akan digunakan untuk memanggil file sesuai dengan value yang diperoleh dari $_GET dengan code include_once
	if (isset($_GET['f'])) {
		$file = $_GET['f'];
		if (file_exists("$file.php")) {
			include_once "$file.php";
		} else {
			echo 'File Tidak ada</b>';
		}
	} else {
		echo '<h1>Selamat Datang di Kelas Proweb IF</h1>
		<div class="content">
			<img id="homeimg" src="img/home.png" alt="home" >
		</div>';
	}
	?>
	
</body>

</html>