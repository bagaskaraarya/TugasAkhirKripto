<?php

    session_start();
    
    include("koneksi.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $query = mysqli_query($konek, "SELECT * FROM akun WHERE username = '$username' AND password = '$password'")
    OR die (mysqli_error($konek)); 

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $data = mysqli_fetch_array($query);
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];
        $_SESSION['id'] = $data['id'];
        header('location: home.php');
    }else{
        header("location:login.php?pesan=gagal");
    }
?>