<?php

$username = $_POST['username'];
$password = md5($_POST['password']);

include 'koneksi.php';
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>0){
    $data = mysqli_fetch_array($query);
    session_start();
    $_SESSION['userid'] = $data['userid'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['namalengkap'] = $data['namalengkap'];
    $_SESSION['alamat'] = $data['alamat'];
    header('location:index.php');
}else{
    echo"<script>
    alert('Maaf Login Gagal, Silahkan Ulangi Lagi');
    window.location.assign('login.php');
    </script>";
}

