<?php
if (isset($_POST['submit'])) {
    require 'config/config.php';

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $q = mysqli_query($conn, "INSERT INTO user(nama,  username, password) 
    VALUES('$nama', '$username', '$password') ");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="row-4">
                <h4>Register</h4>
                <form action="" method="post">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="" class="form-control">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="" class="form-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                    <input type="submit" value="Submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>