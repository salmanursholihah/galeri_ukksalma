<?php

$fotoid=$_GET['fotoid'];
$publish=$_GET['publish'];

include('koneksi.php');
if($publish==1){
    mysqli_query($conn, "UPDATE foto set status='1' where fotoid='$fotoid'");
    header("location:foto.php");
}else{
    mysqli_query($conn, "UPDATE foto set status='2' where fotoid='$fotoid'");
    header("location:foto.php");
}
?>