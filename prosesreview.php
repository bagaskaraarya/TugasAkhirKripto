<?php
// Fungsi Caesar Cipher
function caesarCipherEncrypt($text, $shift = 12, $chunkSize = 1024) {
    $result = "";
    $shift = $shift % 26;

    for ($i = 0; $i < strlen($text); $i += $chunkSize) {
        $chunk = substr($text, $i, $chunkSize);
        $result .= processChunkEncrypt($chunk, $shift);
    }

    return $result;
}

function processChunkEncrypt($chunk, $shift) {
    $result = "";
    for ($i = 0; $i < strlen($chunk); $i++) {
        $char = $chunk[$i];
        if (ctype_upper($char)) {
            $result .= chr(((ord($char) - 65 + $shift) % 26) + 65);
        } elseif (ctype_lower($char)) {
            $result .= chr(((ord($char) - 97 + $shift) % 26) + 97);
        } else {
            $result .= $char; // Non-huruf ditambahkan langsung
        }
    }
    return $result;
}

function caesarCipherDecrypt($text, $shift = 12, $chunkSize = 1024) {
    return caesarCipherEncrypt($text, 26 - $shift, $chunkSize);
}

// Fungsi RC4
function rc4Encrypt($key, $data) {
    $key = array_values(unpack('C*', $key));
    $data = array_values(unpack('C*', $data));
    $keyLength = count($key);
    $dataLength = count($data);

    $s = range(0, 255);
    $j = 0;

    // Key-scheduling algorithm (KSA)
    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + $key[$i % $keyLength]) % 256;
        list($s[$i], $s[$j]) = [$s[$j], $s[$i]];
    }

    // Pseudo-random generation algorithm (PRGA)
    $i = $j = 0;
    $result = [];
    foreach ($data as $byte) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        list($s[$i], $s[$j]) = [$s[$j], $s[$i]];
        $result[] = $byte ^ $s[($s[$i] + $s[$j]) % 256];
    }

    return pack('C*', ...$result);
}

// Ambil data dari POST
$plaintext = $_POST['plaintext'] ?? '';
$shift = intval($_POST['shift'] ?? 12);
$rc4Key = $_POST['rc4_key'] ?? '';

// Validasi input
if (strlen($plaintext) > 5000000) { // 5 juta karakter
    die("Teks terlalu panjang untuk diproses.");
}
if (empty($rc4Key)) {
    die("Kunci RC4 tidak boleh kosong.");
}

// Proses enkripsi dan dekripsi
$caesarEncrypted = caesarCipherEncrypt($plaintext, $shift);
$superEncrypted = rc4Encrypt($rc4Key, $caesarEncrypted); // Super encryption (Caesar + RC4)
$rc4Decrypted = rc4Encrypt($rc4Key, $superEncrypted); // RC4 decryption
$finalDecrypted = caesarCipherDecrypt($rc4Decrypted, $shift); // Caesar decryption
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Super Encryption</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Source+Code+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-xl" style="background-color: #EEEEEE; padding: top 30px;">
        <h1 class="head">SUPER ENKRIPSI</h1>
        <form action="prosesreview.php" method="POST">
            <label for="">Nama Film</label>
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" value="<?php echo $namafilm = $_POST['namaFilm'];?>" aria-label="Username" aria-describedby="addon-wrapping" style="margin-bottom:20px;">
            </div>

            <label for=""> Enkripsi Review Film</label>
            <div class="form-floating">
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px; padding-top: 10px; margin-bottom: 20px;" name="plaintext"><?php echo nl2br(bin2hex($superEncrypted)); ?></textarea>
            </div>

            <label for=""> Enkripsi Review Film</label>
            <div class="form-floating">
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px; padding-top: 10px; margin-bottom: 20px;" name="plaintext"><?php echo htmlspecialchars($finalDecrypted); ?></textarea>
            </div>

            <a href="review.php">Kembali ke Input</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
