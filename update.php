<?php
    include 'koneksi.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($konek, "UPDATE akun SET nama = '$nama', username = '$username', password = '$password'
    WHERE id='$id'") OR die(mysqli_error($konek));

    if ($query) {
        header('location: login.php');
    }else{
        echo 'Proses Edit Gagal !';
    }
?>