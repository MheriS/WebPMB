<?php
include "koneksi.php";
$biaya = $_POST['cost'];
$jurusan = $_POST['jurusan'];
$cekinput = $koneksi->query("SELECT nama_jurusan FROM jurusan where nama_jurusan = '$jurusan'");
if(mysqli_num_rows($cekinput) > 0){
    echo '<script language="javascript">
              alert ("Biaya pada jurusan tersebut telah diinputkan, silahkan cek data biaya jurusan kembali!");
              window.location="adminbiaya.php";
              </script>';
}else{
$sql="INSERT INTO jurusan (id_biaya, nama_jurusan) values ((SELECT id_biaya FROM biaya WHERE biaya= '$biaya'),'".$jurusan."')";
$a=$koneksi->query($sql);
if($a === true){
header('location: adminbiaya.php');
}else{
echo "erooorrrr";
}
}
?>