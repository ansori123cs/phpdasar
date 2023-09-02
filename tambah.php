<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
}
// menghubungkan ke database
require "function.php";

// pengecekan tombol submit
if (isset($_POST['submit'])){

    if (tambah($_POST)>0) {
        echo"
        <script>
            alert('data berhasil ditambahkan !');
            document.location.href='index.php';
        </script>
        ";
    }else{
        echo"
        <script>
            alert('data gagal ditambahkan !');
            document.location.href='index.php';
        </script>
        ";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
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
  </style>
</head>

<body>
  <header>
    <!-- header -->
  </header>
  <main>
   <div class="formdata">
   <h1>Form Tambah Data</h1>
   <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="npm" class="form-label">npm</label>
      <input type="text" class="form-control" name="npm" id=""Required>
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">nama</label>
      <input type="text" class="form-control" name="nama" id=""Required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id=""Required>
    </div>
    <div class="mb-3">
      <label for="jurusan" class="form-label">jurusan</label>
      <input type="text" class="form-control" name="jurusan" id="">
    </div>  
    <div class="mb-3">
      <label for="gambar" class="form-label">gambar</label>
      <input type="file" class="form-control" name="gambar" id="">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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