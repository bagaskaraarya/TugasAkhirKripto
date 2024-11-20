<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Source+Code+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $query = mysqli_query($konek, "SELECT * FROM akun WHERE id = $id");
        $data=mysqli_fetch_array($query); 
    ?>

	<section class="header-login pt-5">
		<div class="container-fluid register">
			<div class="header-container-login">
				<img src="img/Logo.png" alt="logo" class="gambar" style="margin-left: 120px;">
				<h1 class="header-login">Edit Profile</h1>
			</div>
			<div class="line"></div>
			<div class="body-container-login">
				<br>
				<form action="update.php" method="post">
                    <input type="hidden" name="id">
                    <label for="">Name</label>
                    <br>
                    <input type="text" name="nama" class="name">
                    <br>
                    <br>
					<label for="">Username</label>
					<br>
					<input type="text" name="username" class="username">
					<br>
					<br>
					<label for="">Password</label>
					<br>
				 	<input type="text" name="password" class="password">
					<br>
					<br>
					<input type="submit" value="Edit" class="btnlogin">
					<a class="btn btn-secondary" href="home.php" role="button" style="width: 150px;">Back</a>
				</form>
			</div>
		</div>
	</section>

	<section class>

	</section>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>