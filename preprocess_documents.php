<!DOCTYPE html>
<html>
<head>
    <title>Pilih Dokumen untuk Preprocessing</title>
</head>
<body>
    <h1>Pilih Dokumen untuk Preprocessing</h1>

    <?php
    // Koneksi ke database MySQL
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "text_mining";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Fungsi untuk melakukan preprocessing teks
    function preprocessText($text) {
        // Penghilangan tanda baca dan tokenizing
        $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text); // Hapus tanda baca
        $text = strtolower($text); // Konversi teks menjadi huruf kecil
        $tokens = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY); // Tokenizing
    
        // Stop words yang tidak perlu (contoh)
        $stopwords = ["and", "the", "in", "of", "to", "a", "is", "it"];
    
        // Hilangkan stop words
        $filtered_tokens = array_diff($tokens, $stopwords);
    
        // Gabungkan kembali token-token yang sudah diproses
        $processed_text = implode(" ", $filtered_tokens);
    
        return $processed_text;
    }

    // Ambil data dokumen yang belum diproses
    $sql = "SELECT id, document_text FROM training_data WHERE processed_text IS NULL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<form method="post" action="preprocess_documents.php">';
        echo 'Pilih dokumen yang akan diproses:';
        echo '<select name="selected_document">';
        while ($row = $result->fetch_assoc()) {
            $document_id = $row["id"];
            $document_text = $row["document_text"];

            // Menampilkan setiap dokumen dalam dropdown
            echo '<option value="' . $document_id . '">Dokumen #' . $document_id . '</option>';
        }
        echo '</select>';
        echo '<input type="submit" name="process_selected" value="Proses Dokumen Terpilih">';
        echo '</form>';
    }

    // Proses ketika pengguna mengirimkan form
    if (isset($_POST["process_selected"])) {
        $selected_document = $_POST["selected_document"];

        // Ambil teks dokumen berdasarkan ID
        $document_query = "SELECT document_text FROM training_data WHERE id = ?";
        $stmt = $conn->prepare($document_query);
        $stmt->bind_param("i", $selected_document);
        $stmt->execute();
        $stmt->bind_result($document_text);
        $stmt->fetch();
        $stmt->close();

        // Lakukan preprocessing teks
        $processed_text = preprocessText($document_text);

        // Update kolom processed_text di database
        $update_stmt = $conn->prepare("UPDATE training_data SET processed_text = ? WHERE id = ?");
        $update_stmt->bind_param("si", $processed_text, $selected_document);

        if ($update_stmt->execute()) {
            echo "Dokumen #" . $selected_document . " berhasil diproses.";
        } else {
            echo "Gagal memproses dokumen #" . $selected_document;
        }
    }

    // Tampilkan hasil preprocessing
    if (isset($selected_document) && isset($processed_text)) {
        echo "<h2>Hasil Preprocessing Dokumen #$selected_document:</h2>";
        echo "<p>$processed_text</p>";
    }

    // Tampilkan tombol menuju classify_document.php
echo '<a href="classify_document.php">Klasifikasikan Dokumen</a>';
    ?>

</body>
</html>
