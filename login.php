<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Source+Code+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<section class="header-login pt-5">
		<div class="container-fluid login">
			<div class="header-container-login">
				<h1 class="header-login">Login M-Store</h1>
			</div>
			<div class="line"></div>
			<div class="body-container-login">
				<br>
				<form action="cek_login.php" method="POST">
					<label for="">Username</label>
					<br>
					<input type="text" name="username" class="username">
					<br>
					<br>
					<label for="">Password</label>
					<br>
				 	<input type="password" name="password" class="password">
					<br>
					<br>
					<input type="submit" value="Login" class="btnlogin">
					<a class="btn btn-secondary" href="register.php" role="button" style="width: 150px;">Register</a>
					<p style="margin-left: 45px; font-family='Poppins', sans-serif;"><?php
						if (isset($_GET['pesan'])) {
							if ($_GET['pesan'] == "gagal") {
								echo "Login gagal! username dan password salah !";
							} else if ($_GET['pesan'] == "logout") {
								echo 'Anda berhasil logout ! ';
							} elseif ($_GET['pesan'] == "belum_login") {
								echo 'Anda harus login terlebih dahulu !';
							}
						}
					?></p>
				</form>
			</div>
		</div>
	</section>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>