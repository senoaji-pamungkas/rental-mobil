<?php
include_once("../config/config.php");

if (isset($_POST['update'])) {
    $id_penyewa = $_POST['id_penyewa'];
    $namaPenyewa = $_POST['namaPenyewa'];
    $noKtp = $_POST['noKtp'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $idPlat = $_POST['idPlat'];
    $namaMobil = $_POST['namaMobil'];
    $tanggalRental = $_POST['tanggalRental'];
    $lamaSewa = $_POST['lamaSewa'];
    $tanggalKembali = $_POST['tanggalKembali'];
    $hargaSewa = 300000;
    $denda = $_POST['denda'];
    $total = $lamaSewa * $hargaSewa + $denda;


    $q = mysqli_query($conn, "UPDATE datapenyewa SET namapenyewa='$namaPenyewa', noKtp='$noKtp', noHp='$noHP',
    alamat='$alamat', idPlat='$idPlat', namaMobil = '$namaMobil', tanggalRental = '$tanggalRental', 
    lamaSewa = '$lamaSewa', tanggalKembali = '$tanggalKembali', hargaSewa = '$hargaSewa', denda = '$denda', total = '$total'  WHERE id_penyewa='$id_penyewa'");
    // header("Location: ../admin/pengembalian.php");
    var_dump($_POST);
}
?>

<?php
$id_penyewa = $_GET['id_penyewa'];

$q = mysqli_query($conn, "SELECT * FROM datapenyewa WHERE id_penyewa='$id_penyewa'");

while ($d = mysqli_fetch_array($q)) {
    $id_penyewa = $d['id_penyewa'];
    $namaPenyewa = $d['namaPenyewa'];
    $noKtp = $d['noKtp'];
    $noHp = $d['noHp'];
    $alamat = $d['alamat'];
    $idPlat = $d['idPlat'];
    $namaMobil = $d['namaMobil'];
    $tanggalRental = $d['tanggalRental'];
    $lamaSewa = $d['lamaSewa'];
    $tanggalKembali = $d['tanggalKembali'];
    $hargaSewa = $d['hargaSewa'];
    $denda = $d['denda'];
    // $total = $lamaSewa * $hargaSewa + $denda;
}
?>
<html>

<head>
    <title>Edit User Data</title>
</head>

<body>
    <!-- Link tailwind -->
    <img src="" alt="">
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="container p-12">
        <p class="mt-4 text-lg font-medium">
            Re Edit Form Data Checkin
        </p>
        <form method="post" enctype="multipart/form-data">
            <div class="mt-10">
                <label for="">
                    <span class="block text-sm font-medium text-slate-700">Nama Penyewa</span>
                    <input type="text" name="namaPenyewa" value=<?php echo $namaPenyewa; ?> class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                </label>
            </div>
            <div class="mt-10">
                <label for="">
                    <span class="block text-sm font-medium text-slate-700">No KTP</span>
                    <input type="text" name="noKtp" value=<?php echo $noKtp; ?> class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                </label>
            </div>
            <div class="mt-10">
                <label for="">
                    <span class="block text-sm font-medium text-slate-700">No HP</span>
                    <input type="number" name="noHp" value=<?php echo $noHp; ?> class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                </label>
            </div>
            <div class="mt-10">
                <label for="">
                    <span class="block text-sm font-medium text-slate-700">ALamat</span>
                    <input type="text" name="alamat" value=<?php echo $alamat; ?> class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                </label>
            </div>
            <div class="mt-4">
                <label class="block">
                    <span class="block text-sm font-medium text-slate-700"> Id Plat </span>
                    <select id="idPlat" class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <option disabled selected value=" <?= $idPlat; ?>"><?= $idPlat; ?></option>
                        <?php
                        include 'config/config.php';
                        $q = mysqli_query($conn, "SELECT * FROM daftarMobil GROUP BY idPlat ORDER BY idPlat");
                        while ($data = mysqli_fetch_array($q)) {
                        ?>
                            <option value="<?= $data['idPlat']; ?>"> <?= $data['idPlat']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="mt-4">
                <label class="block">
                    <span class="block text-sm font-medium text-slate-700"> Nama Mobil </span>
                    <select name="namaMobil" class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <option disabled selected value=" <?= $namaMobil; ?>"><?= $namaMobil; ?></option>
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
                </label>
            </div>
            <div class="mt-10">
                <label for="">
                    <span class="block text-sm font-medium text-slate-700">Tanggal Rental</span>
                    <input type="date" name="tanggalRental" value=<?php echo $tanggalRental; ?> class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                </label>
            </div>
            <div class="mt-4">
                <label class="block">
                    <span class="block text-sm font-medium text-slate-700"> Lama Sewa </span>
                    <select name="lamaSewa" class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <option disabled selected value=" <?= $lamaSewa; ?>"><?= $lamaSewa; ?></option>
                        <option value="1">1 Hari</option>
                        <option value="2">2 Hari</option>
                        <option value="3">3 Hari</option>
                    </select>
                </label>
            </div>
            <div class="mt-10">
                <label for="">
                    <span class="block text-sm font-medium text-slate-700">Tanggal Kembali</span>
                    <input type="date" name="tanggal_kembali" class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                </label>
            </div>
            <div class="mt-10">
                <label for="">
                    <span class="block text-sm font-medium text-slate-700">Denda</span>
                    <input type="number" name="denda" class="mt-1 block w-full px-3 py-2 bg-white border rounded-md text-sm shadow-sm 
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                </label>
            </div>
            <div>
                <input type="hidden" name="id_penyewa" value=<?php echo $_GET['id_penyewa']; ?>>
                <button type="submit" name="update" class="py-2 px-10 text-white rounded-sm mt-4 bg-blue-700" onclick="return confirm('Apakah data sudah benar');">Update</button>
            </div>
        </form>
    </div>
</body>

</html>