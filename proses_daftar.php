<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

// menginput data ke database
$sql=mysqli_query($conn,"INSERT into user values('','$username','$password','$email','$namalengkap','$alamat')");

//Level 3 untuk peminjam buku 

// mengalihkan halaman kembali ke login.php
header("location:login.php?pesan=info_daftar");
