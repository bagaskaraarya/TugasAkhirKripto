<?php

	session_start();
	if (empty($_SESSION['username'])) {
		header('location:login.php?pesan=belum_login');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                <li><a href="#">Home</a></li>
                <li><a href="review.php">Review Film</a></li>
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

    <section class="content">
        <h1 class="judul">Now Playing</h1>
        <div class="line-user"></div>
        <div class="slider">
            <div class="list">
                <div class="item">
                    <img src="img/G1.jpg" alt="slide1">
                </div>
                <div class="item">
                    <img src="img/G2.jpg" alt="slide2">
                </div>
                <div class="item">
                    <img src="img/G3.jpg" alt="slide3">
                </div>
            </div>
            <div class="btn-slider">
                <button id="prev"><</button>
                <button id="next">></button>
            </div>
            <ul class="dots">
                <li class="active"></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <p class="quotes"> Cinema is a reflection of life, where human stories, 
            dreams, and imagination converge in a harmony of visuals and emotions, 
            teaching us to see the world from different perspectives.
        </p>
    </section>

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>