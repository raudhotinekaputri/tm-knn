<?php
if (isset($_POST["save_category"])) {
    $document_id = $_POST["document_id"];
    $category = $_POST["category"];

    // Koneksi ke database MySQL
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "text_mining";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Update kategori untuk dokumen yang dipilih
    $stmt = $conn->prepare("UPDATE training_data SET category = ? WHERE id = ?");
    $stmt->bind_param("si", $category, $document_id);

    if ($stmt->execute()) {
        echo "Kategori berhasil disimpan.";
    } else {
        echo "Gagal menyimpan kategori.";
    }

    $stmt->close();
    $conn->close();
}
?>
