<!DOCTYPE html>
<html>
<head>
    <title>Hasil Klasifikasi Dokumen</title>
</head>
<body>
    <h2>Hasil Klasifikasi Dokumen</h2>
    <?php
    if (isset($_GET["category"])) {
        $category = $_GET["category"];
        echo "Kategori dokumen: " . $category;
    } else {
        echo "Hasil klasifikasi tidak tersedia.";
    }
    ?>
</body>
</html>
