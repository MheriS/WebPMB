<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Koneksi Database MySQL</title>
    </head>
    
    <body>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "camaba";

        // Mencoba untuk menghubungkan ke database
        $koneksi = mysqli_connect($host, $username, $password, $database);

        // Memeriksa koneksi
        if ($koneksi) {
            echo "Koneksi berhasil!";
        } else {
            echo "Koneksi gagal: " . mysqli_connect_error();
        }
        ?>
    </body>
</html>
