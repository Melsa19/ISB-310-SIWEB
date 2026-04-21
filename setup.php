<?php
$host = "localhost";
$user = "root";
$pass = "";

// Connect tanpa db
$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Create database jika belum ada
if (mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS crud_php")) {
    echo "Database crud_php berhasil dibuat.<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Select database
mysqli_select_db($conn, "crud_php");

mysqli_query($conn, "DROP TABLE IF EXISTS users");

$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabel users berhasil dibuat.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>