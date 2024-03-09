<?php
    include "koneksi.php";
    session_start();

    if(!isset($_SESSION['userid'])){
        header("location:index.php");
    }else{
        $fotoid=$_GET['fotoid'];
        $userid=$_SESSION['userid'];
        

        $sql=mysqli_query($conn,"select * from dislike where fotoid='$fotoid' and userid='$userid'");

        if(mysqli_num_rows($sql)==0){
            header("location:index.php");
        }else{
            $tanggaldislike=date("Y-m-d");
            mysqli_query($conn, "insert into dislike values('','$fotoid','$userid','$tanggaldislike')");
            header("location:index.php");
        }
    }

    
?>