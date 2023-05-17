<?php

ob_start();
session_start();
$koneksi = new mysqli('localhost', 'root', '', 'modul-perpustakaan');
// if ($_SESSION['admin'] || $_SESSION['user']) {
//     header('location:index.php');
// } else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PERPUSTAKAAN || LOGIN</title>
  <link href="assets/css/login.css" rel="stylesheet" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" /> -->
</head>

<body>
  <form method="POST">
  <div class="login-wrap" style="margin-top: 100px;" >
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
      <div class="login-form">
        <div class="sign-in-html">
          <div class="group">
            <label for="exampleInputEmail1" class="label">Username</label>
            <input type="text" name="user_name" class="input">
          </div>
          <div class="group">
            <label for="exampleInputPassword1"  class="label">Password</label>
            <input  type="password" name="password" class="input" data-type="password">
          </div>
          <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> Keep me Signed in</label>
          </div>
          <div class="group">
            <!-- <input type="submit" class="button" name="login" value="login" > -->
            <button type="submit" name="login" value="login" class="button">Login</button>
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <a href="#forgot">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script> -->
</body>
</html>

<!-- koneksi -->
<?php
if (isset($_POST['login'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = $koneksi->query("select * from tb_user where user_name='$user_name' and password='$password'");

    $data = $sql->fetch_assoc();

    $ketemu = $sql->num_rows;

    if ($ketemu >= 1) {
        session_start();
        if ($data['level'] == 'admin') {
            $_SESSION['admin'] = $data['id_user'];
            header('location:index.php');
        } elseif ($data['level'] == 'user') {
            $_SESSION['user'] = $data['id_user'];
            header('location:index.php');
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Login Gagal,Username dan Password Anda Salah.... SILAKAN ULANGI KEMBALI");
            // header('location:login.php');
        </script>
      <?php
    }
}
?>
