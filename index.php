<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  body{
  background: #3399ff;
}


.circle{
  position: absolute;
  border-radius: 50%;
  background: white;
  animation: ripple 15s infinite;
  box-shadow: 0px 0px 1px 0px #508fb9;
}

.small{
  width: 200px;
  height: 200px;
  left: -100px;
  bottom: -100px;
}

.medium{
  width: 400px;
  height: 400px;
  left: -200px;
  bottom: -200px;
}

.large{
  width: 600px;
  height: 600px;
  left: -300px;
  bottom: -300px;
}

.xlarge{
  width: 800px;
  height: 800px;
  left: -400px;
  bottom: -400px;
}

.xxlarge{
  width: 1000px;
  height: 1000px;
  left: -500px;
  bottom: -500px;
}

.shade1{
  opacity: 0.2;
}
.shade2{
  opacity: 0.5;
}

.shade3{
  opacity: 0.7;
}

.shade4{
  opacity: 0.8;
}

.shade5{
  opacity: 0.9;
}

@keyframes ripple{
  0%{
    transform: scale(0.8);
  }
  
  50%{
    transform: scale(1.2);
  }
  
  100%{
    transform: scale(0.8);
  }
}

</style>  
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
</html>

<!---card foto --->
            </div>
        </div>
        <div class="container mx-auto mt-4">
        <div class="row">
            <?php
            include 'koneksi.php';
            $sql = mysqli_query($conn,"SELECT * FROM foto,user");
            while($data=mysqli_fetch_array($sql)){
                ?>

        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
            <a href="zoom.php?ID=<?= $data['fotoid'] ?>"><img src="gambar/<?=$data['lokasifile']?>" class="card-img-top mt-2 mb-4 rouded" width="100px" alt="..."></a>

            <div class="card-body">
                <h5 class="card-title"><?=$data['judulfoto']?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?=$data['namalengkap']?></h6>
                <p class="card-text"><?=$data['tanggalunggah']?></p>
                <a href="like.php?fotoid=<?= $data['fotoid']?>"><h4 class="bi bi-heart-fill"></h4></a>
                <a href="komentar.php?fotoid=<?= $data['fotoid']?>"><h4 class="bi bi-chat-dots-fill"></h4></a>
            </div>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </div>
 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


