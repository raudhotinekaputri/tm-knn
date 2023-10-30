<?php

// Fungsi untuk menyimpan data pelatihan ke dalam file teks
function saveTrainingData($filename, $data) {
    $file = fopen($filename, 'a'); // Mode 'a' digunakan untuk menambahkan data ke file yang sudah ada atau membuat file jika belum ada.
    if ($file) {
        $document = $data['document'];
        $category = $data['category'];
        $line = "$document\t$category\n"; // Menyimpan dokumen dan kategori, dipisahkan oleh tab "\t".
        fwrite($file, $line);
        fclose($file);
        return true;
    } else {
        return false;
    }
}

// Contoh cara memanggil fungsi untuk menyimpan data pelatihan
$trainingItem = array(
    "document" => "Ini adalah contoh dokumen pelatihan.",
    "category" => "Kategori Contoh"
);

$filename = 'training_data.txt'; // Ganti dengan nama file yang sesuai
$result = saveTrainingData($filename, $trainingItem);

if ($result) {
    echo "Data pelatihan berhasil disimpan.";
} else {
    echo "Gagal menyimpan data pelatihan.";
}

?>
