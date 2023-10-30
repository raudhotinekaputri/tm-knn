<!DOCTYPE html>
<html>
<head>
    <title>Masukan Data Testing</title>
</head>
<body>
    <h2>Masukan Data Testing</h2>
    <form action="classify_document.php" method="post">
        <label for="test_text">Teks yang akan diuji:</label>
        <textarea name="test_text" id="test_text" rows="4" cols="50" required></textarea>
        <br>
        <input type="submit" name="classify" value="Klasifikasi Dokumen">
    </form>
</body>
</html>
