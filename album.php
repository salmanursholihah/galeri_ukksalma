<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Halaman Album</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="foto.php">create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="daftar.php">sign up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Sign out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</form>
<a href="tambah_album.php" class="btn btn-primary">Tambah album</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
      <td>id</td>
        <td>Nama album</td>
        <td>Deskripsi</td>
        <td>Tanggal dibuat</td>
        <td>aksi</td>
    </tr>
    <?php
    include 'koneksi.php';
    $no = 1;
    $sql = "SELECT * FROM album ORDER BY albumid DESC";
    $query = mysqli_query($conn, $sql);
    foreach($query as $data){?>
    <tr>
        <td><?= $no++; ?></td>

        <td><?= $data['namaalbum']?></td>
        <td><?= $data['deskripsi']?></td>
        <td><?= $data['tanggaldibuat']?></td>
        <td> 
                    <a href="hapus_album.php?albumid=<?=$data['albumid']?>"onclick="return confirm('Anda yakin mau menghapus data ini ?')"class='btn btn-danger' >HAPUS</a>
                        <a href="edit_album.php?albumid=<?=$data['albumid']?>"class='btn btn-warning'>EDIT</a>
                    </td>
    </tr>
    <?php } ?>

</table>