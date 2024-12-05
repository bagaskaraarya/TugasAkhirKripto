<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $_FILES['image']['tmp_name'];
        $image = imagecreatefrompng($imagePath);

        if ($action === 'encrypt') {
            $message = $_POST['message'];
            encryptMessage($image, $message);
        } elseif ($action === 'decrypt') {
            decryptMessage($image);
        }
    } else {
        echo "Gagal mengunggah gambar.";
    }
}

function encryptMessage($image, $message)
{
    $binaryMessage = '';
    foreach (str_split($message) as $char) {
        $binaryMessage .= sprintf("%08b", ord($char));
    }
    $binaryMessage .= '00000000'; // Penanda akhir pesan

    $width = imagesx($image);
    $height = imagesy($image);

    $index = 0;
    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {
            if ($index >= strlen($binaryMessage)) {
                break 2;
            }

            $rgb = imagecolorat($image, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;

            // Sisipkan bit pesan ke LSB dari nilai biru
            $b = ($b & 0xFE) | $binaryMessage[$index]; 
            $newColor = imagecolorallocate($image, $r, $g, $b);
            imagesetpixel($image, $x, $y, $newColor);

            $index++;
        }
    }

    // Simpan gambar hasil
    $outputPath = 'encoded_image.png';
    if (imagepng($image, $outputPath)) {
        imagedestroy($image);
        echo "Pesan berhasil disisipkan! <a href='$outputPath' download>Unduh gambar hasil</a>";
    } else {
        imagedestroy($image);
        echo "Terjadi kesalahan saat menyimpan gambar.";
    }
}


function decryptMessage($image)
{
    $width = imagesx($image);
    $height = imagesy($image);

    $binaryMessage = '';
    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {
            $rgb = imagecolorat($image, $x, $y);
            $b = $rgb & 0xFF;

            $binaryMessage .= $b & 1; // Ambil bit LSB
        }
    }

    $message = '';
    foreach (str_split($binaryMessage, 8) as $byte) {
        if ($byte === '00000000') {
            break;
        }
        $message .= chr(bindec($byte));
    }

    echo "Pesan tersembunyi: " . htmlspecialchars($message);
}
?>
