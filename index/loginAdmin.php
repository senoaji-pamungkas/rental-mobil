<?php

session_start();
require '../config/config.php';

if (isset($_POST['login'])) {
    $username =  $_POST['username'];
    $password = $_POST['password'];

    // var_dump($_POST);    
    //cek username
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    if (!$result) {
        echo "error";
    }

    if ($cek = mysqli_num_rows($result)) {

        //set session 
        $_SESSION["login"] = true;

        header("Location: DaftarMobil.php");
    } else {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Username / Password salah!")';
        echo '</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900"> Sign in Admin </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700"> Username </label>
                        <div class="mt-1">
                            <input id="username" name="username" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="login">Sign
                            in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>