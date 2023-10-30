<?php
$host = "localhost";
$username = "";
$password = "";
$database = "text_mining";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
