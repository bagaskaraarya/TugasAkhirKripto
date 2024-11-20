<?php

    include "koneksi.php";

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $level = $_POST['level'];

    $query = mysqli_query($konek, "INSERT INTO akun
                        VALUES('', '$nama', '$username', '$password', '$level')"
                        ) or die(mysqli_error($konek));

    if ($query) {
        header('location: login.php');
    }else{
        echo "Proses Input Gagal !";
    }

?>