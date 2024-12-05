<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enkripsi & Dekripsi PDF dengan AES</title>
    <link rel="stylesheet" href="styleaes.css">
</head>
<body>
    <div class="container">
        <h1>Enkripsi & Dekripsi PDF dengan AES</h1>
        <form action="aes.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Pilih File PDF:</label>
                <input type="file" name="file" id="file" accept=".pdf" required>
            </div>
            <div class="form-group">
                <label for="key">Masukkan Kunci (16, 24, atau 32 karakter):</label>
                <input type="text" name="key" id="key" required minlength="16" maxlength="32" placeholder="Masukkan kunci">
            </div>
            <button type="submit" name="action" value="encrypt">Enkripsi</button>
            <button type="submit" name="action" value="decrypt">Dekripsi</button>
        </form>
        <a href="home.php"><button type="button" class="btn btn-danger" style="border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; width: 100%;">Back to Home</button></a>
    </div>
</body>
</html>
