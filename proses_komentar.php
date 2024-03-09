<?php
    include "koneksi.php";
session_start();
    $fotoid=$_POST['fotoid'];
    $userid=$_SESSION['userid'];
    $isikomentar=$_POST['isikomentar'];
    $tanggalkomentar = date('Y-m-d');

    $sql=mysqli_query($conn,"INSERT into komentarfoto values('','$fotoid','$userid ','$isikomentar','$tanggalkomentar')");

    header("location:zoom.php?ID=$fotoid");
?>
