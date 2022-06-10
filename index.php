<?php
# Script koneksi untuk ke database

$server = "localhost";
$username = "root";         # User MySQL
$password = "";         # password MySQL ! Alert XAMPP biasanya dikosongkan
$database = "project01_DB"; # Database

# Script koneksi selesai

# Script untuk menampilkan jika server dan username password salah

mysql_connect($server, $username, $password)
or die ("<h1><center>Server tidak terhubung dengan baik ! </center></h1>
<p>Mohon periksa ulang dibagian Server, Username, dan Password.</p>" . mysql_error());

mysql_select_db($database) or die ("<h1><center>Database tidak terhubung dengan baik</center></h1>
<p>Apakah Database sudah dibuat ?</p>" . mysql_error());

# Script Switch case untuk Rest API

# untuk membuat pilihan contoh [URL]?fiture=.....

@$fiture = $_GET['fiture'];

switch ($fiture) {

	# Contoh Link [URL]?fiture=view&id=[nomor id]

	case "view":
		@$id = $_GET['id'];
		$query = mysql_query("SELECT * FROM user WHERE id='$id'") or die(mysql_error());
		$data_array = array();
		$data_array = mysql_fetch_assoc($query);
		echo "<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <meta http-equiv='refresh' content='10; url=close.php'>
    <div class='container'>
    <div class='row'>
    </div class='col'>
    <div class='card text-white bg-primary position-absolute top-50 start-50 translate-middle'>
        <div class='card-header'>
          INFORMASI
        </div>
        <div class='card mb-3 bg-primary' style='max-width: 540px;'>
          <div class='row g-0'>
            <div class='col-md-4'>
              <img style='max-height: 500px;' src='/Photos/$data_array[foto]' class='img-fluid rounded-start' alt='$data_array[nama]'>
            </div>
            <div class='col-md-8 bg-primary'>
              <div class='card-body text-white bg-primary'>
                <h5 class='card-title'>$data_array[nama]</h5>
                <p class='card-text'>NIP : $data_array[nip]
                <br>Merk Hp : $data_array[hp]</p>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    </div>
</div>
<script></script>";
		break;
####################################
###                              ###
###              END             ###
###                              ###
####################################
	default:
	echo "<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>
  <h1 class='text-center'>Page Not Found</h1>";
	break;
}

?>
