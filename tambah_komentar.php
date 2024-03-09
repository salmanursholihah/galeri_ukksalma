<?php
    include "koneksi.php";
session_start();
    $fotoid=$_POST['fotoid'];
    $userid=$_SESSION['userid'];
    $isikomentar=$_POST['isikomentar'];
    $tanggalkomentar = date('Y-m-d');

    $sql=mysqli_query($conn,"SELECT * FROM komentarfoto WHERE fotoid='$fotoid',userid='$userid',isikomentar='$isikomentar',tanggalkomentar='$'");

    header("location:zoom.php?ID=$fotoid");
?>
