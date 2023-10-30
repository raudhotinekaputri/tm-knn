<?php
$host = "localhost";
$username = ""; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "text_mining";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['category'])) {
        $category = $conn->real_escape_string($_POST['category']);

        if ($_FILES['document']['error'] === UPLOAD_ERR_OK) {
            $document = $_FILES['document']['name']; // Nama file yang diunggah
            $document_temp = $_FILES['document']['tmp_name']; // Lokasi file sementara

            // Pindahkan file yang diunggah ke direktori yang diinginkan (misalnya 'uploads/')
            $upload_dir = 'uploads/';
            $uploaded_file = $upload_dir . $document;
            
            if (move_uploaded_file($document_temp, $uploaded_file)) {
                // Simpan data pelatihan ke dalam database
                $query = "INSERT INTO training_data (document, category) VALUES ('$uploaded_file', '$category')";
                $result = $conn->query($query);

                if ($result) {
                    echo "Data pelatihan berhasil disimpan.";
                } else {
                    echo "Gagal menyimpan data pelatihan: " . $conn->error;
                }
            } else {
                echo "Gagal mengunggah file.";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header HTML -->
</head>
<body>
    <h1>Input Data Training</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="category">Kategori:</label><br>
        <input type="text" id="category" name="category"><br><br>
        <label for="document">Dokumen (file .txt atau .pdf):</label><br>
        <input type="file" id="document" name="document"><br><br>
        <input type="submit" value="Simpan Data Pelatihan">
    </form>
</body>
</html>
