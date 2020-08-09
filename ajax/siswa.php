<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = $query = "SELECT *FROM absen WHERE
nama LIKE '%$keyword%' OR
hari LIKE '%$keyword%' OR
jam LIKE '%$keyword%'";
$siswa = query($query);

?>

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