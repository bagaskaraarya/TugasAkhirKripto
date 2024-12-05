<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $key = $_POST['key'];

    if (strlen($key) !== 16 && strlen($key) !== 24 && strlen($key) !== 32) {
        die("Kunci harus memiliki panjang 16, 24, atau 32 karakter.");
    }

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $filePath = $_FILES['file']['tmp_name'];
        $fileContents = file_get_contents($filePath);

        if ($action === 'encrypt') {
            $encryptedData = encryptAES($fileContents, $key);
            $outputFile = 'encrypted_file.pdf.enc';
            file_put_contents($outputFile, $encryptedData);
            echo "File berhasil dienkripsi! <a href='$outputFile' download>Unduh file terenkripsi</a>";
        } elseif ($action === 'decrypt') {
            $decryptedData = decryptAES($fileContents, $key);
            if ($decryptedData === false) {
                echo "Gagal mendekripsi file. Periksa kunci atau file terenkripsi.";
            } else {
                $outputFile = 'decrypted_file.pdf';
                file_put_contents($outputFile, $decryptedData);
                echo "File berhasil didekripsi! <a href='$outputFile' download>Unduh file terdekripsi</a>";
            }
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

function encryptAES($data, $key)
{
    $iv = openssl_random_pseudo_bytes(16); // IV 16 byte untuk AES
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

    // Gabungkan IV dengan data terenkripsi
    return $iv . $encrypted;
}

function decryptAES($data, $key)
{
    if (strlen($data) < 16) {
        return false; // Data tidak valid
    }

    $iv = substr($data, 0, 16); // Ekstrak IV dari awal file
    $encryptedData = substr($data, 16); // Sisanya adalah data terenkripsi

    // Dekripsi data
    return openssl_decrypt($encryptedData, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
}
?>
