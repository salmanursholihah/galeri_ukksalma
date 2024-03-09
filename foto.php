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

    <title>Halaman Foto</title>
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
          <a class="nav-link active" aria-current="page" href="daftar.php">sign up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="foto.php">create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">logout</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
</head>
<body>
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <h1>Halaman Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>

    <a href="tambah_foto.php" class="btn btn-primary">Tambah foto</a>
    <table class="table table-striped table-bordered">
      <hr>
    <tr class="fw-bold">
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>hapus</th>
            <th>edit</th>
            <th>status</th>
            <th>katerangan</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"SELECT * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['fotoid']?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"SELECT * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td><?=$data['status']?></td>
                    <td> 
                    <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>"onclick="return confirm('Anda yakin mau menghapus data ini ?')"class='btn btn-danger' >HAPUS</a>
                    </td> 
                    <td>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>"class='btn btn-warning'>EDIT</a>
                    </td>
                    <td>
                    <?php
                    include 'koneksi.php';
                    $status=mysqli_query($conn, "SELECT * FROM foto where fotoid='$fotoid'");
                    $unpublish=mysqli_fetch_array($status);{

                    if($unpublish['status']==1) {
                    echo '<a href="unpublish.php?fotoid='.$data['fotoid'].'"class="btn btn-warning">unpublish</a>
                    <a href="publish.php?fotoid='.$data['fotoid'].' &publish=2" class="btn btn-success">publish anggota</a>';
                    }else if($unpublish['status']==0) {
                        echo '<a href="publish.php?fotoid='.$data['fotoid'].'&publish=1" class="btn btn-info">publish untuk umum</a>
                        <a href="publish.php?fotoid='.$data['fotoid'].'&publish=2" class="btn btn-success">publish untuk anggota</a>';
                    } else{
                        echo '<a href="publish.php?fotoid='.$data['fotoid'].'&publish=1" class="btn btn-info">publish untuk umum</a>
                        <a href="unpublish.php?fotoid='.$data['fotoid'].' " class="btn btn-secondary">unpublish</a>';
                    }
                }
                    ?>
                    </td>
                    <td> 
                        <?php
                        $fotoid=$data['fotoid'];
                        $userid=$_SESSION['userid'];
                        $ss=mysqli_query($conn, "SELECT * FROM foto where fotoid=$fotoid and userid=$userid");
                        $dd =mysqli_fetch_array($ss); {
                            if($dd['status'] ==0) { ?>
                                <span class=""><i><i class="bi bi-eye-slash"></i> foto ini bersifat private</i></span>
                                <?php } else if($dd['status']==1){ ?>
                                    <span class=""><i><i class="bi bi-eye-slash"></i> foto ini dipublish untuk umum </i></span>
                                    <?php } else{ ?>
                                        <span class=""><i><i class="bi bi-eye-slash"></i> foto ini dipublish untuk anggota </i></span>
                                
                           <?php }
                        }?>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>



