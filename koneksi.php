<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge">
        <title> Koneksi Database MySQL </title>
    </head>
    
    <body>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "camaba";
        $koneksi = mysqli_connect($host, $username, $password, $database);
        if ($koneksi){
        echo "";
        }else{
        echo "Server not connected";
        }
        ?>
    </body>
</html>