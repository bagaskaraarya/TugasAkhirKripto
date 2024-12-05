<?php

	session_start();
	if (empty($_SESSION['username'])) {
		header('location:login.php?pesan=belum_login');
	}

?>

<?php

    function caesarCipherEncrypt($text, $shift = 12){
        $result = "";
        $shift = $shift % 26;

        for($i = 0; $i < strlen($text); $i++){
            $char = $text[$i];

            if(ctype_upper($char)){
                $result .= chr(((ord($char) - 65 + $shift) %26) + 65);
            } elseif(ctype_lower($char)){
                $result .= chr(((ord($text) - 97 + $shift) % 26) + 97);
            } else{
                $result .= $char;
            }
        }
        return $result;
    }

    function caesarCipherDecrypt($text, $shift = 12){
        return caesarCipherDecrypt($text, 26 - $shift);
    }

    $plaintext = "";
    $shift = 12; // Default shift
    $encryptedText = "";
    $decryptedText = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Film</title>
    <script>
        function showResult(encrypted, decrypted){
            alert("Hasil Enkripsi : " + encrypted + "\n Hasil Deskripsi : " + decrypted);
        }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Source+Code+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <img src="img/Logo.png" alt="Logo" class="gambar-user">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Review Film</a></li>
                <li><a href="kritik.php">Kritik dan Saran Bioskop</a></li>
                <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="border: none;"><i class="fa-solid fa-user" style="color: #222831; margin-left: 80px; margin-right: 20px;" ></i></button>
            </ul>
        </div>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header offcanvasheader">
                <i class="fa-solid fa-user" style="color: #EEEEEE; margin-left: 5px; margin-right: 5px;" ></i>
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel" style="color: #EEEEEE; font-family: 'Poppins', sans-serif;">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: #EEEEEE;"></button>
            </div>
            <div class="offcanvas-body offcanvassendiri">
                <center> <h3><?php echo $_SESSION['nama']; ?></h3></center>
                <?php if($_SESSION['level'] == 'admin'){?>
                <a href="dekripsi.php"><button type="button" class="btn w-100 " style="background-color: white; box-shadow: 7px 7px #505050;">
                  Decryption 
                </button></a>
                <?php } ?>
                <div style="margin-top: 20px;">
                <div class="sep" style="display: flex">
                  <i class="fa-solid fa-pen-to-square"></i>
                  <p>Edit Profile</p>
                  <a href="edit.php?id=<?php echo $_SESSION['id']; ?>" type="button"><i class="fa-solid fa-greater-than position-absolute end-0" style="color: black;"></i></a>
                </div>
                <div class="sep" style="display: flex">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  <p>Log Out</p>
                  <a href="logout.php" type="button"><i class="fa-solid fa-greater-than position-absolute end-0" style="color: black;"></i></a>
                </div>
                </div>
              </div>
            </div>
        </div>
        </div>
    </header>

    <div class="container-xl" style="background-color: #EEEEEE; padding: top 30px;">
        <h1 class="head">Review Film</h1>
        <form action="prosesreview.php" method="POST">
            <label for="">Nama Film</label>
            <div class="input-group flex-nowrap">
                <input type="text" name="namaFilm" id="namaFilm" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" style="margin-bottom:20px;">
            </div>

            <label for="">Review Film</label>
            <div class="form-floating">
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px; padding-top: 10px; margin-bottom: 20px;" name="plaintext"></textarea>
            </div>

            <label for="">Kunci RC4</label>
            <div>
            <input type="text" name="rc4_key" id="rc4_key" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" style="margin-bottom:20px;">
            </div>
            <input class="btn btn-primary" type="submit" value="Submit" style="margin-bottom: 20px;">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>