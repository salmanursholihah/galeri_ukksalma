<?php
    $ID = $_GET['ID'];
?>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<?php
    include "koneksi.php";
    $sql=mysqli_query($conn, "SELECT * FROM foto WHERE fotoid=$ID ");
    while($data=mysqli_fetch_array($sql)){  
    ?>
<div class="container mt-4">
    <div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-7">
        <img src="gambar/<?=$data['lokasifile']?>" alt="..." width= 700px;>
        </div>
        <div class="col-md-5">
        <div class="card-body">
            <h5 class="card-title"><?=$data['judulfoto']?></h5>
            <p class="card-text"><?=$data['deskripsifoto']?></p>
            <p class="card-text"><small class="text-body-secondary"><?=$data['tanggalunggah']?></small></p>
        </div>
            <form action="proses_komentar.php" method="post">
                <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Komentar" aria-describedby="button-addon2" name="isikomentar" required>
                    <input type="hidden" class="form-control" name="fotoid" value="<?= $ID ?>">
                    <input type="hidden" class="form-control" name="userid" value="<?= $_SESSION['userid'] ?>">
                    <button class="btn btn-outline-secondary" type="submit">Send</button>
                </div>
                </div>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                            <a href="like.php?fotoid=<?= $data['fotoid']?>"><h5 class="bi bi-heart-fill"></h5></a>
                            <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                            </div>
                            <div class="col">
                            <a href="dislike.php"><h5 class="bi bi-heart"></h5></a>
                            <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from dislike where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                            </div>
                            <div class="col">
                            <a href="gambar/<?=$data['lokasifile']?>" download>
                            <h5 class="bi bi-download btn btn-info-light btn btn-success"></h5></a>
                            </div>

                            <div class="col">
                            <a href="index.php"><h5 class="bi bi-arrow-left-circle btn btn-primary"></h5></a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group">
                    <?php
                        include "koneksi.php";
                        $ID=$_GET['ID'];
                        $sql=mysqli_query($conn,"SELECT * from komentarfoto where fotoid=$ID");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                    <li class="list-group-item"><?=$data['isikomentar']?></li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<?php
    }
?>
</body>

<?php
?>