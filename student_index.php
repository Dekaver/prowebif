<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
</head>

<body>
<h1>Data Mahasiswa</h1>
    <div class="content">
    
    <a href="?f=student_input">+ Data mahasiswa</a>
    <br>
    

    <?php
	// Cek sudah login atau belum, kalau belum akan diredirect ke page logi. Penjelasan kode ini ada di file index.php
    if (isset($_SESSION["username"])) {
		//membuat objek mysql
        $mysqli = new mysqli("localhost", "root", "", "database");

        //mengecek apakah sudah terkoneksi ke database mysql atau belum
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

		//menjalankan query mysql
        $sql = "SELECT * FROM mahasiswa";
        $result = $mysqli->query($sql);
        echo "<table border=1>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>";
		//mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
        if ($result->num_rows > 0) {
            // menampilkan hasil query data berdasarkan baris. nip, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["nim"] . "</td>
                    <td>" . $row["nama"] . "</td>
                    <td>" . $row["prodi"] . "</td>
                    <td>" . $row["jenis_kelamin"] . "</td>
                    <td>" . $row["alamat"] . "</td>
                    <td><a href='?f=student_edit&&nim=" . $row["nim"] . "'>Edit</a>||<a href='student_proses.php?aksi=hapus&&nim=" . $row["nim"] . "'>Hapus</a>
                  </tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        $mysqli->close();
    }else{
        header("Location: login.php");
    }
    ?>
    </div>
</body>

</html>