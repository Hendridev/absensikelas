<?php 
//  koneksi ke database
$db = mysqli_connect("sql209.epizy.com","root","", "siswa");

function query($query){
    global $db;
    $result = mysqli_query($db,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $hari = htmlspecialchars($data["hari"]);
    $jam = htmlspecialchars($data["jam"]);

    $query = "INSERT INTO absen
    VALUES
    ('','$nama','$hari','$jam')";

    mysqli_query($db,$query);

    return mysqli_affected_rows($db);
}

function cari($keyword){
    $query = "SELECT * FROM absen WHERE
               nama LIKE '%$keyword%' OR
               hari LIKE '%$keyword%' OR
               jam LIKE '%$keyword%'";
    return query($query);
}

?>