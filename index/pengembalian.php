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
                        <a class="nav-link" href="DaftarMobil.php">Daftar Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pengembalian.php">Pengembalian</a>
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
            <h3>Data Penyewa</h3>

        </div>
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
    </div>
</body>

</html>