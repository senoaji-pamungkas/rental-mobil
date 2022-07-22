<?php
if (isset($_POST['submit'])) {
    require '../config/config.php';

    $idPlat = $_POST['idPlat'];
    $namaMobil = $_POST['namaMobil'];
    $jenisMobil = $_POST['jenisMobil'];
    $tahunProduksi = $_POST['tahunProduksi'];

    $q = mysqli_query($conn, "INSERT INTO daftarMobil(idPlat, namaMobil, jenisMobil, tahunProduksi) 
    VALUES('$idPlat','$namaMobil','$jenisMobil','$tahunProduksi')");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Peminjaman Mobil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Daftar Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a href="penyewa.php" class="nav-link">Penyewa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pengembalian.php">Pengembalian</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Admin2
                </span>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <h3>Daftar Mobil</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="" class="form-label">Id Plat</label>
                        <input type="number" name="idPlat" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Nama Mobil</label>
                        <input type="text" name="namaMobil" id="" class="form-control">
                    </div>
                    <div>
                        <label for="" class="form-label">Jenis Mobil</label>
                        <input type="text" name="jenisMobil" id="" class="form-control">
                    </div>
                    <div class="">
                        <label for="tahunproduksi" class="form-label">Tahun Produksi</label>
                        <input type="number" name="tahunProduksi" id="" class="form-control">
                    </div>
                    <div class="mt-2">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                        <input type="button" value="Cancel" class="btn btn-danger">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Plat</th>
                    <th>Nama Mobil</th>
                    <th>Jenis Mobil</th>
                    <th>Tahun Produksi</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                include '../config/config.php';
                $q = mysqli_query($conn, "SELECT * FROM daftarMobil ORDER BY id ASC");
                while ($data = mysqli_fetch_array($q)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['idPlat']; ?></td>
                        <td><?= $data['namaMobil']; ?></td>
                        <td><?= $data['jenisMobil']; ?></td>
                        <td><?= $data['tahunProduksi']; ?></td>
                        <td>
                            <button class="btn btn-danger">
                                <a href="../delete/DeleteDaftarMobil.php?id=<?= $data['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: white;transform: msFilter">
                                        <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z"></path>
                                    </svg>
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Id Plat</th>
                    <th>Nama Mobil</th>
                    <th>Jenis Mobil</th>
                    <th>Tahun Produksi</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>