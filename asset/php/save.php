<?php
include "connect.php";

$name         = $_POST['name'];
$email        = $_POST['email'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$con_password = $_POST['con_password'];

// cek konfirmasi password
if ($password != $con_password) {
    echo "Password dan Konfirmasi Password tidak sama!";
    exit;
}

// enkripsi password (disarankan)
$hash_password     = password_hash($password, PASSWORD_DEFAULT);
$hash_con_password = password_hash($con_password, PASSWORD_DEFAULT);

$query = "INSERT INTO user (name, email, username, password, con_password)
          VALUES ('$name', '$email', '$username', '$hash_password', '$hash_con_password')";

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil disimpan, Yattaaaa!";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
