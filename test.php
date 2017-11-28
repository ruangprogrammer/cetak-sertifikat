<h1>hello cuk</h1>
<?php
require('../admin/config.php');

$sql=mysql_query("SELECT * FROM siswa WHERE siswa_id='5'");
$data = mysql_fetch_array($sql);

$foto = "<img src='../images/siswa/".$data['siswa_images']."' width='177' height='236'>";
echo "ID = ".$_GET['id']."<br>";
echo $foto;
?>