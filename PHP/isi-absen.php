<?php
require '../functions.php';
//koneksi database
// $conn = mysqli_connect("localhost","root","","phpdasar");

// cek tombol ditekan atau belum
if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href ='../index.php';
        </script>";
    } else{
        echo "<script>
            alert('Data Gagal Ditambahkan');
            document.location.href ='../index.php';
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../CSS/absen.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen</title>
</head>

<body>
    <div class="container">
        <h1>ISI ABSEN</h1>
        <form action="" method="POST">
            <div class="wrapper">
                <ul>
                    <li>
                        <label for="nama" class="nama">Nama :</label>
                        <input type="text" name="nama" id="nama" required>
                    </li>
                    <li>
                        <label for="hari" class="hari">Hari :</label>
                        <input type="date" name="hari" id="hari" required>
                    </li>
                    <li>
                        <label for="jam" class="jam">Jam :</label>
                        <input type="time" name="jam" id="jam" required>
                    </li>
                    <li>
                        <button type="submit" name="submit">Tambah Data</button>
                    </li>
                </ul>
        </form>
        </div>
    </div>



</body>

</html>