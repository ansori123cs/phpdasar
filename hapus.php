<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
}
require "function.php";
$idm=$_GET["id"];

if(hapus($idm)>0){
    echo"
    <script>
        alert('data berhasil dihapus !');
        document.location.href='index.php';
    </script>
    ";
}else{
    echo"
    <script>
        alert('data gagal dihapus !');
        document.location.href='index.php';
    </script>
    ";
}



?>