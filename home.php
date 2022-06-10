<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Login</title>
  </head>
<?php
session_start();
error_reporting(0);
        $user = array(
                        "user" => "Andri",
                        "pass"=>"dome"            
                );
if (isset($_POST['submit'])) {
    if ($_POST['username'] == $user['user'] && $_POST['password'] == $user['pass']){
        //Membuat Session
        $_SESSION["username"] = $_POST['username']; 
        echo "<meta http-equiv='refresh' content='2; url=admin.php'>
        Anda Berhasil Login $_POST[username]";

        /*Jika Ingin Pindah Ke Halaman Lain*/
        // header("Location: admin.php"); //Pindahkan Kehalaman Admin
    } else {
        // Tampilkan Pesan Error
        display_login_form();
        echo '<script>alert("Username atau Password Salah :(");</script>';
    }
}    
else { 
    display_login_form();
}
function display_login_form(){ ?>
<div class="container">
    <div class="row">
        <div class="col">
        <div class="card mb-3 position-absolute top-50 start-50 translate-middle">
    <div class="row g-0">
      <div class="col-md-4">
        <img style="max-width: 250px;" src="Photos/Material/login.png" class="img-fluid rounded-start" alt="Login">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Login Admin</h5>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Username</label>
              <input type="text" name="username" id="username">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" id="password">
            </div>
            <button type="submit" type="submit" name="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>  
<?php } ?>