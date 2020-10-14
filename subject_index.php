<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mata Kuliah</title>
</head>

<body>
<h1>Data Mata Kuliah</h1>
<div class="content">
    
    <a href="?f=subject_input">+ Data Mahasiswa</a>
    <br>
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
        $sql = "SELECT * FROM mata_kuliah";
        $result = $mysqli->query($sql);
        echo "<table border=1>
            <tr>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>";
            
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["kode_matakuliah"] . "</td>
                    <td>" . $row["nama_matkul"] . "</td>
                    <td>" . $row["sks"] . "</td>
                    <td><a href='?f=subject_edit&&kode_matakuliah=" . $row["kode_matakuliah"] . "'>Edit</a>||<a href='subject_proses.php?aksi=hapus&&kode_matakuliah=" . $row["kode_matakuliah"] . "'>Hapus</a>
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