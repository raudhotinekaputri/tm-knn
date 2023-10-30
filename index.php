<!DOCTYPE html>
<html>
<head>
    <title>Upload Data Training</title>
</head>
<body>
    <h2>Upload Data Training</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Pilih file PDF atau TXT:</label>
        <input type="file" name="file" id="file" accept=".pdf, .txt" required>
        <br>
        <label for="category">Kategori:</label>
        <input type="text" name="category" id="category" required>
        <br>
        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>
