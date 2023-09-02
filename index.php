<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
}

// koneksi ke file lain
require "function.php";

// pagenation
$jumlahDataperHalaman= 4;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData/$jumlahDataperHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] :1;
$awalData = ($jumlahDataperHalaman * $halamanAktif) - $jumlahDataperHalaman;
// pemangilan fungsi
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataperHalaman");

if(isset($_POST["cari"])){
  $mahasiswa= cari($_POST["keyword"]);
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
    .loader{
      width: 40px;
    }
  </style>
   <script src="js/jquery3.7.1.js"></script>
   <script src="js/script.js"></script> 
</head>

<body>
  <header>
    <nav class="nav justify-content-end ">
      <a class="nav-link" href="#"id="home">Home</a>
      <a class="nav-link" href="registrasi.php"id="home">daftar admin</a>
      <a class="nav-link" href="#">olah data</a>
      <a class="nav-link" href="logout.php">LogOut</a>
      
    </nav>
  </header>
  <main>
  <div class="formdata">
  <h1>Daftar Data Mahasiswa</h1>

<form action="" method="post" class="row g-3 mb-3 mt-3">
  <div class="col-auto ">
    <input type="text"
      class="form-control " name="keyword" id="keyword" placeholder="cari data" autocomplete="off" >
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end col-auto">
    <button class="btn btn-primary" type="submit" name="cari" id="tombolcari">cari</button>
    <img src="img/load.gif" alt="" class="loader">
  </div>
</form>
<a href="tambah.php" class="btn btn-primary">Tambahkan Data Mahasiswa</a> | <a name="" id="" class="btn btn-primary" href="#" role="button">Print</a>
<div class="table-responsive" id="container">
    <table class="table table-primary p-2 b-2">
        <thead>
            <tr class="bg-warning">
                <th scope="col">id</th>
                <th scope="col">aksi</th>
                <th scope="col">gambar</th>
                <th scope="col">npm</th>
                <th scope="col">nama</th>
                <th scope="col">email</th>
                <th scope="col">jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            <?php foreach($mahasiswa as $row):?>
            <tr class="">
               <td scope="col"><?= $i;?></td>
                <td scope="col"><a class="btn btn-primary" href="ubah.php?id=<?= $row["id"];?>"">ubah</a>
                  <a class="btn btn-primary" href="hapus.php?id=<?= $row["id"];?>"onclick="return confirm('yakin menghapus data');">hapus</a>
                </td>
                <td scope="col"><img src="img/<?= $row["gambar"];?>" alt="" width="60px"></td>
                <td scope="col"><?= $row["npm"];?></td>
                <td scope="col"><?= $row["nama"];?></td>
                <td scope="col"><?= $row["email"];?></td>
                <td scope="col"><?= $row["jurusan"];?></td>
            </tr>
            <?php $i++;?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="...">
  <ul class="pagination d-flex justify-content-center">
  <?php if($halamanAktif >1 ) :?>
    <li class="page-item">
      <a class="page-link" href="?halaman=<?=$halamanAktif-1 ;?>">previous</a>
    </li>
    <?php endif;?>
    <?php for( $i=1;$i<=$jumlahHalaman;$i++):?>
      <?php if($i == $halamanAktif):?>
        <li class="page-item active">
          <a class="page-link" href="?halaman=<?=$i;?>"><?= $i; ?></a>
        </li>
        <?php else :?>
        <li class="page-item"><a class="page-link" href="?halaman=<?=$i;?>"><?= $i; ?></a></li>
        <?php endif;?>

      <?php endfor;?>

    
    <?php if($halamanAktif < $jumlahHalaman) :?>
    <li class="page-item">
      <a class="page-link" href="?halaman=<?=$halamanAktif+1 ;?>">Next</a>
    </li>
    <?php endif;?>
  </ul>
</nav>
</div>
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
