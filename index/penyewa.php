<?php

if (isset($_POST['submit'])) {
    include 'config/config.php';

    $namaPenyewa = $_POST['namaPenyewa'];
    $noKtp = $_POST['noKtp'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $idPlat = $_POST['idPlat'];
    $namaMobil = $_POST['namaMobil'];
    $tanggalRental = $_POST['tanggalRental'];
    $lamaSewa = $_POST['lamaSewa'];
    $tanggalKembali = date('Y-m-d', strtotime('$tanggalRental', strtotime($tanggalRental)));
    $hargaSewa = 300000;
    $total = $lamaSewa * $hargaSewa;

    $q = mysqli_query($conn, "INSERT INTO datapenyewa(namaPenyewa, noKtp, noHp, alamat, idPlat, namaMobil, tanggalRental, lamaSewa, hargaSewa, total)
    VALUES('$namaPenyewa', '$noKtp', '$noHp', '$alamat', '$idPlat', '$namaMobil', '$tanggalRental', '$lamaSewa', '$hargaSewa', '$total') ");

    // header("Location: cetakLaporan.php");
    // echo $namaPenyewa;
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
                </ul>
                <span class="navbar-text">
                    Admin2
                </span>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <form action="<?php $_PHP_SELF ?>" method="post">
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Nama Penyewa</label>
                    <input type="text" name="namaPenyewa" id="" class="form-control">
                </div>
                <div class="col">
                    <label for="" class="form-label">No KTP</label>
                    <input type="number" name="noKtp" id="" class="form-control">
                </div>
                <div class="col">
                    <label for="" class="form-label">No HP</label>
                    <input type="number" name="noHp" id="" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="" class="form-control">
                </div>
                <div class="col">
                    <label for="" class="form-label">Id Plat Mobil</label>
                    <br>
                    <select name="idPlat" id="" class="form-select">
                        <option value="" selected disabled></option>
                        <?php
                        include '../config/config.php';
                        $q = mysqli_query($conn, "SELECT * FROM daftarMobil GROUP BY idPlat ORDER BY idPlat");
                        while ($data = mysqli_fetch_array($q)) {
                        ?>
                            <option value="<?= $data['idPlat']; ?>"><?= $data['idPlat']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="" class="form-label">Nama Mobil</label>
                    <br>
                    <select name="namaMobil" id="" class="form-select">
                        <option value="" selected disabled></option>
                        <?php
                        include 'config/config.php';
                        $q = mysqli_query($conn, "SELECT * FROM daftarMobil GROUP BY namaMobil ORDER BY namaMobil");
                        while ($data = mysqli_fetch_array($q)) {
                        ?>
                            <option value="<?= $data['namaMobil']; ?>"><?= $data['namaMobil']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="">
                    <label for="" class="form-label">Tanggal Rental</label>
                    <input type="date" name="tanggalRental" id="" class="form-control">
                </div>
                <div class="">
                    <label for="lamaSewa" class="form-label">Lama Sewa</label>
                    <br>
                    <select name="lamaSewa" id="" class="form-select">
                        <option value="" selected disabled></option>
                        <option value="1">1 Hari</option>
                        <option value="2">2 Hari</option>
                        <option value="3">3 Hari</option>
                    </select>
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-success mt-3">
                <table class="table table-striped" id="table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Penyewa</th>
                            <th>No KTP</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Id Plat</th>
                            <th>Nama Mobil</th>
                            <th>Tanggal Rental</th>
                            <th>Lama Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Harga Sewa</th>
                            <th>Total</th>
                            <th>Denda</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        include '../config/config.php';
                        $q = mysqli_query($conn, "SELECT * FROM datapenyewa ORDER BY id_penyewa ASC");
                        while ($data = mysqli_fetch_array($q)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['namaPenyewa']; ?></td>
                                <td><?= $data['noKtp']; ?></td>
                                <td><?= $data['noHp']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['idPlat']; ?></td>
                                <td><?= $data['namaMobil']; ?></td>
                                <td><?= $data['tanggalRental']; ?></td>
                                <td><?= $data['lamaSewa']; ?></td>
                                <td><?= $data['tanggalKembali']; ?></td>
                                <td><?= $data['hargaSewa']; ?></td>
                                <td><?= $data['total']; ?></td>
                                <td><?= $data['denda']; ?></td>
                                <td>
                                    <button class="btn btn-danger">
                                        <a href="../edit/editPenyewa.php?id_penyewa=<?= $data['id_penyewa']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: white;transform: msFilter">
                                                <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-danger">
                                        <a href="../delete/DeletePenyewa.php?id=<?= $data['id_penyewa']; ?>">
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
                            <th>Nama Penyewa</th>
                            <th>No KTP</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Id Plat</th>
                            <th>Nama Mobil</th>
                            <th>Tanggal Rental</th>
                            <th>Lama Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Harga Sewa</th>
                            <th>Total</th>
                            <th>Denda</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
        </form>
    </div>


</body>

</html>