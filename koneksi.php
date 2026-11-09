
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik_kampus";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
