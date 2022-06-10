<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin Control BETA</title>
  </head>
  <body>
  <?php include"menu.php";?>
    <div class="container">
        <div class="row py-5">
            <div class="col">
            <?php
include "conect.php";
$sql=mysqli_query($con,"select * from user where id='$_GET[id]'");
$data=mysqli_fetch_array($sql);

?>
            <form action="" method="post">
            <div class="form-floating mb-3">
  <input type="text" name="nama" class="form-control" id="floatingInput" value="<?php echo $data['nama']; ?>">
  <label for="floatingInput">Nama</label>
</div>
<div class="form-floating mb-3">
  <input type="text" name="nip" class="form-control" id="floatingInput" value="<?php echo $data['nip']; ?>" onkeypress="return hanyaAngka(event)">
  <label for="floatingInput">NIP</label>
</div>
<div class="form-floating mb-3">
  <input type="text" name="hp" class="form-control" id="floatingInput" value="<?php echo $data['hp']; ?>">
  <label for="floatingInput">Merk Hp</label>
</div>
<div class="d-grid gap-2">
<button type="submit" name="proses" class="btn btn-primary">Ubah</button>
</div>
</form>

<?php
include "conect.php";

if(isset($_POST['proses'])){
mysqli_query($con, "update user set  
nama = '$_POST[nama]',
nip = '$_POST[nip]',
hp = '$_POST[hp]'
where id = '$_GET[id]'");

echo "Data telah diubah";
echo "<meta http-equiv=refresh content=1;URL='admin.php'>";

}

?>
</div>
</div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function hanyaAngka(event) {
            var nip = (event.which) ? event.which : event.keyCode
            if (nip != 46 && nip > 31 && (nip < 48 || nip > 57))
                return false;
            return true;
        }
    </script>
  </body>
</html>
