<?php

function textToVector($text) {
    $words = explode(" ", $text);
    $vector = [];
    // Inisialisasi vektor dengan nol
    for ($i = 0; $i < count($words); $i++) {
        $vector[$i] = 0;
    }

    // Mengisi vektor dengan frekuensi kata
    foreach ($words as $word) {
        $vector[array_search($word, $words)] += 1;
    }

    return $vector;
}

function calculateCosineSimilarity($text1, $text2) {
    $vector1 = textToVector($text1);
    $vector2 = textToVector($text2);

    $dotProduct = 0;
    $magnitude1 = 0;
    $magnitude2 = 0;

    for ($i = 0; $i < count($vector1); $i++) {
        $dotProduct += $vector1[$i] * $vector2[$i];
        $magnitude1 += $vector1[$i] * $vector1[$i];
        $magnitude2 += $vector2[$i] * $vector2[$i];
    }

    $magnitude1 = sqrt($magnitude1);
    $magnitude2 = sqrt($magnitude2);

    if ($magnitude1 == 0 || $magnitude2 == 0) {
        return 0; // Menghindari pembagian oleh nol
    }

    return $dotProduct / ($magnitude1 * $magnitude2);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Klasifikasi Dokumen</title>
</head>
<body>
    <h1>Klasifikasi Dokumen</h1>

    <form method="post" action="classify_document.php">
        <label for="test_text">Masukkan Data Tes:</label><br>
        <textarea name="test_text" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" name="classify" value="Klasifikasikan">
    </form>

    <?php
    if (isset($_POST["classify"])) {
        $test_text = $_POST["test_text"];

        // Langkah contoh untuk klasifikasi menggunakan cosine similarity
        $k = 3; // Jumlah tetangga terdekat yang akan dipertimbangkan
        $trainingData = []; // Data pelatihan yang telah diproses

        // Query data pelatihan yang telah diproses dari database
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "text_mining";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql = "SELECT id, processed_text, category FROM training_data WHERE processed_text IS NOT NULL";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $trainingData[] = [
                    'id' => $row['id'],
                    'text' => $row['processed_text'],
                    'category' => $row['category']
                ];
            }
        }

        // Hitung cosine similarity antara dokumen uji dan semua dokumen pelatihan
        $similarities = [];
        foreach ($trainingData as $trainingDoc) {
            $similarity = calculateCosineSimilarity($test_text, $trainingDoc['text']);
            $similarities[] = ['category' => $trainingDoc['category'], 'similarity' => $similarity];
        }

        // Urutkan berdasarkan similarity (semakin tinggi semakin mirip)
        usort($similarities, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        // Ambil $k dokumen terdekat
        $neighbors = array_slice($similarities, 0, $k);

        // Hitung mayoritas kategori dari tetangga terdekat
        $categoryCount = array_count_values(array_column($neighbors, 'category'));
        arsort($categoryCount);
        $predictedCategory = key($categoryCount);

        echo "Hasil klasifikasi dokumen: " . $predictedCategory;
        // Tambahkan tombol untuk kembali ke halaman awal (index.php)
        echo '<br><a href="index.php">Kembali ke Halaman Awal</a>';
    }
    ?>
</body>
</html>

