<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';
require_once('../admin/config.php');
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();


$sql=mysql_query("SELECT * FROM siswa WHERE siswa_id='".$_GET['id']."'");
$data = mysql_fetch_array($sql);


$no_seri = "V123 / MECHANIC";
$no_induk = $data['siswa_code'];
$nama = $data['siswa_name'];
$tempat = $data['siswa_city'];
$tgl_lahir = "13 November 1998";//$data['']
$dari = "12 Oktober 2017";
$sampai = "13 Oktober 2019"; 
$foto = "<img src='../images/siswa/".$data['siswa_images']."' width='177' height='236'>";
//echo "ID = ".$_GET['id']."<br>";
//echo $foto;

//$Dear = 'WILMAN FUARI';
//$foto = "<img src='image/foto.jpg' width='177' height='236'>";
//echo $foto; exit();
$dompdf->loadHtml("
<!DOCTYPE html>
<html>
    <head>
        <title>VMR - Mekanik Berdasi</title>

        <style type='text/css'>
         @page { margin: 0in; }
            body {
                    font-size: 118%;
                    font-family: 'Times New Roman', Times, serif;
                    /* font-weight:bold;*/
                    background-image: url(baground-image-A4.jpg);
                    /* width: 960px;*/
            }

        
            .container{
                margin: 0px 100px 0px 100px;
               /* width: 950%;*/
                /*text-align: center;*/
            }

            .row{
                 clear: both;


            }

            .sub-row-foto{
                float: left;

            }
            .sub-row{
                float: right;
                text-align:center;
            }

        </style>
    </head>

    <body>

        <div class='container'>
        <h1>Sertifikat</h1>Nomor : ".$no_seri."
        <h1 style='text-align: center;'>DIBERIKAN KEPADA</h1>
        <div class='row'>
            <table border='0'>
          <tr>
            <td>Nama</td><td>:</td><td><b>".$nama."</b></td>
          </tr>
          <tr>
            <td>No. Induk</td><td>:</td><td><b>".$no_induk."</b></td>
          </tr>
          <tr>
            <td>Tempat / Tanggal Lahir</td><td>:</td><td><b>".$tempat." / ".$tgl_lahir."</b></td>
          </tr>
        </table>
        <hr>
Telah menyelesaikan dan mengikuti PRIVATE MODIFIKASI di <b>VMR RANCING MECHANIC COURSE YOGYAKARTA</b>
<table border='0'>
    <tr>
      <td>Dari</td><td>:</td><td>".$dari."</td>
    </tr>
    <tr>
      <td>Sampai</td><td>:</td><td>".$sampai."</td>
    </tr>
    <tr>
      <td>Dengan Hasil</td><td>:</td><td><b>Baik</b></td>
    </tr>

  </table>
  <hr>
        </div>

        <div class='row'>
            <div class='sub-row-foto'>
              ".$foto."
            </div>
            <div class='sub-row'>
            <br><b>
                Yogyakarta, 20 januari 2017<br><br><br><br><br><br><br><br>
                Wilman Fuari Hidayat AMD.KOM.
                </b>
            </div>
        </div>
        <div class='row'><hr>
            <h4>www.vmrmekanikberdasi.com</h4>
        </div>
        </div>

    </body>
</html>");

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream('Sertifikat',array('Attachment'=>0));
?>