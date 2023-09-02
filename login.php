<?php
session_start();
require "function.php";

if(isset($_COOKIE['id'])&& isset($_COOKIE['key'])){
  $id =$_COOKIE['id'];
  $key =$_COOKIE['key'];

  $result=mysqli_query($conn,"SELECT username FROM user WHERE id =$id");
  $row =mysqli_fetch_assoc($result);

  if($key===hash('sha256',$row['username'])){
    $_SESSION['login']= true ;

  }
}

if(isset($_SESSION["login"])){
  header("Location:index.php");
  exit;
}
// menghubungkan ke database


// pengecekan tombol submit
if (isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username ='$username'");
    if (mysqli_num_rows($result)=== 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            // set session
            $_SESSION["login"]=true;

            // membuat cookie
            if(isset($_POST['remember'])){
              setcookie('id',$row['id'],time()+60);
              // hash enkripsi 
              setcookie('key',hash('sha256',$row['username']),time()+60);
            }
            header("Location: index.php");
            exit;
        }
    }
    $error=true;
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    .formdata{
      width: 90%;
      margin: auto;
      border: 2px solid black;
      padding: 15px;
      margin-top: 50px;
      
    }
    .error{
        color: red;
        font-style: italic;
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="formdata">
        <H1>Login</H1>
        <?php if(isset($error)):?>
            <p class="error">Username / Password Salah!</p>
            <?php endif;?>
        <form action="" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" id="">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="">
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id=""name="remember">
                <label class="form-check-label" for="remember">Remember Mes</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary"name="login">Login!</button>
        </form>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>