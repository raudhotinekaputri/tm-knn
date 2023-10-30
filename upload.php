<?php
// Koneksi ke database MySQL
$servername = "localhost";
$username = "";
$password = "";
$dbname = "text_mining";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST["upload"])) {
    $category = $_POST["category"];

    if ($_FILES["file"]["error"] == 0) {
        $filename = $_FILES["file"]["name"];
        $filetmp = $_FILES["file"]["tmp_name"];

        // Baca isi file (PDF atau TXT)
        if (pathinfo($filename, PATHINFO_EXTENSION) == "pdf") {
            // Konversi file PDF ke teks menggunakan pdftotext
            $output = shell_exec("pdftotext " . $filetmp . " -");
        } else if (pathinfo($filename, PATHINFO_EXTENSION) == "txt") {
            // Baca file teks langsung
            $output = file_get_contents($filetmp);
        } else {
            echo "Format file tidak didukung.";
            exit;
        }

        // Simpan teks ke database
        $stmt = $conn->prepare("INSERT INTO training_data (category, document_text) VALUES (?, ?)");
        $stmt->bind_param("ss", $category, $output);

        if ($stmt->execute()) {
            echo "File berhasil diunggah dan disimpan di database.";
            echo '<a href="select_document.php">Lanjut ke tahap berikutnya</a>';
        } else {
            echo "Gagal menyimpan data ke database.";
        }

        $stmt->close();
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
    }
}

$conn->close();
?>