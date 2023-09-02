<?php

// koneksi ke database  

// $conn = mysqli_connect("sql106.infinityfree.com","if0_34940455","QShWUBGMfXgA","phpdasar");
$conn = mysqli_connect("localhost","root","","phpdasar");

// membuat fungsi yang menampilkan tabel mmahasiswa

function query($query) {
    global $conn;
    $result=mysqli_query($conn,$query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}
// fungsi untuk menambahkan data
function tambah($data){
    global $conn;
//memasukan data dari $_POST ke dalam variabel
    $npm=htmlspecialchars($data["npm"]);
    $nama=htmlspecialchars($data["nama"]);
    $email=htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    
    $gambar=upload();
    if(!$gambar){
        return false;
    }
//  membuat query insert data
$insert="INSERT INTO mahasiswa
VALUES
(null,'$nama','$npm','$email','$jurusan','$gambar');

";
mysqli_query($conn,$insert);
return mysqli_affected_rows($conn);
}

function upload(){
    global $conn;
    $namafile=$_FILES['gambar']['name'];
    $sizefile=$_FILES['gambar']['size'];
    $tmpfile=$_FILES['gambar']['tmp_name'];
    $error=$_FILES['gambar']['error'];

    if($error===4){
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
    // yang diupload gambar
    $ekstensivalid=['jpg','jpeg','png'];
    $ekstensigambar=explode('.',$namafile);
    $ekstensigambar=strtolower(end($ekstensigambar));


    // cek jemis file
    if(!in_array($ekstensigambar,$ekstensivalid)){
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }
    // cek size file
    if($sizefile > 1000000){
        echo "<script>
        alert('ukuran file terlalu besar');
        </script>";
        return false;
    }

    $namafilebaru=uniqid();
    $namafilebaru .='.';
    $namafilebaru .=$ekstensigambar;
    // lolos pengecekan
    move_uploaded_file($tmpfile,'img/'.$namafilebaru);

    return $namafilebaru;
}
// fungsi hapus data
function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa where id=$id");
    return mysqli_affected_rows($conn);
}

// fungsi ubah data
function ubah($edit){
    global $conn;

    $id=htmlspecialchars($edit["id"]);
    $npm=htmlspecialchars($edit["npm"]);
    $nama=htmlspecialchars($edit["nama"]);
    $email=htmlspecialchars($edit["email"]);
    $jurusan=htmlspecialchars($edit["jurusan"]);
    $gambarLama=htmlspecialchars($edit["gambarLama"]);

    // cek gambar diubah atau tidak
    if($_FILES['gambar']['error']===4){
        $gambar=$gambarLama;
    }
    else{
        $gambar=upload();
    }

    $query = "UPDATE mahasiswa SET 
    nama='$nama',
    npm='$npm',
    email='$email',
    jurusan='$jurusan',
    gambar='$gambar'
     WHERE id=$id";

    mysqli_query($conn , $query);
    return mysqli_affected_rows($conn);
}
// fungsi cari
function cari($keyword){
    $query="SELECT * FROM mahasiswa WHERE 
    nama LIKE '%$keyword%' OR
    npm LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' 
    ";
    return query($query);
}
function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    // cek username
    $result= mysqli_query($conn ," SELECT username FROM user where username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah ada!');
        </script>";
        return false;  
    }

    if($password !== $password2){
        echo "<script>
        alert('password tidak sesuai!');
        </script>";
        return false;
    }
        // enkripsi password menggunakan hash md5 tidak aman
        $password = password_hash($password , PASSWORD_DEFAULT);
        //  membuat query insert data
        $insert="INSERT INTO user
        VALUES
        (null,'$username','$password');
        ";
        mysqli_query($conn,$insert);
    return mysqli_affected_rows($conn);
}
?>