<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "crud_php";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_query($conn, "SET sql_mode = ''");

mysqli_query($conn, "SET sql_mode = ''");
