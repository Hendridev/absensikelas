<?php 
require 'functions.php';
date_default_timezone_set('Asia/Jakarta');
$date = date('m/d/Y h:i:s a', time());

// halaman setting
$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM absen"));
$jumlahHalaman = ceil($jumlahData /$jumlahDataPerHalaman);

if(isset($_GET['halaman'])){
$halamanAktif = $_GET['halaman'];
} else {
    $halamanAktif = 1;
}
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$siswa = query("SELECT * FROM absen ORDER BY id DESC LIMIT $awalData,$jumlahDataPerHalaman");


if(isset($_POST["cari"])){
    $siswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <script src="typed.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/home.css">
    <title>Home</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="media/bannersmk.png" alt="">
        </div>
        <div class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="https://wa.me/089529303376" target="_blank">Bantuan</a></li>
                <li><a href="http://hendridev.rf.gd/" target="_blank">Tentang</a></li>
            </ul>
        </div>
    </header>
    <section>
            <div class="banner">
                <div class="banner-spacing">
                <p>SELAMAT <span class="att"></span></p>
                <p>ABSENSI <span class="typed"></span></p>
                </div>
            </div>
    </section>
    <section>
        <div class="layout-atas">
        <a href="PHP/isi-absen.php"><button class="button"><p>ISI ABSEN</p></button></a>
        <div class="time"><?php echo $date ?></div>
        </div>
    </section>
    <section class="isi">
        <h1>Daftar Siswa </h1> 
    <form action="" method="POST">
        <input id="keyword" type="text" name="keyword"  placeholder="Cari Nama" autocomplete="off"> <span><i class="fas fa-search"></i></span> 
        <!-- <button type="submit" name="cari" id="tombol">Cari</button> -->
    </form>
    <div class="halaman">
        <?php for($i = 1;$i <= $jumlahHalaman; $i++): ?>
        <div class="box-list">
        <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        </div>
        <?php endfor; ?>

        </div>
    <div id="container">
    <table cellpadding="10" cellspacing="0" class="table">
        <tr>
            <th>No.</th>
            <th>Nama</>
            <th>Hari</th>
            <th>Jam</th>
        </tr>
        <?php $i = 1;?>
        <?php foreach($siswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["hari"];?></td>
            <td><?= $row["jam"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>
    </section>
    <script src="app.js"></script>
    <script>
        var typed = new Typed('.typed', {
            strings: ["SMKN 1 SINTANG", "XI TKJ A"],
            typeSpeed: 200,
            backspeed: 200,
        });
        var typed = new Typed('.att', {
            strings: ["PAGI", "SIANG","MALAM","BELAJAR"],
            typeSpeed: 100,
            backspeed: 100,
        });
    </script>
</body>

</html>