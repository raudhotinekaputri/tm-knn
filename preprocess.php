<?php
$text = "";
$clean_text = "";
$lowercase_text = "";
$words = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    // Mendapatkan isi file yang diunggah
    $uploaded_file = $_FILES['file']['tmp_name'];

    if (file_exists($uploaded_file)) {
        $text = file_get_contents($uploaded_file);

        // Membersihkan teks (menghapus karakter non-alfanumerik)
        $clean_text = preg_replace('/[^a-zA-Z0-9\s]/', '', $text);

        // Mengubah teks ke huruf kecil
        $lowercase_text = strtolower($clean_text);

        // Memisahkan kata-kata
        $words = explode(' ', $lowercase_text);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preprocessing Text</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
            padding: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 50%;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        strong {
            font-weight: bold;
        }

        .result {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Preprocessing Text</h1>
    <form action="preprocess.php" method="post" enctype="multipart/form-data">
    <label for="file">Unggah file teks:</label><br>
    <input type="file" id="file" name="file"><br><br>
    <input type="submit" value="Preprocess">
</form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Menampilkan hasil
        echo "<div class='result'>";
        echo "<h2>Hasil Preprocessing:</h2>";
        echo "<strong>Teks Awal:</strong> $text<br><br><br>";
        echo "<strong>Teks Setelah Dibersihkan:</strong> $clean_text<br><br><br>";
        echo "<strong>Teks dalam Huruf Kecil:</strong> $lowercase_text<br><br><br>";
        echo "<strong>Kata-kata:</strong> " . implode(', ', $words);
        echo "</div>";
    }
    ?>
</body>
</html>