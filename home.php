<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <title>gallery</title>
</head>
<body>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="navbar-brand" aria-current="page" href="home.php">Home</a>        
    </li>
        <li class="nav-item">
        <a class="navbar-brand" aria-current="page" href="foto.php">Create</a>        
        </li>
        <li class="nav-item">
        <a class="navbar-brand" aria-current="page" href="album.php">Album</a>        
        </li>
        <li class="nav-item">
        <a class="navbar-brand" aria-current="page" href="daftar.php">sign Up</a>        
        </li>
        <li class="nav-item">
        <a class="navbar-brand" aria-current="page" href="login.php">sign In</a>        
        </li>
        <li class="nav-item">
        <a class="navbar-brand" aria-current="page" href="logout.php">sign out</a>        
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>like</th>
            <th>dislike</th>
        </tr>
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namalengkap']?></td>
                <td>
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                <td>
                <?php
                        $fotoid=$data['fotoid'];
                        $sql3=mysqli_query($conn,"select * from dislike where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql3);
                    ?>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
