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
            <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">NIP</th>
        <th scope="col" colspan="2" class="text-center">Menu</th>
      </tr>
    </thead>
    <tbody>
        <?php
    include "conect.php";

    $no=1;
    $ambildata = mysqli_query($con,"select * from user");
    while($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$tampil[id]</td>
            <td>$tampil[nama]</td>
            <td>$tampil[nip]</td>
            <td><a href='?id=$tampil[id]'> Hapus </a></td>
            <td><a href='edit.php?id=$tampil[id]'> Ubah </a></td>
        <tr>";
        $no++;
    }
    ?>
      
    </tbody>
  </table>
  <?php
    include "conect.php";

    if(isset($_GET['id'])){
    mysqli_query($con,"delete from user where id='$_GET[id]'");
    
    echo "<script> alert('Data berhasil dihapus :(');</script>";
    echo "<meta http-equiv=refresh content=2;URL='admin.php'>";

    }
    ?>
</div>
</div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
