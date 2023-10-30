<?php
// Ambil data pelatihan dari file atau database (disesuaikan dengan implementasi Anda)
$trainingData = []; // Isi dengan data pelatihan

// Ambil data dokumen testing dari pengguna (misalnya, dari formulir)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['testing_document'])) {
    $testingDocument = $_POST['testing_document'];
    $cleanTestingText = preg_replace('/[^a-zA-Z0-9\s]/', '', $testingDocument);
    $lowercaseTestingText = strtolower($cleanTestingText);
    $testingWords = explode(' ', $lowercaseTestingText);

    // Hitung k-NN dan klasifikasikan dokumen testing
    // Implementasikan algoritma k-NN di sini

    // Hasil klasifikasi
    $classificationResult = "Kategori Dokumen: [KATEGORI]"; // Ganti [KATEGORI] dengan kategori hasil klasifikasi

    // Tampilkan hasil klasifikasi
    echo "<h2>Hasil Klasifikasi Dokumen:</h2>";
    echo $classificationResult;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header HTML -->
</head>
<body>
    <h1>Klasifikasi Dokumen</h1>
    <form action="classify.php" method="post">
        <label for="testing_document">Dokumen Testing:</label><br>
        <textarea id="testing_document" name="testing_document" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Klasifikasikan Dokumen">
    </form>
</body>
</html>
