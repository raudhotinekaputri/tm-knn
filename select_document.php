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
    ?>

</body>
</html>